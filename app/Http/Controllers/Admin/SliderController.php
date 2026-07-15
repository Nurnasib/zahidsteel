<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadHelper;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class SliderController extends Controller
{
    public function index()
    {
        $data['title'] = 'Add Slider';
        $data['dashboard'] = 'Dashboard';
        $data['subTitle'] = 'Slider';
        $data['addTitle'] = 'Add New Slider';
        $data['editTitle'] = ' Edit Slider';
        $data['dataList'] = Slider::OrderBy('id', 'desc')->get();

        return view('backend.slider', $data);
    }

    public function addOrUpdateInfo(Request $request, $id = null)
    {
        $request->validate([
            'media_type' => 'required|in:image,video',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:20480',
            'video' => 'nullable|mimes:mp4,mov,avi,webm|max:50480',
        ]);

        DB::beginTransaction();

        try {

            $slider = $id ? Slider::find($id) : new Slider;

            if (!$slider) {
                return back()->with('error', 'Data not found');
            }

            // BASIC FIELDS
            $slider->title      = $request->title;
            $slider->url      = $request->url;
            $slider->sub_title  = $request->sub_title;
            $slider->status     = $request->status;
            $slider->media_type = $request->media_type;

            // =========================
            // IMAGE HANDLING
            // =========================
            if ($request->media_type === 'image') {

                if ($request->hasFile('image')) {

                    $file = $request->file('image');
                    $name = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
                    $path = 'uploads/slider/images/';

                    $file->move(public_path($path), $name);

                    $slider->image = json_encode([
                        'original' => $path.$name
                    ]);
                }

                // clear video safely
                $slider->video = null;
            }

            // =========================
            // VIDEO HANDLING
            // =========================
            if ($request->media_type === 'video') {

                if ($request->hasFile('video')) {

                    $file = $request->file('video');
                    $name = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
                    $path = 'uploads/slider/videos/';

                    $file->move(public_path($path), $name);

                    $slider->video = $path.$name;
                }

                // clear image safely
                $slider->image = null;
            }

            $slider->save();

            DB::commit();

            return back()->with('success', $id ? 'Updated Successfully' : 'Created Successfully');

        } catch (\Exception $e) {

            DB::rollBack();

            dd($e->getMessage());
        }
    }
    public function dataInfoDelete(Request $request, $id = null)
    {
        $dataInfo = Slider::find($id);

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
