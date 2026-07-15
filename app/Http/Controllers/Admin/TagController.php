<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class TagController extends Controller
{
    public function index()
    {

        $data['title'] = 'Add Tag';
        $data['dashboard'] = 'Dashboard';
        $data['subTitle'] = 'Tag';
        $data['addTitle'] = 'Add New Tag';
        $data['editTitle'] = ' Edit Tag';
        $data['dataList'] = Tag::OrderBy('id', 'desc')->get();

        return view('backend.tag', $data);
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
            $dataInfo = $id ? Tag::find($id) : new Tag;
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
        abort_if(! auth()->user()->can('blog-tag-monarch-delete'), 403);
        $dataInfo = Tag::find($id);
        $dataInfo->delete();

        return back()->with('success', 'Data Delete successfully.');
    }
}
