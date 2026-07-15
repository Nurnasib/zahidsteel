<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function index()
    {
        abort_if(!auth()->user()->can('user-list'), 403);
        $data['title'] = "Add Permission";
        $data['dashboard'] ="Dashboard";
        $data['subTitle'] ="Permission";
        $data['addTitle'] = "Add New Permission";
        $data['editTitle'] = "Edit Permission";

        $data['dataList'] = Permission::orderBy('id','desc')
            ->get();

        return view('backend.permission', $data);
    }


    public function addOrUpdateInfo(Request $request, $id = null)
    {
        // ✅ Validation
        abort_if(!auth()->user()->can('user-create'), 403);
        $validatedData = $request->validate([


            'name' => [
                'required',
                Rule::unique('permissions', 'name')->ignore($id)
            ],


        ]);

        DB::beginTransaction();

        try {

            $dataInfo = $id ? Permission::find($id) : new Permission();

            if (!$dataInfo) {
                return back()->with('error', 'Data not found.');
            }

            $dataInfo->name  = $request->name;

            $dataInfo->guard_name  = 'web';




            $dataInfo->save();


            DB::commit();

            $message = $id ? 'Data updated successfully.' : 'Data added successfully.';
            Alert::toast($message, 'success');

            return back()->with('success', $message);

        } catch (\Exception $err) {

            DB::rollBack();
            Log::error($err->getMessage());

            return back()->with('error', 'Something went wrong.');
        }
    }


    public function dataInfoDelete($id)
    {
        abort_if(!auth()->user()->can('user-delete'), 403);
        $dataInfo = Permission::find($id);

        if ($dataInfo) {
            $dataInfo->delete();
        }

        return back()->with('success', 'Data Delete successfully.');
    }
}
