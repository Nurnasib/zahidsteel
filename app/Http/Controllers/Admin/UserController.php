<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        abort_if(!auth()->user()->can('user-list'), 403);
        $data['title'] = "Add User";
        $data['dashboard'] ="Dashboard";
        $data['subTitle'] ="User";
        $data['addTitle'] = "Add New User";
        $data['editTitle'] = "Edit User";
        $data['roles'] = Role::all();

        $data['dataList'] = User::where('roleType','user')
            ->orderBy('id','desc')
            ->get();

        return view('backend.user', $data);
    }


    public function addOrUpdateInfo(Request $request, $id = null)
    {
        // ✅ Validation
        abort_if(!auth()->user()->can('user-create'), 403);
        $validatedData = $request->validate([

            'name' => 'required|string|max:255',

            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($id)
            ],

            'phone' => [
                'required',
                Rule::unique('users', 'phone')->ignore($id)
            ],

            'roles' => 'required',

            'password' => $id ? 'nullable|min:6' : 'required|min:6',

        ]);

        DB::beginTransaction();

        try {

            $dataInfo = $id ? User::find($id) : new User();

            if (!$dataInfo) {
                return back()->with('error', 'Data not found.');
            }
            $input = $request->roles;
            $dataInfo->name  = $request->name;
            $dataInfo->email = $request->email;
            $dataInfo->phone = $request->phone;
            $dataInfo->roleType = 'user';



            // ✅ Hash password if provided
            if ($request->filled('password')) {
                $dataInfo->password = bcrypt($request->password);
            }

            $dataInfo->save();
            $dataInfo->assignRole($request->input('roles'));

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
        $dataInfo = User::find($id);

        if ($dataInfo) {
            $dataInfo->delete();
        }

        return back()->with('success', 'Data Delete successfully.');
    }
}
