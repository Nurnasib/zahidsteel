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
                                                      action="{{ route('admin.why-choose-us.add.update.info') }}"
                                                  @else
                                                      action="{{ route('admin.why-choose-us.add.update.info', $data->id) }}"
                                                  @endif
                                                  enctype="multipart/form-data">
                                                @csrf



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

                                                {{-- ── Description (Summernote) ────────────────────────────── --}}
                                                {{-- The .summernote class is picked up by the shown.bs.modal
                                                     listener in master.blade.php and initialised then, so the
                                                     icon picker toolbar button is always present. --}}
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea name="description"
                                                              rows="3"
                                                              class="form-control summernote"
                                                              placeholder="Enter description"
                                                    >
{{ old('description', $data->description ?? '') }}</textarea>                 @error('description')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                {{-- ── Service Notes ───────────────────────────────────────── --}}
                                                {{-- Icon Picker --}}
                                                <div style="flex:0 0 auto;">
                                                    <label style="font-size:12px;color:#555;display:block;">Icon</label>
                                                    <div class="icon-picker-wrap" style="position:relative;">

                                                        {{-- Hidden input — value sent to server --}}
                                                        <input type="hidden"
                                                               name="icon"
                                                               class="note-icon-input"
                                                               value="{{ old('icon', $data->icon ?? 'fa-check-circle') }}">

                                                        {{-- Trigger button --}}
                                                        <button type="button"
                                                                class="icon-picker-trigger btn btn-default btn-sm"
                                                                onclick="toggleIconPicker(this)"
                                                                style="display:flex;align-items:center;gap:6px;min-width:140px;">
                                                            <i class="fa {{ old('icon', $data->icon ?? 'fa-check-circle') }}"
                                                               style="color:#e91e8c;font-size:16px;"></i>
                                                            <span class="icon-label">{{ old('icon', $data->icon ?? 'fa-check-circle') }}</span>
                                                            <i class="fa fa-caret-down" style="margin-left:auto;"></i>
                                                        </button>

                                                        {{-- Dropdown panel --}}
                                                        <div class="icon-picker-dropdown"
                                                             style="display:none;position:absolute;z-index:9999;
                    background:#fff;border:1px solid #ccc;
                    border-radius:6px;padding:8px;
                    width:310px;max-height:220px;overflow-y:auto;
                    box-shadow:0 6px 18px rgba(0,0,0,.16);
                    top:38px;left:0;">
                                                            <input type="text"
                                                                   class="form-control input-sm icon-search"
                                                                   placeholder="Search icon…"
                                                                   style="margin-bottom:8px;"
                                                                   oninput="filterIcons(this)">
                                                            <div class="icon-grid"
                                                                 style="display:flex;flex-wrap:wrap;gap:4px;"></div>
                                                        </div>

                                                    </div>{{-- /.icon-picker-wrap --}}
                                                </div>
                                                {{-- ── Status ──────────────────────────────────────────────── --}}
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="form-control select2" name="status">
                                                        <option value="active"
                                                                @if(isset($data->status) && $data->status === 'active') selected @endif>
                                                            Active
                                                        </option>
                                                        <option value="inactive"
                                                                @if(isset($data->status) && $data->status === 'inactive') selected @endif>
                                                            Inactive
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
