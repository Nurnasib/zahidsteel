<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadHelper;
use App\Http\Controllers\Controller;
use App\Models\Patner;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class PatnerController extends Controller
{
    public function index()
    {
        $data['title'] = 'Add Client';
        $data['dashboard'] = 'Dashboard';
        $data['subTitle'] = 'Client';
        $data['addTitle'] = 'Add New Client';
        $data['editTitle'] = ' Edit Client';
        $data['dataList'] = Patner::orderBy('id', 'desc')->get();

        return view('backend.patner', $data);
    }

    public function addOrUpdateInfo(Request $request, $id = null)
    {
        $validatedData = $request->validate([

            'image' => 'required|image',
        ]);

        DB::beginTransaction();

        try {

            $dataInfo = $id ? Patner::find($id) : new Patner();

            if (! $dataInfo) {
                return back()->with('error', 'Not found');
            }
            $dataInfo->url = $request->url;
            $dataInfo->title = $request->title;
            $dataInfo->status = $request->status;
            $dataInfo->location = $request->location;
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
        $dataInfo = Patner::find($id);

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
