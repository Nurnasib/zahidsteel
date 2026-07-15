@extends('layouts.backend.master')
@section('admin')
    <div class="content">
        <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Create New Role</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary btn-sm mb-2" href="{{ route('admin.roles.index') }}">
                                <i class="fa fa-arrow-left"></i> Back
                            </a>
                        </div>
                    </div>
                </div>

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.roles.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                <input type="text" name="name" placeholder="Name" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Permissions:</strong>


                                <div class="card mt-3">
                                    <div class="card-header bg-secondary text-white">
                                        <div class="d-flex justify-content-between align-items-center">

                                            <div class="form-check">
                                                <input type="checkbox"
                                                       class="form-check-input"
                                                       id="checkAllGeneral">
                                                <label class="form-check-label text-white" for="checkAllGeneral">
                                                    <strong>Check All </strong>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            @foreach($permission as $value)
                                                @if(!str_contains($value->name, 'monarch') && !str_contains($value->name, 'ojus'))
                                                    <div class="col-md-3 col-sm-4 col-6">
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox"
                                                                   name="permission[{{$value->id}}]"
                                                                   value="{{$value->id}}"
                                                                   class="form-check-input permission-checkbox general-checkbox"
                                                                   id="permission_{{$value->id}}">
                                                            <label class="form-check-label" for="permission_{{$value->id}}">
                                                                {{ ucwords(str_replace('-', ' ', $value->name)) }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                            <button type="submit" class="btn btn-primary btn-sm mb-3">
                                <i class="fa-solid fa-floppy-disk"></i> Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const checkAll = document.getElementById('checkAllGeneral');
                const checkboxes = document.querySelectorAll('.general-checkbox');

                checkAll.addEventListener('change', function () {
                    checkboxes.forEach(cb => cb.checked = this.checked);
                });

                checkboxes.forEach(function (cb) {
                    cb.addEventListener('change', function () {
                        const total   = checkboxes.length;
                        const checked = document.querySelectorAll('.general-checkbox:checked').length;
                        checkAll.checked       = total === checked;
                        checkAll.indeterminate = checked > 0 && checked < total;
                    });
                });
            });
        </script>


@endsection
