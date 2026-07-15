<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadHelper;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\WhyChoose;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class WhyChooseUsController extends Controller
{
    public function index()
    {
        $data['title'] = 'Add Why Choose Us';
        $data['dashboard'] = 'Dashboard';
        $data['subTitle'] = 'Why Choose Us';
        $data['addTitle'] = 'Add New Why Choose Us';
        $data['editTitle'] = ' Edit Why Choose Us';
        $data['dataList'] = WhyChoose::where('type',1)->OrderBy('id', 'desc')->get();

        return view('backend.why_choose', $data);
    }

    public function addOrUpdateInfo(Request $request, $id = null)
    {
        $request->validate([

            'title'                              => 'required|string|max:255',
            'icon'                        => 'nullable|string',
            'status'                             => 'required|in:active,inactive',

        ]);

        DB::beginTransaction();

        try {
            /** @var \App\Models\Service $dataInfo */
            $dataInfo = $id ? WhyChoose::find($id) : new WhyChoose();

            if (! $dataInfo) {
                return back()->with('error', 'Record not found.');
            }

            // ── Scalar fields ─────────────────────────────────────────────────────
            $dataInfo->title       = $request->title;
            $dataInfo->description       = $request->description;
            $dataInfo->icon = $request->icon;
            $dataInfo->status      = $request->status;
            $dataInfo->type      = 1;

            $dataInfo->save();

            DB::commit();

            Alert::toast($id ? 'Updated successfully!' : 'Added successfully!', 'success');

            return back();

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Service addOrUpdateInfo error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
            ]);

            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function dataInfoDelete(Request $request, $id = null)
    {
        $dataInfo = WhyChoose::find($id);

        if ($dataInfo) {



            // Delete database record
            $dataInfo->delete();

            return back()->with('success', 'Data deleted successfully.');
        }

        return back()->with('error', 'Data not found.');
    }
}
