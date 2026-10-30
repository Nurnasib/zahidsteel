<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\ServicePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class MenuController extends Controller
{
    public function index()
    {
        $data['title']     = 'Add Menu Item';
        $data['dashboard'] = 'Dashboard';
        $data['subTitle']  = 'Navigation Menu';
        $data['addTitle']  = 'Add Menu Item';
        $data['editTitle'] = 'Edit Menu Item';
        $data['dataList']  = Menu::with(['page', 'children.page'])->whereNull('parent_id')->orderBy('serial')->orderBy('id')->get();
        $data['pages']     = ServicePage::orderBy('type')->orderBy('title')->get()->groupBy('type');

        return view('backend.menu', $data);
    }

    public function addOrUpdateInfo(Request $request, $id = null)
    {
        $request->validate([
            'title'     => 'required|string|max:255',
            'parent_id' => 'nullable|integer|exists:menus,id',
            'link_type' => 'required|in:page,url',
            'page_id'   => 'required_if:link_type,page|nullable|integer|exists:service_pages,id',
            'url'       => 'nullable|string|max:255',
            'auto_children' => 'nullable|in:' . implode(',', array_keys(Menu::AUTO_CHILDREN)),
        ]);

        try {
            $dataInfo = $id ? Menu::find($id) : new Menu();

            if (! $dataInfo) {
                return back()->with('error', 'Menu item not found.');
            }

            // Only two levels: a submenu's parent must be a top-level item, and an item with children stays top-level
            $parentId = $request->parent_id ?: null;
            if ($parentId) {
                $parent = Menu::find($parentId);
                if ($parent->parent_id || $parent->id == $dataInfo->id || ($dataInfo->exists && $dataInfo->children()->exists())) {
                    Alert::toast('Submenus can only sit under a top-level item, and an item with submenus must stay top-level.', 'error');

                    return back();
                }
            }

            // Moving to another level puts the item at the end of that level
            if (! $dataInfo->exists || $dataInfo->parent_id != $parentId) {
                $dataInfo->serial = (int) Menu::where('parent_id', $parentId)->max('serial') + 1;
            }

            $dataInfo->title     = $request->title;
            $dataInfo->parent_id = $parentId;
            $dataInfo->page_id   = $request->link_type === 'page' ? $request->page_id : null;
            $dataInfo->url       = $request->link_type === 'url' ? ($request->url ?: '#') : null;
            $dataInfo->auto_children = $parentId ? null : ($request->auto_children ?: null); // submenus can't have submenus
            $dataInfo->new_tab   = $request->boolean('new_tab');
            $dataInfo->status    = $request->boolean('status');
            $dataInfo->save();

            Alert::toast($id ? 'Updated successfully!' : 'Menu item added!', 'success');

            return back();

        } catch (\Exception $e) {
            Log::error('Menu addOrUpdateInfo error: ' . $e->getMessage());

            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function reorder(Request $request)
    {
        $validated = $request->validate([
            'order'   => 'required|array',
            'order.*' => 'required|integer|exists:menus,id',
        ]);

        DB::beginTransaction();
        try {
            foreach (array_values($validated['order']) as $index => $menuId) {
                Menu::where('id', $menuId)->update(['serial' => $index + 1]);
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
        $dataInfo = Menu::find($id);

        if (! $dataInfo) {
            return back()->with('error', 'Data not found.');
        }

        // Submenus are removed with their parent (cascade); linked pages are kept
        $dataInfo->delete();

        Alert::toast('Menu item deleted!', 'success');

        return back();
    }
}
