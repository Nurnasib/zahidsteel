<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryImage;
use App\Models\ProjectGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class GalleryController extends Controller
{
    public function index()
    {
        $data['title'] = 'Add Gallery';
        $data['dashboard'] = 'Dashboard';
        $data['subTitle'] = 'Gallery';
        $data['addTitle'] = 'Add New Gallery';
        $data['editTitle'] = ' Edit Gallery';

        $data['dataList'] = Gallery::OrderBy('id', 'desc')->get();

        return view('backend.gallery', $data);
    }

    public function addOrUpdateInfo(Request $request, $id = null)
    {
        $request->validate([
            'title'       => 'required|string|max:255',

            'status'      => 'required|in:active,inactive',
            'gallery'     => 'nullable|array',
            'gallery.*'   => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
            'remove_images'   => 'nullable|array',
            'remove_images.*' => 'integer',
        ]);

        DB::beginTransaction();

        try {
            /** @var \App\Models\Project $dataInfo */
            $dataInfo = $id ? Gallery::find($id) : new Gallery();

            if (!$dataInfo) {
                return back()->with('error', 'Record not found.');
            }

            // ── Scalar fields ──────────────────────────────────────────
            $dataInfo->title               = $request->title;

            $dataInfo->status              = $request->status;


            $dataInfo->save();

            // ── Gallery images ─────────────────────────────────────────
            // Remove only the photos ticked for removal (scoped to this album)
            if ($id && $request->filled('remove_images')) {
                $this->deleteImages(GalleryImage::where('gallery_id', $dataInfo->id)->whereIn('id', $request->remove_images)->get());
            }

            // New uploads are added to the album's existing photos
            $files = $request->file('gallery'); // returns array or null

            if (!empty($files)) {

                foreach ($files as $file) {

                    // Skip if not a valid uploaded file
                    if (!$file->isValid()) continue;

                    $filename  = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $uploadDir = 'uploads/gallery/' . $dataInfo->id . '/';
                    $fullDir   = public_path($uploadDir);

                    if (!file_exists($fullDir)) {
                        mkdir($fullDir, 0755, true);
                    }

                    $file->move($fullDir, $filename);

                    GalleryImage::create([
                        'gallery_id' => $dataInfo->id,
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
        $dataInfo = Gallery::find($id);

        if ($dataInfo) {

            // Delete the album's photo rows and files
            $this->deleteImages(GalleryImage::where('gallery_id', $dataInfo->id)->get());

            // Delete database record
            $dataInfo->delete();

            return back()->with('success', 'Data deleted successfully.');
        }

        return back()->with('error', 'Data not found.');
    }

    private function deleteImages($images): void
    {
        foreach ($images as $image) {
            $paths = json_decode($image->gallery ?? '', true);
            if (!empty($paths['original']) && file_exists(public_path($paths['original']))) {
                @unlink(public_path($paths['original']));
            }
            $image->delete();
        }
    }
}
