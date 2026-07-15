<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class TeamController extends Controller
{
    public function index()
    {

        $data['title'] = 'Add Team Member';
        $data['dashboard'] = 'Dashboard';
        $data['subTitle'] = 'Team Member';
        $data['addTitle'] = 'Add New Team Member';
        $data['editTitle'] = ' Edit Team Member';
        $data['dataList'] = Team::OrderBy('id', 'desc')->get();

        return view('backend.team', $data);
    }

    public function addOrUpdateInfo(Request $request, $id = null)
    {

        // Validate the request
        $validatedData = $request->validate([

            'name' => 'required',

        ]);

        DB::beginTransaction();
        try {
            // Find existing slider or create a new one
            $dataInfo = $id ? Team::find($id) : new Team();
            // dd($dataInfo);
            if (! $dataInfo) {
                return back()->with('error', 'Data not found.');
            }
            $dataInfo->fill($request->except(['image']));
            // Assign values
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $file_name = time().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('uploads/images/projects/'), $file_name);
                $dataInfo->image = 'uploads/images/projects/'.$file_name;
            }

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

        $dataInfo = Team::find($id);
        $dataInfo->delete();

        return back()->with('success', 'Data Delete successfully.');
    }
}
