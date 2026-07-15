<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadHelper;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class BannerController extends Controller
{
    public function index()
    {
        $data['title'] = 'Add Banner';
        $data['dashboard'] = 'Dashboard';
        $data['subTitle'] = 'Banner';
        $data['addTitle'] = 'Add New Banner';
        $data['editTitle'] = ' Edit Banner';
        $data['dataList'] = Banner::OrderBy('id', 'desc')->get();

        return view('backend.banner', $data);
    }

    public function addOrUpdateInfo(Request $request, $id = null)
    {
        $validatedData = $request->validate([

            'image' => 'nullable|image',
        ]);

        DB::beginTransaction();

        try {

            $dataInfo = $id ? Banner::find($id) : new Banner;

            if (! $dataInfo) {
                return back()->with('error', 'Not found');
            }

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
        $dataInfo = Banner::find($id);

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
