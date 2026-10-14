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

                @include('backend.modal.team')
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
                            <p class="text-muted" style="margin-bottom:10px;">
                                <i class="fa fa-arrows" aria-hidden="true"></i>
                                Drag the handle on any row to change the display order.
                                <span id="reorderStatus" style="margin-left:10px;font-weight:600;"></span>
                            </p>
                            <table id="basic-table" class="table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th style="width:40px;"></th>
                                    <th>SN</th>

                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Image</th>

                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody id="teamSortable">
                                @foreach ($dataList as $data )
                                    <tr data-id="{{ $data->id }}">
                                        <td class="drag-handle" style="cursor:move; text-align:center; vertical-align:middle;">
                                            <i class="fa fa-arrows" aria-hidden="true"></i>
                                        </td>
                                        <td class="row-serial">{{ $loop->index + 1 }}</td>

                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->designation }}</td>

                                        <td>
                                            <img
                                                src="{{ $data->image ? asset($data->image) : asset('images/no-image.png') }}"
                                                style="height:100px; width:100px;"
                                                alt="Image"
                                            >
                                        </td>


                                        <td style="   display: flex;gap: 10px;">

                                            <a href="#"  data-toggle="modal" data-target="#editRowModal{{ $data->id }}"
                                               class="btn btn-warning btn-sm">Edit</a>


                                            <form action="{{ route('admin.team.delete', $data->id) }}"
                                                  method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure you want to delete this Data?')">Delete</button>
                                            </form>

                                        </td>
                                    </tr>

                                    @include('backend.modal.team')
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

    <!-- JS at the bottom -->
    <script>
        document.getElementById('imageFile').addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const imageDisplay = document.getElementById('imageDisplay');
                    const imagePreview = document.getElementById('imagePreview');
                    imageDisplay.src = e.target.result;
                    imagePreview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
    </script>

    <script>
        function previewImage(event, previewId, imgId) {
            const reader = new FileReader();
            const fileInput = event.target;
            const preview = document.getElementById(previewId);
            const img = document.getElementById(imgId);

            reader.onload = function () {
                img.src = reader.result;
                preview.style.display = 'block';
            }

            if (fileInput.files[0]) {
                reader.readAsDataURL(fileInput.files[0]);
            }
        }

        document.getElementById('service_bg_left').addEventListener('change', function(e) {
            previewImage(e, 'imagePreviewLeft', 'imageDisplayLeft');
        });

        document.getElementById('service_bg_right').addEventListener('change', function(e) {
            previewImage(e, 'imagePreviewRight', 'imageDisplayRight');
        });
    </script>

    <script src="{{ asset('admin') }}/vendor/sortable/Sortable.min.js"></script>
    <script>
        (function () {
            var list = document.getElementById('teamSortable');
            var status = document.getElementById('reorderStatus');
            if (!list) return;

            function setStatus(text, color) {
                status.textContent = text;
                status.style.color = color;
            }

            // Renumber the SN column so it matches the new order without a reload.
            function renumber() {
                list.querySelectorAll('tr').forEach(function (row, i) {
                    var cell = row.querySelector('.row-serial');
                    if (cell) cell.textContent = i + 1;
                });
            }

            Sortable.create(list, {
                draggable: 'tr',
                handle: '.drag-handle',
                animation: 150,
                ghostClass: 'reorder-ghost',
                onEnd: function () {
                    renumber();
                    setStatus('Saving...', '#888');

                    var order = Array.prototype.map.call(
                        list.querySelectorAll('tr'),
                        function (row) { return row.getAttribute('data-id'); }
                    );

                    fetch("{{ route('admin.team.reorder') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: JSON.stringify({ order: order })
                    })
                    .then(function (res) {
                        if (!res.ok) throw new Error('Request failed');
                        return res.json();
                    })
                    .then(function () {
                        setStatus('Order saved', 'green');
                        setTimeout(function () { setStatus('', ''); }, 2000);
                    })
                    .catch(function () {
                        setStatus('Could not save order - please reload and try again.', 'red');
                    });
                }
            });
        })();
    </script>

    <style>
        .reorder-ghost { opacity: .4; background: #ffeeba !important; }
        #teamSortable tr.sortable-chosen { background: #fdfdea; }
    </style>

@endsection
