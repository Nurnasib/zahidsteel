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
                                                  @if (empty($data->id)) action="{{ route('admin.team.add.update.info') }}" @else action="{{ route('admin.team.add.update.info', $data->id) }}" @endif
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Team Type</label>
                                                    <select class="form-control select2" name="teamType">
                                                        <option value="1"
                                                                @if(isset($data) && $data->teamType == '1') selected @endif>
                                                            Board of Directors
                                                        </option>
                                                        <option value="2"
                                                                @if(isset($data) && $data->teamType == '2') selected @endif>
                                                            Executive Team
                                                        </option>
                                                    </select>
                                                    @error('teamType')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="email">Name</label>
                                                    <input type="text" name="name"
                                                           value="{{ old('name', $data->name ?? ' ') }}"
                                                           class="form-control" />
                                                    @error('name')
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
                                                    <label for="email">Description</label>
                                                    <textarea type="text" name="description"

                                                              class="form-control " >{!!   old('description', $data->description ?? ' ') !!}
                                                 </textarea>
                                                    @error('description')
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
                                                    <label for="facebook">Facebook</label>
                                                    <input type="text" name="fb" id="fb"     value="{{ old('fb', $data->fb ?? ' ') }}"  class="form-control"
                                                           placeholder="Enter Facebook URL">
                                                    @error('fb')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="whatsapp">Instagram</label>
                                                    <input type="text" name="wp" id="wp"     value="{{ old('wp', $data->wp ?? ' ') }}" class="form-control"
                                                           placeholder="Enter Instagram Link">
                                                    @error('fb')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="twitter">Twitter</label>
                                                    <input type="text" name="twitter"     value="{{ old('twitter', $data->twitter ?? ' ') }}" id="twitter" class="form-control"
                                                           placeholder="Enter Twitter URL">
                                                    @error('twitter')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="youtube">YouTube</label>
                                                    <input type="text" name="youtube"   value="{{ old('youtube', $data->youtube ?? ' ') }}" id="youtube" class="form-control"
                                                           placeholder="Enter YouTube URL">
                                                    @error('youtube')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label for="linkedin">LinkedIn</label>
                                                    <input type="text" name="linkdi"    value="{{ old('linkdi', $data->linkdi ?? ' ') }}" id="linkdi" class="form-control"
                                                           placeholder="Enter LinkedIn URL">
                                                    @error('linkdi')
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
