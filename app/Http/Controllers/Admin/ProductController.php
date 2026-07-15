<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadHelper;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    public function index()
    {
        $data['title'] = 'Add Product';
        $data['dashboard'] = 'Dashboard';
        $data['subTitle'] = 'Product';
        $data['addTitle'] = 'Add New Product';
        $data['editTitle'] = ' Edit Product';
        $data['dataList'] = Product::OrderBy('id', 'desc')->get();

        return view('backend.product', $data);
    }

    public function addOrUpdateInfo(Request $request, $id = null)
    {
        $request->validate([
            'image'                              => $id ? 'nullable|image|max:2048'
                : 'required|image|max:2048',
            'title'                              => 'required|string|max:255',
            'description'                        => 'nullable|string',
            'status'                             => 'required|in:active,inactive',

            // Dynamic note rows
            'serviceNote'                        => 'nullable|array',
            'serviceNote.*.note_title'           => 'nullable|string|max:255',
            'serviceNote.*.note_description'     => 'nullable|string',
        ]);

        DB::beginTransaction();

        try {
            /** @var \App\Models\Service $dataInfo */
            $dataInfo = $id ? Product::find($id) : new Product();

            if (! $dataInfo) {
                return back()->with('error', 'Record not found.');
            }

            // ── Scalar fields ─────────────────────────────────────────────────────
            $dataInfo->title       = $request->title;
            $dataInfo->slug       = Str::slug($request->title);
            $dataInfo->description = $request->description;
            $dataInfo->status      = $request->status;

            // ── serviceNote → JSON ────────────────────────────────────────────────
            // Filter out completely empty rows so we don't store blank objects.
            $notes = collect($request->serviceNote ?? [])
                ->filter(fn($row) =>
                    ! empty($row['note_title']) || ! empty($row['note_description'])
                )
                ->values()
                ->toArray();

            $dataInfo->serviceNote = ! empty($notes) ? json_encode($notes) : null;

            // ── Image upload ──────────────────────────────────────────────────────
            if ($request->hasFile('image')) {

                // Delete old images if updating
                if (! empty($dataInfo->image)) {
                    $oldImages = json_decode($dataInfo->image, true);
                    if (is_array($oldImages)) {
                        foreach ($oldImages as $imgPath) {
                            if (is_string($imgPath) && file_exists(public_path($imgPath))) {
                                @unlink(public_path($imgPath));
                            }
                        }
                    }
                }

                // Upload via your responsive helper
                $uploaded          = UploadHelper::responsiveUpload(
                    $request->file('image'),
                    'uploads/product'
                );
                $dataInfo->image   = json_encode($uploaded);
            }

            $dataInfo->save();

            DB::commit();

            Alert::toast($id ? 'Updated successfully!' : 'Added successfully!', 'success');

            return back();

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Product addOrUpdateInfo error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
            ]);

            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function dataInfoDelete(Request $request, $id = null)
    {
        $dataInfo = Product::find($id);

        if ($dataInfo) {

            // Delete image files if exist
            if (! empty($dataInfo->image)) {
                $images = json_decode($dataInfo->image);

                foreach ($images as $imgPath) {
                    if (file_exists(public_path($imgPath))) {
                        @unlink(public_path($imgPath));
                    }
                }
            }

            // Delete database record
            $dataInfo->delete();

            return back()->with('success', 'Data deleted successfully.');
        }

        return back()->with('error', 'Data not found.');
    }
}
