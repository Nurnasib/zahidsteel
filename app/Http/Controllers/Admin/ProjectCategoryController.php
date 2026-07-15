<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class ProjectCategoryController extends Controller
{
    public function index()
    {

        $data['title'] = 'Add Project Category';
        $data['dashboard'] = 'Dashboard';
        $data['subTitle'] = 'Project Category';
        $data['addTitle'] = 'Add New Project Category';
        $data['editTitle'] = ' Edit Project Category';
        $data['dataList'] = ProjectCategory::where('type',1)->OrderBy('id', 'desc')->get();

        return view('backend.project_category', $data);
    }

    public function addOrUpdateInfo(Request $request, $id = null)
    {

        // Validate the request
        $validatedData = $request->validate([

            'title' => 'required',

        ]);

        DB::beginTransaction();
        try {
            // Find existing slider or create a new one
            $dataInfo = $id ? ProjectCategory::find($id) : new ProjectCategory;
            // dd($dataInfo);
            if (! $dataInfo) {
                return back()->with('error', 'Data not found.');
            }
            $dataInfo->fill($request->all());
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

        $dataInfo = ProjectCategory::find($id);
        $dataInfo->delete();

        return back()->with('success', 'Data Delete successfully.');
    }
}
