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
        $data['dataList'] = Team::orderBy('serial')->orderBy('id', 'desc')->get();

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
            $dataInfo->fill($request->except(['image', 'serial']));

            // New members go to the end of the list.
            if (! $id) {
                $dataInfo->serial = (int) Team::max('serial') + 1;
            }
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

    /**
     * Persist the drag-and-drop order from the admin list.
     * Expects an array of team ids in their new display order.
     */
    public function reorder(Request $request)
    {
        $validated = $request->validate([
            'order' => 'required|array',
            'order.*' => 'required|integer|exists:teams,id',
        ]);

        DB::beginTransaction();
        try {
            foreach (array_values($validated['order']) as $index => $teamId) {
                Team::where('id', $teamId)->update(['serial' => $index + 1]);
            }
            DB::commit();

            return response()->json(['status' => 'success']);
        } catch (\Exception $err) {
            DB::rollBack();
            Log::error($err->getMessage());

            return response()->json(['status' => 'error'], 500);
        }
    }

    public function dataInfoDelete(Request $request, $id = null)
    {

        $dataInfo = Team::find($id);
        $dataInfo->delete();

        return back()->with('success', 'Data Delete successfully.');
    }
}
