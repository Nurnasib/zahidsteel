@extends('layouts.backend.master')
@section('admin')
    <div class="content">

        <!-- content HEADER -->
        <!-- ========================================================= -->
        <div class="content-header">
            <!-- leftside content header -->
            <div class="leftside-content-header">
                <ul class="breadcrumbs">
                    <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">{{ $dashboard }}</a></li>
                    <li><a>{{ $subTitle }}</a></li>
                </ul>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--SEARCHING, ORDENING & PAGING-->

        <div class="row ">
            <div class="col-sm-12">

                @include('backend.modal.slider')
                <div class="panel">
                    <div class="panel b-primary bt-md">
                        <div class="panel-content p-none">
                            <div class="widget-list list-to-do">
                                <h4 class="list-title">{{ $subTitle }}</h4>
                                <button class="add-item btn btn-o btn-primary btn-xs" data-toggle="modal" data-target="#addRowModal">{{ $title }}<i class="fa fa-plus" style="padding-left: 10px"></i></button>

                            </div>
                        </div>
                    </div>
                    <div class="panel-content">
                        <div class="table-responsive">
                            <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Sl:</th>

                                    <th>Image</th>
                                    <th>Status</th>

                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($dataList as $data )
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>



                                        <td>
                                            @php
                                            $media = json_decode($data->image, true);
                                            @endphp

                                            @if($data->media_type == 'image')
                                            <picture>
                                                <img src="{{ asset($media['original'] ?? '') }}" width="70">
                                            </picture>

                                            @elseif($data->media_type == 'video')
                                            <video width="120" controls>
                                                <source src="{{ asset($media['original'] ?? '') }}" type="video/mp4">
                                            </video>
                                            @endif



                                        </td>
                                        <td>{{$data->status}}</td>
                                        <td style="    display: flex;gap: 10px;">
                                            <a href="#"  data-toggle="modal" data-target="#editRowModal{{ $data->id }}"
                                               class="btn btn-warning btn-sm">Edit</a>

                                            <form action="{{ route('admin.slider.delete', $data->id) }}"
                                                  method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure you want to delete this Data?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>

                                    @include('backend.modal.slider')
                                @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {

            // ── Media type radio toggle ──────────────────────────────────────────
            document.querySelectorAll('.media-type-radio').forEach(function (radio) {
                radio.addEventListener('change', function () {
                    const suffix = this.dataset.suffix;
                    const imgSection   = document.querySelector('.media-section-image-' + suffix);
                    const videoSection = document.querySelector('.media-section-video-' + suffix);

                    if (this.value === 'image') {
                        imgSection.style.display   = 'block';
                        videoSection.style.display = 'none';
                        // Clear video input so it isn't submitted
                        const videoInput = document.getElementById('videoFile' + suffix);
                        if (videoInput) videoInput.value = '';
                    } else {
                        imgSection.style.display   = 'none';
                        videoSection.style.display = 'block';
                        // Clear image input so it isn't submitted
                        const imageInput = document.getElementById('imageFile' + suffix);
                        if (imageInput) imageInput.value = '';
                    }
                });
            });

            // ── Image preview ────────────────────────────────────────────────────
            document.querySelectorAll('.slider-image-input').forEach(function (input) {
                input.addEventListener('change', function () {
                    const suffix = this.dataset.suffix;
                    const file = this.files[0];
                    if (!file || !file.type.startsWith('image/')) return;

                    const reader = new FileReader();
                    reader.onload = function (e) {
                        document.getElementById('imageDisplay' + suffix).src = e.target.result;
                        document.getElementById('imagePreview' + suffix).style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                });
            });

            // ── Video preview ────────────────────────────────────────────────────
            document.querySelectorAll('.slider-video-input').forEach(function (input) {
                input.addEventListener('change', function () {
                    const suffix = this.dataset.suffix;
                    const file = this.files[0];
                    if (!file || !file.type.startsWith('video/')) return;

                    const url = URL.createObjectURL(file);
                    const videoEl = document.getElementById('videoDisplay' + suffix);
                    videoEl.src = url;
                    document.getElementById('videoPreview' + suffix).style.display = 'block';
                });
            });

        });
    </script>

@endsection
