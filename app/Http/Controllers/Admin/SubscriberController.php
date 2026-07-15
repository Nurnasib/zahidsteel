<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadHelper;
use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class SubscriberController extends Controller
{
    public function index()
    {
        $data['title'] = 'Add Subscriber';
        $data['dashboard'] = 'Dashboard';
        $data['subTitle'] = 'Subscriber';
        $data['addTitle'] = 'Add New Subscriber';
        $data['editTitle'] = ' Edit Subscriber';
        $data['dataList'] = Subscriber::OrderBy('id', 'desc')->get();

        return view('backend.subscriber', $data);
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
