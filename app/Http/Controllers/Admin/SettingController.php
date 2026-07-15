<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class SettingController extends Controller
{
    public function index()
    {
        $data['dataInfo'] = Setting::find(1);
        $data['title'] = 'General Setting';

        $data['dashboard'] = 'Dashboard';
        $data['subTitle'] = 'Nav List';
        $data['addTitle'] = 'Add New Nav';
        $data['editTitle'] = ' Edit Nav';

        return view('backend.setting.general', $data);
    }

    public function addOrUpdateInfo(Request $request): RedirectResponse
    {
        $request->validate([
            'site_name'       => 'nullable|string|max:255',
            'logo'            => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'favicon'         => 'nullable|image|mimes:jpg,jpeg,png,ico,webp|max:2024',
            'whitebglogo'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'phones'          => 'nullable|array',
            'phones.*'        => 'nullable|string|max:20',
            'emails'          => 'nullable|array',
            'emails.*'        => 'nullable|email|max:255',
            'addresses'       => 'nullable|array',
            'addresses.*'     => 'nullable|string|max:500',
            'url'             => 'nullable|url|max:255',
            'videoUrl'        => 'nullable|max:255',
            'iosUrl'          => 'nullable|max:255',
            'androidUrl'      => 'nullable|url|max:255',
            'webUrl'          => 'nullable|url|max:255',
            'currency'        => 'nullable|string|max:255',
            'position'        => 'nullable|in:left,right',
            'seo_title'       => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:500',
            'google_pixle'    => 'nullable|string',
            'facebook_pixle'  => 'nullable|string',
            'fb'              => 'nullable|url|max:255',
            'wp'              => 'nullable|string|max:255',
            'twitter'         => 'nullable|url|max:255',
            'youtube'         => 'nullable|url|max:255',
            'linkdi'          => 'nullable|url|max:255',
            'term_condition'  => 'nullable',
            'privacy_policy'  => 'nullable',
            'return_policy'   => 'nullable',
            'about_us'        => 'nullable',
            'footer_content'  => 'nullable',
            'brochure'=>'nullable',
            'map'  => 'nullable',
        ]);

        DB::beginTransaction();
        try {
            $dataInfo = Setting::firstOrNew(['id' => 1]);

            $dataInfo->fill($request->except([
                'logo', 'favicon', 'whitebglogo',
                'phones', 'emails', 'addresses','brochure'
            ]));

            // Image uploads
            foreach (['logo', 'whitebglogo', 'favicon','brochure'] as $field) {
                if ($request->hasFile($field)) {
                    $file      = $request->file($field);
                    $file_name = time() . '_' . $field . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('uploads/images/projects/'), $file_name);
                    $dataInfo->$field = 'uploads/images/projects/' . $file_name;
                }
            }

            // Save as clean JSON arrays
            $dataInfo->phones    = array_values(array_filter($request->phones    ?? []));
            $dataInfo->emails    = array_values(array_filter($request->emails    ?? []));
            $dataInfo->addresses = array_values(array_filter($request->addresses ?? []));

            $dataInfo->save();


            DB::commit();
            Alert::toast('Data updated successfully.', 'success');
            return back()->with('success', 'Data updated successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            Alert::toast('Something went wrong. Please try again.', 'error');
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }
}
