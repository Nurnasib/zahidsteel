<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageSeo;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PageSeoController extends Controller
{
    public function index()
    {
        $data['dashboard'] = 'Dashboard';
        $data['subTitle']  = 'Page SEO';
        $data['dataList']  = PageSeo::orderBy('id')->get();

        return view('backend.page-seo', $data);
    }

    public function addOrUpdateInfo(Request $request, $id = null)
    {
        $request->validate([
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
        ]);

        $dataInfo = PageSeo::find($id);

        if (! $dataInfo) {
            return back()->with('error', 'Data not found.');
        }

        $dataInfo->meta_title       = $request->meta_title;
        $dataInfo->meta_description = $request->meta_description;
        $dataInfo->save();

        Alert::toast('Updated successfully!', 'success');

        return back();
    }
}
