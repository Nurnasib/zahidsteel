@if (empty($data->id))
    <div class="modal fade" id="addRowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        @else
            <div class="modal fade" id="editRowModal{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                @endif
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header state modal-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                            <h4 class="modal-title" id="modal-default-label">
                                @if (empty($data->id))
                                    {{ $addTitle }}
                                @else
                                    {{ $editTitle }}
                                @endif
                            </h4>
                        </div>

                        <div class="modal-body">
                            <div class="panel">
                                <div class="panel-content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form id="myForm" method="POST"
                                                  @if (empty($data->id)) action="{{ route('admin.banner.add.update.info') }}" @else action="{{ route('admin.banner.add.update.info', $data->id) }}" @endif
                                                  enctype="multipart/form-data">
                                                @csrf



                                                @php
                                                    $storedImg = !empty($data->image) ? json_decode($data->image) : null;
                                                @endphp

                                                <div class="form-group">
                                                    <label for="imageFile">Logo</label>
                                                    <input type="file" id="imageFile"
                                                           name="image"
                                                           accept="image/*"
                                                           class="form-control">
                                                </div>

                                                <div id="imagePreview"
                                                     style="display: {{ $storedImg ? 'block' : 'none' }};">

                                                    <p><strong>Selected Image:</strong></p>

                                                    <img id="imageDisplay"
                                                         src="{{ $storedImg ? asset($storedImg->original) : '' }}"
                                                         style="max-width:300px;height:200px;border:1px solid #ddd;padding:3px">
                                                </div>

                                                <div class="form-group">
                                                    <label for="email">Status</label>
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
