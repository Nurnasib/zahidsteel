{{-- backend/modal/page-create.blade.php  —  Create a page (content is filled in via Edit afterwards) --}}
<div class="modal fade" id="addRowModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header state modal-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">{{ $addTitle }}</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.page.add.update.info') }}">
                    @csrf
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" required placeholder="Page title" />
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <select name="type" class="form-control">
                            @foreach(\App\Models\ServicePage::TYPE_LABELS as $typeKey => $typeLabel)
                                <option value="{{ $typeKey }}">{{ $typeLabel }} (/{{ \App\Models\ServicePage::TYPES[$typeKey] }}/…)</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>URL Key <small class="text-muted">(optional — generated from the title when empty)</small></label>
                        <input type="text" name="key" class="form-control" placeholder="e.g. industrial-shed" />
                    </div>
                    <p class="text-muted" style="font-size:12px;">After creating, click <b>Edit</b> to add content, images and SEO, then link it from <b>Menus</b>.</p>
                    <div class="form-group text-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Create Page</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
