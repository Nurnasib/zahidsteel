@if (empty($data->id))
    <div class="modal fade" id="addRowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        @else
            <div class="modal fade" id="editRowModal{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                @endif
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header state modal-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <h4 class="modal-title">
                                @if (empty($data->id)) {{ $addTitle }} @else {{ $editTitle }} @endif
                            </h4>
                        </div>

                        <div class="modal-body">
                            <div class="panel">
                                <div class="panel-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form id="myForm{{ $data->id ?? 'Add' }}" method="POST"
                                                  @if (empty($data->id))
                                                      action="{{ route('admin.slider.add.update.info') }}"
                                                  @else
                                                      action="{{ route('admin.slider.add.update.info', $data->id) }}"
                                                  @endif
                                                  enctype="multipart/form-data">
                                                @csrf

                                                @php
                                                    $storedImg   = !empty($data->image) ? json_decode($data->image) : null;
                                                    $storedVideo = $data->video ?? null;
                                                    // Determine existing media type: 'video' if video exists, else 'image'
                                                    $mediaType   = $storedVideo ? 'video' : 'image';
                                                @endphp

                                                {{-- ── Media Type Toggle ── --}}
                                                <div class="form-group">
                                                    <label>Media Type</label>
                                                    <div>
                                                        <label class="radio-inline">
                                                            <input type="radio"
                                                                   name="media_type"
                                                                   value="image"
                                                                   class="media-type-radio"
                                                                   data-suffix="{{ $data->id ?? 'Add' }}"
                                                                {{ $mediaType === 'image' ? 'checked' : '' }}>
                                                            &nbsp;Image
                                                        </label>
                                                        &nbsp;&nbsp;
<!--                                                        <label class="radio-inline">-->
<!--                                                            <input type="radio"-->
<!--                                                                   name="media_type"-->
<!--                                                                   value="video"-->
<!--                                                                   class="media-type-radio"-->
<!--                                                                   data-suffix="{{ $data->id ?? 'Add' }}"-->
<!--                                                                {{ $mediaType === 'video' ? 'checked' : '' }}>-->
<!--                                                            &nbsp;Video-->
<!--                                                        </label>-->
                                                    </div>
                                                </div>

                                                {{-- ── Image Upload ── --}}
                                                <div class="media-section-image-{{ $data->id ?? 'Add' }}"
                                                     style="display: {{ $mediaType === 'image' ? 'block' : 'none' }};">
                                                    <div class="form-group">
                                                        <label>Image</label>
                                                        <input type="file"
                                                               id="imageFile{{ $data->id ?? 'Add' }}"
                                                               name="image"
                                                               accept="image/*"
                                                               class="form-control slider-image-input"
                                                               data-suffix="{{ $data->id ?? 'Add' }}">
                                                    </div>
                                                    <div id="imagePreview{{ $data->id ?? 'Add' }}"
                                                         style="display: {{ $storedImg ? 'block' : 'none' }}; margin-bottom:10px;">
                                                        <p><strong>Current Image:</strong></p>
                                                        <img id="imageDisplay{{ $data->id ?? 'Add' }}"
                                                             src="{{ $storedImg ? asset($storedImg->original) : '' }}"
                                                             style="max-width:300px;height:200px;border:1px solid #ddd;padding:3px;">
                                                    </div>
                                                </div>

                                                {{-- ── Video Upload ── --}}
                                                <div class="media-section-video-{{ $data->id ?? 'Add' }}"
                                                     style="display: {{ $mediaType === 'video' ? 'block' : 'none' }};">
                                                    <div class="form-group">
                                                        <label>Video</label>
                                                        <input type="file"
                                                               id="videoFile{{ $data->id ?? 'Add' }}"
                                                               name="video"
                                                               accept="video/*"
                                                               class="form-control slider-video-input"
                                                               data-suffix="{{ $data->id ?? 'Add' }}">
                                                        <small class="text-muted">Accepted: mp4, webm, ogg (max 50MB)</small>
                                                    </div>
                                                    <div id="videoPreview{{ $data->id ?? 'Add' }}"
                                                         style="display: {{ $storedVideo ? 'block' : 'none' }}; margin-bottom:10px;">
                                                        <p><strong>Current Video:</strong></p>
                                                        <video id="videoDisplay{{ $data->id ?? 'Add' }}"
                                                               src="{{ $storedVideo ? asset($storedVideo) : '' }}"
                                                               controls
                                                               style="max-width:300px;height:200px;border:1px solid #ddd;padding:3px;">
                                                        </video>
                                                    </div>
                                                </div>

                                                {{-- ── Other Fields ── --}}
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input type="text" name="title"
                                                           value="{{ old('title', $data->title ?? '') }}"
                                                           class="form-control" />
                                                    @error('title')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <input type="text" name="sub_title"
                                                           value="{{ old('sub_title', $data->sub_title ?? '') }}"
                                                           class="form-control" />
                                                    @error('sub_title')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>URL</label>
                                                    <input type="url" name="url"
                                                           value="{{ old('url', $data->url ?? '') }}"
                                                           class="form-control" />
                                                    @error('url')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="form-control select2" name="status">
                                                        <option value="active"
                                                                @if(isset($data) && $data->status == 'active') selected @endif>
                                                            Active
                                                        </option>
                                                        <option value="inactive"
                                                                @if(isset($data) && $data->status == 'inactive') selected @endif>
                                                            Inactive
                                                        </option>
                                                    </select>
                                                    @error('status')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="form-group" style="padding-top: 10px">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
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
