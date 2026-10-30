{{-- ════════════════════════════════════════════════════════════════
     backend/modal/service.blade.php
     Used for BOTH Add (empty $data) and Edit (populated $data).
════════════════════════════════════════════════════════════════ --}}

@if (empty($data->id))
    <div class="modal fade" id="addRowModal" tabindex="-1"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        @else
            <div class="modal fade" id="editRowModal{{ $data->id }}" tabindex="-1"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                @endif

                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">

                        {{-- ── Header ──────────────────────────────────────────────────── --}}
                        <div class="modal-header state modal-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <h4 class="modal-title">
                                @if (empty($data->id)) {{ $addTitle }} @else {{ $editTitle }} @endif
                            </h4>
                        </div>

                        {{-- ── Body ───────────────────────────────────────────────────── --}}
                        <div class="modal-body">
                            <div class="panel">
                                <div class="panel-content">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <form id="myForm{{ $data->id ?? 'Add' }}"
                                                  method="POST"
                                                  @if (empty($data->id))
                                                      action="{{ route('admin.project.add.update.info') }}"
                                                  @else
                                                      action="{{ route('admin.project.add.update.info', $data->id) }}"
                                                  @endif
                                                  enctype="multipart/form-data">
                                                @csrf

                                                {{-- ── Gallery ──────────────────────────────────────────────── --}}
                                                @php
                                                $existingGallery = isset($data->id)
                                                ? \App\Models\ProjectGallery::where('project_id', $data->id)->get()
                                                : collect();
                                                @endphp

                                                <div class="form-group">
                                                    <label>Gallery</label>
                                                    <input type="file"
                                                           id="imageFile{{ $data->id ?? 'Add' }}"
                                                           name="gallery[]"
                                                           accept="image/*"
                                                           class="form-control"
                                                           multiple="multiple"
                                                           data-preview-wrap="imagePreview{{ $data->id ?? 'Add' }}">
                                                </div>

                                                {{-- Existing stored images (edit mode) --}}
                                                @if($existingGallery->count())
                                                <div style="margin-bottom:10px;">
                                                    <p><strong>Current Gallery:</strong> <small class="text-muted">— tick to remove on save; new uploads are added alongside these</small></p>
                                                    <div style="display:flex;flex-wrap:wrap;gap:8px;">
                                                        @foreach($existingGallery as $gItem)
                                                        @php $gImg = json_decode($gItem->gallery, true); @endphp
                                                        @if(!empty($gImg['original']))
                                                        <label style="display:inline-block;text-align:center;cursor:pointer;font-weight:normal;">
                                                            <img src="{{ asset($gImg['original']) }}"
                                                                 style="width:100px;height:80px;object-fit:cover;border:1px solid #ddd;padding:2px;display:block;">
                                                            <span style="font-size:12px;color:#c0392b;">
                                                                <input type="checkbox" name="remove_images[]" value="{{ $gItem->id }}"> remove
                                                            </span>
                                                        </label>
                                                        @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @endif

                                                {{-- New file preview (JS populated) --}}
                                                <div id="imagePreview{{ $data->id ?? 'Add' }}"
                                                     style="display:none; margin-bottom:10px;">
                                                    <p><strong>New Selected Images:</strong></p>
                                                    <div id="imageDisplay{{ $data->id ?? 'Add' }}"
                                                         style="display:flex;flex-wrap:wrap;gap:8px;"></div>
                                                </div>

                                                {{-- ── Title ──────────────────────────────────────────────── --}}
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input type="text" name="title" class="form-control"
                                                           placeholder="Enter title"
                                                           value="{{ old('title', $data->title ?? '') }}" />
                                                    @error('title')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Building Type</label>
                                                    <input type="text" name="type" class="form-control"
                                                           placeholder="Enter type"
                                                           value="{{ old('type', $data->type ?? '') }}" />
                                                    @error('type')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Building Size</label>
                                                    <input type="text" name="size" class="form-control"
                                                           placeholder="Enter size"
                                                           value="{{ old('size', $data->size ?? '') }}" />
                                                    @error('size')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Location</label>
                                                    <input type="text" name="location" class="form-control"
                                                           placeholder="Enter location"
                                                           value="{{ old('location', $data->location ?? '') }}" />
                                                    @error('location')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>


                                                {{-- ── Status ──────────────────────────────────────────────── --}}
                                                <div class="form-group">
                                                    <label>Project Status</label>
                                                    <select class="form-control select2" name="status">
                                                        <option value="active"
                                                                @if(isset($data->status) && $data->status === 'active') selected @endif>
                                                            Completed Projects
                                                        </option>
                                                        <option value="inactive"
                                                                @if(isset($data->status) && $data->status === 'inactive') selected @endif>
                                                            Running Projects
                                                        </option>
                                                    </select>
                                                    @error('status')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                {{-- ── Submit ──────────────────────────────────────────────── --}}
                                                <div class="form-group" style="padding-top:10px;">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>{{-- /.modal-body --}}

                    </div>
                </div>
            </div>
