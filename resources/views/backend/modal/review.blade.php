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
                            <h4 class="modal-name" id="modal-default-label">
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
                                                  @if (empty($data->id)) action="{{ route('admin.review.add.update.info') }}" @else action="{{ route('admin.review.add.update.info', $data->id) }}" @endif
                                                  enctype="multipart/form-data">
                                                @csrf

                                                <div class="form-group">
                                                    <label for="email">Name</label>
                                                    <input type="text" name="title"
                                                           value="{{ old('title', $data->title ?? ' ') }}"
                                                           class="form-control" />
                                                    @error('title')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>


                                                <div class="form-group">
                                                    <label for="email">Designation</label>
                                                    <input type="text" name="designation"
                                                           value="{{ old('designation', $data->designation ?? ' ') }}"
                                                           class="form-control" />
                                                    @error('designation')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Review</label>
                                                    <textarea type="text" name="review"

                                                              class="form-control " >{!!   old('review', $data->review ?? ' ') !!}
                                                 </textarea>
                                                    @error('review')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <!-- Blade: inside the form -->
                                                <div id="imageField" class="input-field">
                                                    <div class="form-group">
                                                        <label for="imageFile">Profile Image:</label>
                                                        <input type="file" id="imageFile" name="image" accept="image/*">
                                                    </div>
                                                    <div id="imagePreview" class="preview"
                                                         style="display: {{ !empty($data->image) ? 'block' : 'none' }};">
                                                        <p><strong>Selected Image:</strong></p>
                                                        <img id="imageDisplay"
                                                             src="{{ !empty($data->image) ? asset($data->image) : '' }}" alt="Preview"
                                                             style="max-width: 300px;height:200px">
                                                    </div>
                                                </div>


                                                <div class="form-group mb-3">
                                                    <label for="linkedin">Rating</label>
                                                    <input type="text" name="rating"    value="{{ old('rating', $data->rating ?? ' ') }}" id="rating" class="form-control"
                                                           placeholder="Enter Rating">
                                                    @error('rating')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

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
