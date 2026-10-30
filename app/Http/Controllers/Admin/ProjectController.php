<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadHelper;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\ProjectGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class ProjectController extends Controller
{
    public function index()
    {
        $data['title'] = 'Add Project';
        $data['dashboard'] = 'Dashboard';
        $data['subTitle'] = 'Project';
        $data['addTitle'] = 'Add New Project';
        $data['editTitle'] = ' Edit Project';
        $data['projectCategory'] = ProjectCategory::where('type',1)->where('status','active')->get();
        $data['dataList'] = Project::OrderBy('id', 'desc')->get();

        return view('backend.project', $data);
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
            $dataInfo = $id ? Project::find($id) : new Project();

            if (!$dataInfo) {
                return back()->with('error', 'Record not found.');
            }

            // ── Scalar fields ──────────────────────────────────────────
            $dataInfo->title               = $request->title;
            $dataInfo->slug                = Str::slug($request->title);
            $dataInfo->description         = $request->description;

            $dataInfo->status              = $request->status;
            $dataInfo->type                = $request->type;
            $dataInfo->location            = $request->location;
            $dataInfo->size                = $request->size;

            $dataInfo->save();

            // ── Gallery images ─────────────────────────────────────────
            // Remove only the photos ticked for removal (scoped to this record)
            if ($id && $request->filled('remove_images')) {
                $this->deleteImages(ProjectGallery::where('project_id', $dataInfo->id)->whereIn('id', $request->remove_images)->get());
            }

            // New uploads are added to the existing photos
            $files = $request->file('gallery'); // returns array or null

            if (!empty($files)) {

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

                    ProjectGallery::create([
                        'project_id' => $dataInfo->id,
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
        $dataInfo = Project::find($id);

        if ($dataInfo) {

            // Delete the photo rows and files
            $this->deleteImages(ProjectGallery::where('project_id', $dataInfo->id)->get());

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
