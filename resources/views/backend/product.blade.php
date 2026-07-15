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
                @php $data = (object)[]; @endphp
                @include('backend.modal.product')

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
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Notes</th>
                                    <th>Status</th>
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
                                                <picture>
                                                    <source media="(max-width:480px)" srcset="{{ asset($img->small) }}">
                                                    <source media="(max-width:991px)" srcset="{{ asset($img->medium) }}">
                                                    <source media="(min-width:992px)" srcset="{{ asset($img->large) }}">
                                                    <img src="{{ asset($img->original) }}" width="70">
                                                </picture>
                                            @endif
                                        </td>

                                        <td>{{ $data->title }}</td>

                                        <td>
                                            @if($data->serviceNote)
                                                @php $ns = json_decode($data->serviceNote, true); @endphp
                                                @foreach($ns as $n)
                                                    <div>
                                                        <i class="fa {{ $n['note_icon'] ?? 'fa-check-circle' }}"
                                                           style="color:#e91e8c;margin-right:4px;"></i>
                                                        {{ $n['note_title'] ?? '' }}
                                                    </div>
                                                @endforeach
                                            @else
                                                <span class="text-muted">—</span>
                                            @endif
                                        </td>

                                        <td>{{ $data->status }}</td>

                                        <td style="display:flex;gap:10px;">
                                            <a href="#" data-toggle="modal"
                                               data-target="#editRowModal{{ $data->id }}"
                                               class="btn btn-warning btn-sm">Edit</a>

                                            <form action="{{ route('admin.product.delete', $data->id) }}"
                                                  method="POST" class="d-inline">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Delete this record?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>

                                    {{-- Edit modal for this row --}}
                                    @include('backend.modal.product')
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
        // ════════════════════════════════════════════════════════════
        //  IMAGE PREVIEW
        // ════════════════════════════════════════════════════════════
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('input[type="file"][data-preview]').forEach(function (input) {
                input.addEventListener('change', function (e) {
                    var file = e.target.files[0];
                    if (!file || !file.type.startsWith('image/')) return;
                    var reader = new FileReader();
                    reader.onload = function (ev) {
                        document.getElementById(input.dataset.preview).src = ev.target.result;
                        document.getElementById(input.dataset.previewWrap).style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                });
            });
        });

        // ════════════════════════════════════════════════════════════
        //  ICON PICKER
        // ════════════════════════════════════════════════════════════
        var FA_ICONS_NOTE = [
            'fa-check-circle','fa-check','fa-check-square','fa-star','fa-heart',
            'fa-bolt','fa-rocket','fa-shield','fa-lock','fa-unlock',
            'fa-globe','fa-map-marker','fa-home','fa-building','fa-industry',
            'fa-cog','fa-cogs','fa-wrench','fa-tools','fa-hammer',
            'fa-truck','fa-car','fa-plane','fa-ship','fa-bicycle',
            'fa-phone','fa-envelope','fa-comments','fa-comment','fa-bell',
            'fa-user','fa-users','fa-user-circle','fa-id-card','fa-address-book',
            'fa-bar-chart','fa-pie-chart','fa-line-chart','fa-area-chart',
            'fa-calendar','fa-clock-o','fa-history','fa-hourglass',
            'fa-file','fa-file-text','fa-folder','fa-folder-open','fa-archive',
            'fa-database','fa-server','fa-hdd-o','fa-desktop','fa-laptop',
            'fa-mobile','fa-tablet','fa-wifi','fa-signal','fa-cloud',
            'fa-upload','fa-download','fa-exchange','fa-refresh',
            'fa-search','fa-filter','fa-sort','fa-list','fa-th',
            'fa-pencil','fa-edit','fa-trash','fa-times-circle','fa-ban',
            'fa-plus-circle','fa-minus-circle','fa-info-circle','fa-question-circle','fa-exclamation-circle',
            'fa-trophy','fa-certificate','fa-tag','fa-money','fa-credit-card',
            'fa-thumbs-up','fa-thumbs-down','fa-handshake-o',
            'fa-leaf','fa-tree','fa-recycle','fa-fire','fa-umbrella','fa-life-ring',
            'fa-paint-brush','fa-magic','fa-camera','fa-image',
            'fa-music','fa-headphones','fa-microphone','fa-volume-up','fa-play-circle'
        ];



        function renderIconGrid(grid, filter, currentVal) {
            grid.innerHTML = '';
            var list = filter
                ? FA_ICONS_NOTE.filter(function (ic) { return ic.indexOf(filter) !== -1; })
                : FA_ICONS_NOTE;
            list.forEach(function (ic) {
                var el = document.createElement('div');
                el.className = 'icon-item' + (ic === currentVal ? ' active' : '');
                el.title = ic;
                el.innerHTML = '<i class="fa ' + ic + '"></i>';
                el.onclick = function () { selectIcon(el, ic); };
                grid.appendChild(el);
            });
        }

        function toggleIconPicker(btn) {
            var wrap     = btn.closest('.icon-picker-wrap');
            var dropdown = wrap.querySelector('.icon-picker-dropdown');
            var hidden   = wrap.querySelector('.note-icon-input');
            var isOpen   = dropdown.style.display !== 'none';

            document.querySelectorAll('.icon-picker-dropdown').forEach(function (d) {
                d.style.display = 'none';
            });

            if (!isOpen) {
                var search = dropdown.querySelector('.icon-search');
                var grid   = dropdown.querySelector('.icon-grid');
                search.value = '';
                renderIconGrid(grid, '', hidden.value);
                dropdown.style.display = 'block';
                search.focus();
            }
        }

        function filterIcons(input) {
            var dropdown = input.closest('.icon-picker-dropdown');
            var grid     = dropdown.querySelector('.icon-grid');
            var hidden   = dropdown.closest('.icon-picker-wrap').querySelector('.note-icon-input');
            renderIconGrid(grid, input.value.trim(), hidden.value);
        }

        function selectIcon(el, ic) {
            var wrap    = el.closest('.icon-picker-wrap');
            var hidden  = wrap.querySelector('.note-icon-input');
            var trigger = wrap.querySelector('.icon-picker-trigger');

            hidden.value = ic;
            trigger.querySelector('.icon-label').textContent = ic;
            var preview = trigger.querySelector('i.fa:not(.fa-caret-down)');
            preview.className = 'fa ' + ic;
            preview.style.color = '#e91e8c';

            wrap.querySelectorAll('.icon-item').forEach(function (e) { e.classList.remove('active'); });
            el.classList.add('active');
            wrap.querySelector('.icon-picker-dropdown').style.display = 'none';
        }

        document.addEventListener('click', function (e) {
            if (!e.target.closest('.icon-picker-wrap')) {
                document.querySelectorAll('.icon-picker-dropdown').forEach(function (d) {
                    d.style.display = 'none';
                });
            }
        });

        // ════════════════════════════════════════════════════════════
        //  NOTE ROWS — add / remove
        // ════════════════════════════════════════════════════════════
        var _noteCounts = {};

        function _getCount(suffix) {
            if (!_noteCounts[suffix]) {
                var w = document.getElementById('serviceNoteWrapper' + suffix);
                _noteCounts[suffix] = w ? w.querySelectorAll('.service-note-row').length : 1;
            }
            return _noteCounts[suffix];
        }

        function addNoteRow(suffix) {
            var idx     = _getCount(suffix);
            var wrapper = document.getElementById('serviceNoteWrapper' + suffix);
            var defIc   = 'fa-check-circle';

            var row = document.createElement('div');
            row.className = 'service-note-row';
            row.style.cssText = 'border:1px solid #ddd;border-radius:6px;padding:12px;margin-bottom:10px;position:relative;background:#fafafa;';
            row.innerHTML =
                '<button type="button" class="btn btn-danger btn-xs" ' +
                'style="position:absolute;top:8px;right:8px;" onclick="removeNoteRow(this)">&times;</button>' +

                '<div style="display:flex;align-items:flex-end;gap:8px;margin-bottom:8px;">' +
                '<div style="flex:0 0 auto;">' +
                '<label style="font-size:12px;color:#555;display:block;">Icon</label>' +
                '<div class="icon-picker-wrap" style="position:relative;">' +
                '<input type="hidden" name="serviceNote[' + idx + '][note_icon]" class="note-icon-input" value="' + defIc + '">' +
                '<button type="button" class="btn btn-default btn-sm icon-picker-trigger" ' +
                'style="min-width:148px;text-align:left;padding:5px 10px;" onclick="toggleIconPicker(this)">' +
                '<i class="fa ' + defIc + '" style="margin-right:6px;color:#e91e8c;width:14px;text-align:center;"></i>' +
                '<span class="icon-label">' + defIc + '</span>' +
                '<i class="fa fa-caret-down" style="float:right;margin-top:2px;"></i>' +
                '</button>' +
                '<div class="icon-picker-dropdown" ' +
                'style="display:none;position:absolute;z-index:9999;background:#fff;border:1px solid #ccc;' +
                'border-radius:6px;padding:8px;width:310px;max-height:220px;overflow-y:auto;' +
                'box-shadow:0 6px 18px rgba(0,0,0,.16);top:38px;left:0;">' +
                '<input type="text" class="form-control input-sm icon-search" placeholder="Search icon…" ' +
                'style="margin-bottom:8px;" oninput="filterIcons(this)">' +
                '<div class="icon-grid" style="display:flex;flex-wrap:wrap;gap:4px;"></div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div style="flex:1;">' +
                '<label style="font-size:12px;color:#555;display:block;">Note Title</label>' +
                '<input type="text" name="serviceNote[' + idx + '][note_title]" ' +
                'class="form-control input-sm" placeholder="e.g. Fast Delivery">' +
                '</div>' +
                '</div>' +

                '<div>' +
                '<label style="font-size:12px;color:#555;">Note Description</label>' +
                '<textarea name="serviceNote[' + idx + '][note_description]" ' +
                'class="form-control input-sm" rows="2" ' +
                'placeholder="e.g. We deliver within 24 hours"></textarea>' +
                '</div>';

            wrapper.appendChild(row);
            _noteCounts[suffix] = idx + 1;
        }

        function removeNoteRow(btn) {
            var row    = btn.closest('.service-note-row');
            var parent = row.parentNode;
            if (parent.querySelectorAll('.service-note-row').length <= 1) {
                alert('At least one note row is required.');
                return;
            }
            row.remove();
        }
    </script>

@endsection
