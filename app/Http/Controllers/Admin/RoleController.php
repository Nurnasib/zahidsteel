<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use DB;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */

//    public static function middleware(): array
//    {
//        return [
//            'permission:role-list|role-create|role-edit|role-delete' => ['only' => ['index', 'show']],
//            'permission:role-create' => ['only' => ['create', 'store']],
//            'permission:role-edit' => ['only' => ['edit', 'update']],
//            'permission:role-delete' => ['only' => ['destroy']],
//        ];
//    }
    public function index(Request $request): View
    {
        abort_if(!auth()->user()->can('role-list'), 403);
        $data['roles'] = Role::orderBy('id','DESC')->get();
        $data['title'] = "Add Role";
        $data['dashboard'] ="Dashboard";
        $data['subTitle'] ="Role";
        $data['addTitle'] = "Add New Role";
        $data['editTitle'] = "Edit Role";
        return view('backend.roles.index',$data)->with('i', ($request->input('page', 1) - 1) * 5);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        abort_if(!auth()->user()->can('role-create'), 403);
        $data['permission'] = Permission::get();
        return view('backend.roles.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => 'required|unique:roles,name',
            'permission' => 'required|array|min:1',
        ]);


        $permissionsID = array_map(
            function($value) { return (int)$value; },
            $request->input('permission')
        );

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($permissionsID);

        return redirect()->route('admin.roles.index')
            ->with('success','Role created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();


        return view('backend.roles.show',compact('role','rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        abort_if(!auth()->user()->can('role-edit'), 403);
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        return view('backend.roles.edit',compact('role','permission','rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): RedirectResponse
    {

        $request->validate([
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $permissionsID = array_map(
            function($value) { return (int)$value; },
            $request->input('permission')
        );

        $role->syncPermissions($permissionsID);

        return redirect()->route('admin.roles.index')
            ->with('success','Role updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): RedirectResponse
    {

        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('admin.roles.index')
            ->with('success','Role deleted successfully');
    }
}
