<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadHelper;
use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class ReviewController extends Controller
{
    public function index()
    {
        $data['title'] = 'Add Review';
        $data['dashboard'] = 'Dashboard';
        $data['subTitle'] = 'Review';
        $data['addTitle'] = 'Add New Review';
        $data['editTitle'] = ' Edit Review';
        $data['dataList'] = Review::OrderBy('id', 'desc')->get();

        return view('backend.review', $data);
    }

    public function addOrUpdateInfo(Request $request, $id = null)
    {
        $validatedData = $request->validate([

            'title' => 'required',
            'designation' => 'required',
            'review' => 'nullable',
        ]);

        DB::beginTransaction();

        try {

            $dataInfo = $id ? Review::find($id) : new Review();

            if (! $dataInfo) {
                return back()->with('error', 'Not found');
            }
            $dataInfo->review = $request->review;
            $dataInfo->title = $request->title;
            $dataInfo->designation = $request->designation;
            $dataInfo->rating = $request->rating;
            $dataInfo->status = $request->status;

            if ($request->hasFile('image')) {

                // Delete old images if exist
                if (! empty($dataInfo->image)) {
                    $oldImages = json_decode($dataInfo->image);
                    foreach ($oldImages as $imgPath) {
                        if (file_exists(public_path($imgPath))) {
                            @unlink(public_path($imgPath));
                        }
                    }
                }

                // Upload new image
                $uploaded = UploadHelper::responsiveUpload($request->file('image'), 'uploads/category');
                $dataInfo->image = json_encode($uploaded);
            }

            $dataInfo->save();
            DB::commit();

            Alert::toast($id ? 'Updated!' : 'Added!', 'success');

            return back();

        } catch (\Exception $err) {
            DB::rollBack();
            Log::error($err);

            return back()->with('error', 'Error occurred');
        }
    }

    public function dataInfoDelete(Request $request, $id = null)
    {
        $dataInfo = Review::find($id);

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
