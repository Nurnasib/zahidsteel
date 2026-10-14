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
        .note-editor.note-frame { border: 1px solid #ddd; border-radius: 4px; }
        .note-toolbar { background: #f8f8f8 !important; }
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

                <div class="panel">
                    <div class="panel b-primary bt-md">
                        <div class="panel-content p-none">
                            <div class="widget-list list-to-do">
                                <h4 class="list-title">{{ $subTitle }}</h4>
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
                                    <th>Image</th>
                                    <th>Page</th>
                                    <th>Title</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($dataList as $data)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>
                                            @if($data->image)
                                                @php $img = json_decode($data->image); @endphp
                                                <img src="{{ asset($img->small ?? $img->original) }}" width="70">
                                            @else
                                                <span class="text-muted">—</span>
                                            @endif
                                        </td>
                                        <td style="text-transform:capitalize;">{{ $data->key }}</td>
                                        <td>{{ $data->title }}</td>
                                        <td>
                                            <a href="#" data-toggle="modal"
                                               data-target="#editRowModal{{ $data->id }}"
                                               class="btn btn-warning btn-sm">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- ── Edit modals ─────────────────────────────────────────────── --}}
        @foreach ($dataList as $data)
            @include('backend.modal.service-page', ['data' => $data])
        @endforeach

    </div>

    <script>
        // Simple hero-image preview
        document.querySelectorAll('.sp-image-input').forEach(function (input) {
            input.addEventListener('change', function () {
                var wrap = document.getElementById(input.dataset.previewWrap);
                var img  = document.getElementById(input.dataset.preview);
                if (input.files && input.files[0]) {
                    img.src = URL.createObjectURL(input.files[0]);
                    wrap.style.display = 'block';
                }
            });
        });

        // ── Block management (add / remove block, remove image) ──────────────
        (function ($) {
            var blockIdx = 1000; // new rows use high indices to avoid colliding with seeded 0,1

            function blockTemplate(idx) {
                return '' +
                '<div class="sp-block-row" style="border:1px solid #e0e0e0;border-radius:6px;padding:12px;margin-bottom:12px;position:relative;background:#fff;">' +
                    '<button type="button" class="btn btn-danger btn-xs sp-remove-block" style="position:absolute;top:8px;right:8px;z-index:2;">&times;</button>' +
                    '<div class="row">' +
                        '<div class="col-md-7">' +
                            '<label style="font-size:12px;color:#555;">Text</label>' +
                            '<textarea name="blocks[' + idx + '][text]" class="form-control sp-new-editor"></textarea>' +
                        '</div>' +
                        '<div class="col-md-5">' +
                            '<label style="font-size:12px;color:#555;">Image</label>' +
                            '<input type="hidden" name="blocks[' + idx + '][existing_image]" class="sp-existing-image" value="">' +
                            '<div class="sp-block-thumb" style="margin-bottom:6px;display:none;">' +
                                '<img src="" style="width:100%;max-height:120px;object-fit:cover;border:1px solid #ddd;border-radius:4px;">' +
                                '<button type="button" class="btn btn-default btn-xs sp-remove-image" style="margin-top:4px;">Remove image</button>' +
                            '</div>' +
                            '<input type="file" name="blocks[' + idx + '][image]" accept="image/*" class="form-control">' +
                        '</div>' +
                    '</div>' +
                '</div>';
            }

            // Add block
            $(document).on('click', '.sp-add-block', function () {
                var wrap = document.getElementById($(this).data('wrapper'));
                var $row = $(blockTemplate(blockIdx++));
                $(wrap).append($row);
                // init a lightweight summernote on the new textarea
                $row.find('.sp-new-editor').summernote({
                    height: 160,
                    toolbar: [
                        ['style', ['style']],
                        ['font',  ['bold', 'underline', 'clear']],
                        ['para',  ['ul', 'ol', 'paragraph']],
                        ['insert',['link']],
                        ['view',  ['codeview']]
                    ]
                });
            });

            // Remove block
            $(document).on('click', '.sp-remove-block', function () {
                var $row = $(this).closest('.sp-block-row');
                var $ta  = $row.find('textarea');
                if ($ta.hasClass('note-codable') || $ta.next('.note-editor').length) {
                    try { $ta.summernote('destroy'); } catch (e) {}
                }
                $row.remove();
            });

            // Remove image (keep the block, drop its image)
            $(document).on('click', '.sp-remove-image', function () {
                var $row = $(this).closest('.sp-block-row');
                $row.find('.sp-existing-image').val('');
                $row.find('.sp-block-thumb').hide();
                $row.find('input[type="file"]').val('');
            });
        })(jQuery);
    </script>

@endsection
