<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadHelper;
use App\Http\Controllers\Controller;
use App\Models\ServicePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class ServicePageController extends Controller
{
    public function index()
    {
        $data['title']     = 'Add Page';
        $data['dashboard'] = 'Dashboard';
        $data['subTitle']  = 'Pages';
        $data['addTitle']  = 'Add New Page';
        $data['editTitle'] = 'Edit Page';
        $data['dataList']  = ServicePage::withCount('menus')->orderByRaw("FIELD(type, 'service', 'product', 'page')")->orderBy('id')->get();

        return view('backend.service-page', $data);
    }

    public function addOrUpdateInfo(Request $request, $id = null)
    {
        // URL key: given slug, else derived from the title
        $request->merge(['key' => Str::slug($request->input('key') ?: $request->input('title'))]);

        $request->validate([
            'type'             => 'required|in:' . implode(',', array_keys(ServicePage::TYPES)),
            'key'              => 'required|alpha_dash|max:191|unique:service_pages,key,' . ($id ?: 'NULL'),
            'image'            => 'nullable|image|max:2048',
            'blocks'           => 'nullable|array',
            'blocks.*.image'   => 'nullable|image|max:2048',
            'gallery_images'   => 'nullable|array',
            'gallery_images.*' => 'nullable|image|max:2048',
            'remove_gallery'   => 'nullable|array',
            'title'            => 'required|string|max:255',
            'subtitle'         => 'nullable|string|max:255',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'body'             => 'nullable|string',
        ]);

        DB::beginTransaction();

        try {
            $dataInfo = $id ? ServicePage::find($id) : new ServicePage();

            if (! $dataInfo) {
                return back()->with('error', 'Page not found.');
            }

            $dataInfo->type     = $request->type;
            $dataInfo->key      = $request->key;
            $dataInfo->title    = $request->title;
            $dataInfo->subtitle = $request->subtitle;
            $dataInfo->meta_title       = $request->meta_title;
            $dataInfo->meta_description = $request->meta_description;
            $dataInfo->body     = $request->body;

            // Optional hero image
            if ($request->hasFile('image')) {

                if (! empty($dataInfo->image)) {
                    $old = json_decode($dataInfo->image, true);
                    if (is_array($old)) {
                        foreach ($old as $imgPath) {
                            if (is_string($imgPath) && file_exists(public_path($imgPath))) {
                                @unlink(public_path($imgPath));
                            }
                        }
                    }
                }

                $uploaded        = UploadHelper::responsiveUpload($request->file('image'), 'uploads/service-page');
                $dataInfo->image = json_encode($uploaded);
            }

            // ── Blocks (text + image) ─────────────────────────────────────────────
            $oldBlockPaths = [];
            foreach (json_decode($dataInfo->blocks ?? '[]', true) ?: [] as $ob) {
                if (! empty($ob['image']) && is_array($ob['image'])) {
                    foreach ($ob['image'] as $p) {
                        if (is_string($p)) { $oldBlockPaths[$p] = true; }
                    }
                }
            }

            $newBlocks  = [];
            $keptPaths  = [];
            foreach ($request->input('blocks', []) as $i => $b) {
                $text = $b['text'] ?? '';

                $img = null;
                if ($request->hasFile("blocks.$i.image")) {
                    $img = UploadHelper::responsiveUpload($request->file("blocks.$i.image"), 'uploads/service-page/blocks');
                } elseif (! empty($b['existing_image'])) {
                    $decoded = json_decode($b['existing_image'], true);
                    if (is_array($decoded)) { $img = $decoded; }
                }

                // Skip a block with neither text nor image
                if (trim(strip_tags($text)) === '' && ! $img) {
                    continue;
                }

                if (is_array($img)) {
                    foreach ($img as $p) {
                        if (is_string($p)) { $keptPaths[$p] = true; }
                    }
                }

                $newBlocks[] = ['text' => $text, 'image' => $img];
            }

            // Delete block image files no longer referenced
            foreach (array_keys($oldBlockPaths) as $p) {
                if (! isset($keptPaths[$p]) && file_exists(public_path($p))) {
                    @unlink(public_path($p));
                }
            }

            $dataInfo->blocks = ! empty($newBlocks) ? json_encode($newBlocks) : null;

            // ── Gallery ───────────────────────────────────────────────────────────
            $gallery = ! empty($dataInfo->gallery) ? json_decode($dataInfo->gallery, true) : [];

            // Remove selected existing images
            $remove = $request->input('remove_gallery', []);
            if (! empty($remove)) {
                foreach ($remove as $idx) {
                    if (isset($gallery[$idx])) {
                        foreach ((array) $gallery[$idx] as $imgPath) {
                            if (is_string($imgPath) && file_exists(public_path($imgPath))) {
                                @unlink(public_path($imgPath));
                            }
                        }
                        unset($gallery[$idx]);
                    }
                }
                $gallery = array_values($gallery);
            }

            // Append newly uploaded images
            if ($request->hasFile('gallery_images')) {
                foreach ($request->file('gallery_images') as $file) {
                    if ($file) {
                        $gallery[] = UploadHelper::responsiveUpload($file, 'uploads/service-page/gallery');
                    }
                }
            }

            $dataInfo->gallery = ! empty($gallery) ? json_encode($gallery) : null;

            $dataInfo->save();

            DB::commit();

            Alert::toast($id ? 'Updated successfully!' : 'Page created successfully!', 'success');

            return back();

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('ServicePage addOrUpdateInfo error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
            ]);

            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function dataInfoDelete(Request $request, $id = null)
    {
        $dataInfo = ServicePage::withCount('menus')->find($id);

        if (! $dataInfo) {
            return back()->with('error', 'Data not found.');
        }

        if ($dataInfo->menus_count > 0) {
            Alert::toast('This page is linked from the navigation menu. Remove or relink those menu items first.', 'error');

            return back();
        }

        // Remove uploaded files: hero image, block images and gallery
        $images = array_merge(
            [json_decode($dataInfo->image ?? '', true)],
            array_column(json_decode($dataInfo->blocks ?? '[]', true) ?: [], 'image'),
            json_decode($dataInfo->gallery ?? '[]', true) ?: []
        );
        foreach ($images as $img) {
            foreach ((array) $img as $imgPath) {
                if (is_string($imgPath) && file_exists(public_path($imgPath))) {
                    @unlink(public_path($imgPath));
                }
            }
        }

        $dataInfo->delete();

        Alert::toast('Page deleted successfully!', 'success');

        return back();
    }
}
