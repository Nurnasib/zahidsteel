{{-- ════════════════════════════════════════════════════════════════
     backend/modal/service-page.blade.php  —  Edit a single service page
════════════════════════════════════════════════════════════════ --}}
<div class="modal fade" id="editRowModal{{ $data->id }}" tabindex="-1"
     aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header state modal-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">{{ $editTitle }} — <span style="text-transform:capitalize;">{{ $data->key }}</span></h4>
            </div>

            <div class="modal-body">
                <div class="panel">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-md-12">

                                <form method="POST"
                                      action="{{ route('admin.service-page.add.update.info', $data->id) }}"
                                      enctype="multipart/form-data">
                                    @csrf

                                    {{-- Title --}}
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control"
                                               placeholder="Page title"
                                               value="{{ old('title', $data->title) }}" />
                                    </div>

                                    {{-- Subtitle --}}
                                    <div class="form-group">
                                        <label>Subtitle <small class="text-muted">(short line under the title)</small></label>
                                        <input type="text" name="subtitle" class="form-control"
                                               placeholder="Subtitle"
                                               value="{{ old('subtitle', $data->subtitle) }}" />
                                    </div>

                                    {{-- Top image + text blocks --}}
                                    <div class="form-group">
                                        <label>Top Blocks <small class="text-muted">(text + image shown at the top, two columns — images auto-alternate left/right)</small></label>
                                        @php $blocks = !empty($data->blocks) ? json_decode($data->blocks, true) : []; @endphp
                                        <div id="blocksWrapper{{ $data->id }}">
                                            @foreach($blocks as $bi => $b)
                                                @php $bimg = $b['image'] ?? null; @endphp
                                                <div class="sp-block-row" style="border:1px solid #e0e0e0;border-radius:6px;padding:12px;margin-bottom:12px;position:relative;background:#fff;">
                                                    <button type="button" class="btn btn-danger btn-xs sp-remove-block" style="position:absolute;top:8px;right:8px;z-index:2;">&times;</button>
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            <label style="font-size:12px;color:#555;">Text</label>
                                                            <textarea name="blocks[{{ $bi }}][text]" class="form-control summernote">{!! $b['text'] ?? '' !!}</textarea>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <label style="font-size:12px;color:#555;">Image</label>
                                                            <input type="hidden" name="blocks[{{ $bi }}][existing_image]" class="sp-existing-image" value="{{ $bimg ? json_encode($bimg) : '' }}">
                                                            <div class="sp-block-thumb" style="margin-bottom:6px;{{ $bimg ? '' : 'display:none;' }}">
                                                                <img src="{{ $bimg ? asset($bimg['small'] ?? $bimg['original']) : '' }}" style="width:100%;max-height:120px;object-fit:cover;border:1px solid #ddd;border-radius:4px;">
                                                                <button type="button" class="btn btn-default btn-xs sp-remove-image" style="margin-top:4px;">Remove image</button>
                                                            </div>
                                                            <input type="file" name="blocks[{{ $bi }}][image]" accept="image/*" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <button type="button" class="btn btn-o btn-primary btn-xs sp-add-block"
                                                data-wrapper="blocksWrapper{{ $data->id }}">+ Add block</button>
                                    </div>

                                    {{-- Hero image (optional) --}}
                                    @php $storedImg = !empty($data->image) ? json_decode($data->image) : null; @endphp
                                    <div class="form-group">
                                        <label>Hero Image <small class="text-muted">(optional)</small></label>
                                        <input type="file"
                                               name="image"
                                               accept="image/*"
                                               class="form-control sp-image-input"
                                               data-preview="imageDisplay{{ $data->id }}"
                                               data-preview-wrap="imagePreview{{ $data->id }}">
                                    </div>
                                    <div id="imagePreview{{ $data->id }}"
                                         style="display:{{ $storedImg ? 'block' : 'none' }};margin-bottom:10px;">
                                        <img id="imageDisplay{{ $data->id }}"
                                             src="{{ $storedImg ? asset($storedImg->original) : '' }}"
                                             style="max-width:320px;height:auto;border:1px solid #ddd;padding:3px;">
                                    </div>

                                    {{-- Gallery (multiple images) --}}
                                    @php $gallery = !empty($data->gallery) ? json_decode($data->gallery) : []; @endphp
                                    <div class="form-group">
                                        <label>Gallery <small class="text-muted">(upload one or more photos — shown in a grid on the page)</small></label>
                                        <input type="file"
                                               name="gallery_images[]"
                                               accept="image/*"
                                               multiple
                                               class="form-control">
                                    </div>

                                    @if(!empty($gallery))
                                        <div class="form-group">
                                            <label class="text-muted" style="font-size:12px;">Current gallery — tick to remove on save</label>
                                            <div style="display:flex;flex-wrap:wrap;gap:12px;">
                                                @foreach($gallery as $gi => $g)
                                                    <label style="display:inline-block;border:1px solid #ddd;border-radius:6px;padding:6px;text-align:center;cursor:pointer;">
                                                        <img src="{{ asset($g->small ?? $g->original) }}" style="width:90px;height:70px;object-fit:cover;display:block;margin-bottom:4px;">
                                                        <span style="font-size:12px;color:#c0392b;">
                                                            <input type="checkbox" name="remove_gallery[]" value="{{ $gi }}"> remove
                                                        </span>
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif

                                    {{-- Body (Summernote) --}}
                                    <div class="form-group">
                                        <label>Page Content</label>
                                        <textarea name="body" class="form-control summernote">{!! old('body', $data->body) !!}</textarea>
                                    </div>

                                    <div class="form-group text-right" style="margin-top:14px;">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
