<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadHelper;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class BrandController extends Controller
{
    public function index()
    {
        $data['title'] = 'Add Brand';
        $data['dashboard'] = 'Dashboard';
        $data['subTitle'] = 'Brand';
        $data['addTitle'] = 'Add New Brand';
        $data['editTitle'] = ' Edit Brand';
        $data['dataList'] = Brand::OrderBy('id', 'desc')->get();

        return view('backend.brand', $data);
    }

    public function addOrUpdateInfo(Request $request, $id = null)
    {
        // Validate the request
        $validatedData = $request->validate([
            'image' => 'nullable',
            'name' => 'required',

        ]);

        DB::beginTransaction();
        try {
            // Find existing slider or create a new one
            $dataInfo = $id ? Brand::find($id) : new Brand;
            // dd($dataInfo);
            if (! $dataInfo) {
                return back()->with('error', 'Data not found.');
            }
            $dataInfo->fill($request->except('image'));

            // Handle image upload
            if ($request->hasFile('image')) {

                // Delete old images if exist
                if (! empty($dataInfo->image)) {
                    $oldImages = json_decode($dataInfo->image, true);
                    foreach ($oldImages as $imgPath) {
                        if (file_exists(public_path($imgPath))) {
                            @unlink(public_path($imgPath));
                        }
                    }
                }

                // Upload new image to subcategory folder
                $uploaded = UploadHelper::responsiveUpload($request->file('image'), 'uploads/subcategory');
                $dataInfo->image = json_encode($uploaded);
            }

            // Save subcategory
            $dataInfo->save();
            // Assign values

            // Save to database
            if ($dataInfo->save()) {
                DB::commit();
                $message = $id ? 'Data updated successfully.' : 'Data added successfully.';
                Alert::toast($message, 'success');

                return back()->with('success', $message);

            } else {
                DB::rollBack();

                return back()->with('error', 'Failed to save Data. Please try again.');
            }
        } catch (\Exception $err) {
            DB::rollBack();
            Log::error($err->getMessage());
            dd($err);

            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function dataInfoDelete(Request $request, $id = null)
    {
        $dataInfo = Brand::find($id);
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
