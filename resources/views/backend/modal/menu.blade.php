{{-- backend/modal/menu.blade.php  —  Add (no $item) or edit a navigation menu item --}}
@php
    $item     = $item ?? null;
    $modalId  = $item ? 'editRowModal' . $item->id : 'addRowModal';
    $linkType = ($item && ! $item->page_id) ? 'url' : 'page';
@endphp
<div class="modal fade" id="{{ $modalId }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header state modal-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">{{ $item ? $editTitle . ' — ' . $item->title : $addTitle }}</h4>
            </div>
            <div class="modal-body">
                <form method="POST" class="menu-form"
                      action="{{ $item ? route('admin.menu.add.update.info', $item->id) : route('admin.menu.add.update.info') }}">
                    @csrf

                    <div class="form-group">
                        <label>Menu Label</label>
                        <input type="text" name="title" class="form-control" required value="{{ $item->title ?? '' }}" placeholder="e.g. Products" />
                    </div>

                    <div class="form-group">
                        <label>Position</label>
                        <select name="parent_id" class="form-control">
                            <option value="">Top-level menu item</option>
                            @foreach($dataList as $top)
                                @continue($item && $top->id === $item->id)
                                <option value="{{ $top->id }}" @selected($item && $item->parent_id === $top->id)>Submenu of “{{ $top->title }}”</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Links to</label><br>
                        <label class="radio-inline"><input type="radio" name="link_type" value="page" class="menu-link-type" @checked($linkType === 'page')> A page (from Pages)</label>
                        <label class="radio-inline"><input type="radio" name="link_type" value="url" class="menu-link-type" @checked($linkType === 'url')> Custom URL</label>
                    </div>

                    <div class="form-group menu-link-page" style="{{ $linkType === 'page' ? '' : 'display:none;' }}">
                        <select name="page_id" class="form-control">
                            <option value="">— choose a page —</option>
                            @foreach($pages as $type => $group)
                                <optgroup label="{{ \App\Models\ServicePage::TYPE_LABELS[$type] ?? $type }}">
                                    @foreach($group as $p)
                                        <option value="{{ $p->id }}" @selected($item && $item->page_id === $p->id)>{{ $p->title }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group menu-link-url" style="{{ $linkType === 'url' ? '' : 'display:none;' }}">
                        <input type="text" name="url" class="form-control" value="{{ $item->url ?? '' }}" placeholder="/about-us#s1  or  https://example.com  or  #" />
                        <small class="text-muted">Site paths start with “/”. Use “#” for a label that only opens its submenu.</small>
                    </div>

                    <div class="form-group">
                        <label>Auto-fill submenu <small class="text-muted">(top-level items only — added after any manual submenu items)</small></label>
                        <select name="auto_children" class="form-control">
                            <option value="">None</option>
                            @foreach(\App\Models\Menu::AUTO_CHILDREN as $source => $sourceLabel)
                                <option value="{{ $source }}" @selected($item?->auto_children === $source)>{{ $sourceLabel }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="checkbox-inline"><input type="checkbox" name="new_tab" value="1" @checked($item?->new_tab)> Open in new tab</label>
                        <label class="checkbox-inline"><input type="checkbox" name="status" value="1" @checked($item ? $item->status : true)> Visible on website</label>
                    </div>

                    <div class="form-group text-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">{{ $item ? 'Save Changes' : 'Add Item' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
