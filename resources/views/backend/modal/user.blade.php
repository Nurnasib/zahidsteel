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
                                                  @if (empty($data->id)) action="{{ route('admin.user.add.update.info') }}" @else action="{{ route('admin.user.add.update.info', $data->id) }}" @endif
                                                  enctype="multipart/form-data">
                                                @csrf

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
                                                    <label for="email">Email</label>
                                                    <input type="email" name="email"
                                                           value="{{ old('email', $data->email ?? ' ') }}"
                                                           class="form-control" />
                                                    @error('email')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>




                                                <div class="form-group mb-3">
                                                    <label for="facebook">Phone</label>
                                                    <input type="text" name="phone" id="phone"     value="{{ old('phone', $data->phone ?? ' ') }}"  class="form-control"
                                                           placeholder="Enter Phone Number">
                                                    @error('phone')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>


                                                <div class="form-group mb-3">
                                                    <label for="password">Password</label>
                                                    <input type="password" name="password"   id="password" class="form-control"
                                                           placeholder="Enter Password">
                                                    @error('password')
                                                    <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>


                                                    <div class="form-group mb-3">
                                                        <strong>Role:</strong>
                                                        <select name="roles[]" class="form-control">
                                                            @foreach ($roles as $role)
                                                                <option
                                                                    value="{{ $role->name }}"
                                                                    {{ in_array(
                                                                        $role->name,
                                                                        old('roles', isset($data) && $data->roles ? $data->roles->pluck('name')->toArray() : [])
                                                                    ) ? 'selected' : '' }}
                                                                >
                                                                    {{ $role->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>








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
