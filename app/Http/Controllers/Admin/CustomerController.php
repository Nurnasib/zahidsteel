<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class CustomerController extends Controller
{
    public function index()
    {
//        abort_if(!auth()->user()->can('user-list'), 403);
        $data['title'] = "Add Customer";
        $data['dashboard'] ="Dashboard";
        $data['subTitle'] ="Customer";
        $data['addTitle'] = "Add New Customer";
        $data['editTitle'] = "Edit Customer";
        $data['roles'] = Role::all();

        $data['dataList'] = User::where('roleType','customer')
            ->orderBy('id','desc')
            ->get();

        return view('backend.customer', $data);
    }

    public function details($id =null)
    {
//        abort_if(!auth()->user()->can('user-list'), 403);
        $data['title'] = "Add Customer";
        $data['dashboard'] ="Dashboard";
        $data['subTitle'] ="Customer";
        $data['addTitle'] = "Add New Customer";
        $data['editTitle'] = "Edit Customer";
        $data['roles'] = Role::all();

        $data['dataList'] = User::find($id);
        $data['orders']     = Order::with(
            'orderDetails',
            'orderDetails.product',
            'orderDetails.color.colors',
            'orderDetails.color.colorImages',
            'orderDetails.size.sizes'
        )->where('user_id',$id)->orderBy('id','desc')->get();

        return view('backend.order.customer-details', $data);
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



            'password' => $id ? 'nullable|min:6' : 'required|min:6',

        ]);

        DB::beginTransaction();

        try {

            $dataInfo = $id ? User::find($id) : new User();

            if (!$dataInfo) {
                return back()->with('error', 'Data not found.');
            }

            $dataInfo->name  = $request->name;
            $dataInfo->email = $request->email;
            $dataInfo->phone = $request->phone;
            $dataInfo->roleType = 'customer';



            // ✅ Hash password if provided
            if ($request->filled('password')) {
                $dataInfo->password = bcrypt($request->password);
            }

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
        $dataInfo = User::find($id);

        if ($dataInfo) {
            $dataInfo->delete();
        }

        return back()->with('success', 'Data Delete successfully.');
    }
}
