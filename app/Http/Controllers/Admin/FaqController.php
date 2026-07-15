<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadHelper;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class FaqController extends Controller
{
    public function index()
    {
        $data['title'] = 'Add Faq';
        $data['dashboard'] = 'Dashboard';
        $data['subTitle'] = 'Faq';
        $data['addTitle'] = 'Add New Faq';
        $data['editTitle'] = ' Edit Faq';
        $data['dataList'] = Faq::where('type',1)->OrderBy('id', 'desc')->get();

        return view('backend.faq', $data);
    }

    public function addOrUpdateInfo(Request $request, $id = null)
    {
        $validatedData = $request->validate([

            'question' => 'required',
            'answer' => 'required',
        ]);

        DB::beginTransaction();

        try {

            $dataInfo = $id ? Faq::find($id) : new Faq();

            if (! $dataInfo) {
                return back()->with('error', 'Not found');
            }
            $dataInfo->question = $request->question;
            $dataInfo->answer = $request->answer;
            $dataInfo->status = $request->status;
            $dataInfo->type = 1;

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
        $dataInfo = Faq::find($id);

        if ($dataInfo) {


            // Delete database record
            $dataInfo->delete();

            return back()->with('success', 'Data deleted successfully.');
        }

        return back()->with('error', 'Data not found.');
    }
}
