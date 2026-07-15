<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Factory;
use App\Models\FactoryGallery;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class FactoryController extends Controller
{
    public function index()
    {
        $data['title'] = 'Add Factory';
        $data['dashboard'] = 'Dashboard';
        $data['subTitle'] = 'Factory';
        $data['addTitle'] = 'Add New Factory';
        $data['editTitle'] = ' Edit Factory';

        $data['dataList'] = Factory::OrderBy('id', 'desc')->get();

        return view('backend.factory', $data);
    }

    public function addOrUpdateInfo(Request $request, $id = null)
    {
        $request->validate([
            'title'       => 'required|string|max:255',

            'status'      => 'required|in:active,inactive',
            'gallery'     => 'nullable|array',
            'gallery.*'   => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
        ]);

        DB::beginTransaction();

        try {
            /** @var \App\Models\Project $dataInfo */
            $dataInfo = $id ? Factory::find($id) : new Factory();

            if (!$dataInfo) {
                return back()->with('error', 'Record not found.');
            }

            // ── Scalar fields ──────────────────────────────────────────
            $dataInfo->title               = $request->title;

            $dataInfo->status              = $request->status;


            $dataInfo->save();

            // ── Gallery images ─────────────────────────────────────────
            // ── Gallery images ─────────────────────────────────────────
            $files = $request->file('gallery'); // returns array or null

            if (!empty($files)) {

                // On edit: delete old gallery rows + files
                if ($id) {
                    $oldGalleries = FactoryGallery::where('factory_id', $dataInfo->id)->get();

                    foreach ($oldGalleries as $old) {
                        if ($old->gallery) {
                            $paths = json_decode($old->gallery, true);
                            if (!empty($paths['original']) && file_exists(public_path($paths['original']))) {
                                unlink(public_path($paths['original']));
                            }
                        }
                    }

                    FactoryGallery::where('factory_id', $dataInfo->id)->delete();
                }

                foreach ($files as $file) {

                    // Skip if not a valid uploaded file
                    if (!$file->isValid()) continue;

                    $filename  = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $uploadDir = 'uploads/projects/' . $dataInfo->id . '/';
                    $fullDir   = public_path($uploadDir);

                    if (!file_exists($fullDir)) {
                        mkdir($fullDir, 0755, true);
                    }

                    $file->move($fullDir, $filename);

                    FactoryGallery::create([
                        'factory_id' => $dataInfo->id,
                        'gallery'    => json_encode(['original' => $uploadDir . $filename]),
                    ]);
                }
            }

            DB::commit();

            Alert::toast($id ? 'Updated successfully!' : 'Added successfully!', 'success');

            return back();

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Project addOrUpdateInfo error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
            ]);

            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }
    public function dataInfoDelete(Request $request, $id = null)
    {
        $dataInfo = Factory::find($id);

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
