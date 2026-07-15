@extends('layouts.backend.master')
@section('admin')

{{-- Font Awesome 4 --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

{{-- Summernote (Bootstrap 3 build) --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css">

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js"></script>



<style>
    /* Make Summernote toolbar readable inside modal */
    .note-editor.note-frame { border: 1px solid #ddd; border-radius: 4px; }
    .note-toolbar { background: #f8f8f8 !important; }

    /* Icon picker */
    .icon-picker-trigger:hover { background: #f0f0f0; }
    .icon-item {
        width:36px; height:36px; display:flex; align-items:center; justify-content:center;
        border:1px solid #eee; border-radius:4px; cursor:pointer; font-size:16px; color:#444;
        transition: background .15s, border-color .15s;
    }
    .icon-item:hover, .icon-item.active { background:#e91e8c; color:#fff; border-color:#c0166e; }
</style>

<div class="content">

    <div class="content-header">
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-table"></i><a href="#">{{ $dashboard }}</a></li>
                <li><a>{{ $subTitle }}</a></li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">

            {{-- ── Add modal (empty $data) ──────────────────────────────── --}}

            @include('backend.modal.factory')

            <div class="panel">
                <div class="panel b-primary bt-md">
                    <div class="panel-content p-none">
                        <div class="widget-list list-to-do">
                            <h4 class="list-title">{{ $subTitle }}</h4>
                            <button class="add-item btn btn-o btn-primary btn-xs"
                                    data-toggle="modal" data-target="#addRowModal">
                                {{ $title }} <i class="fa fa-plus" style="padding-left:10px"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="panel-content">
                    <div class="table-responsive">
                        <table id="basic-table"
                               class="data-table table table-striped nowrap table-hover"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Sl:</th>

                                <th>Title</th>

                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($dataList as $data)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>



                                <td>{{ $data->title }}</td>



                                <td>{{$data->status}}
                                </td>

                                <td style="display:flex;gap:10px;">
                                    <a href="#" data-toggle="modal"
                                       data-target="#editRowModal{{ $data->id }}"
                                       class="btn btn-warning btn-sm">Edit</a>

                                    <form action="{{ route('admin.factory.delete', $data->id) }}"
                                          method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Delete this record?')">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            {{-- Edit modal for this row --}}
                            @include('backend.modal.factory')
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('input[type="file"][data-preview-wrap]').forEach(function (input) {
            input.addEventListener('change', function (e) {
                var wrapId    = input.getAttribute('data-preview-wrap');
                var displayId = wrapId.replace('imagePreview', 'imageDisplay');
                var wrap      = document.getElementById(wrapId);
                var display   = document.getElementById(displayId);

                if (!wrap || !display) return;

                display.innerHTML = ''; // clear previous previews
                var files = e.target.files;

                if (!files.length) { wrap.style.display = 'none'; return; }

                wrap.style.display = 'block';

                Array.from(files).forEach(function (file) {
                    if (!file.type.startsWith('image/')) return;
                    var reader = new FileReader();
                    reader.onload = function (ev) {
                        var img = document.createElement('img');
                        img.src = ev.target.result;
                        img.style.cssText = 'width:100px;height:80px;object-fit:cover;border:1px solid #ddd;padding:2px;';
                        display.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                });
            });
        });
    });

</script>

@endsection
