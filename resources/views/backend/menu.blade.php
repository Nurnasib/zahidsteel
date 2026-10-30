@extends('layouts.backend.master')
@section('admin')

    <style>
        .menu-tree, .menu-tree ul { list-style: none; padding: 0; margin: 0; }
        .menu-tree ul { margin: 6px 0 0 34px; min-height: 6px; }
        .menu-row { display: flex; align-items: center; gap: 10px; padding: 9px 12px; margin-bottom: 6px; background: #fff; border: 1px solid #e3e3e3; border-radius: 4px; }
        .menu-row .drag-handle { cursor: move; color: #999; }
        .menu-row .menu-title { font-weight: 600; min-width: 170px; }
        .menu-row .menu-link { color: #888; font-size: 12px; flex: 1; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
        .menu-row .menu-actions { display: flex; gap: 6px; }
        .menu-row.is-hidden { opacity: .55; }
        .reorder-ghost { opacity: .4; }
    </style>

    <div class="content">

        <div class="content-header">
            <div class="leftside-content-header">
                <ul class="breadcrumbs">
                    <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">{{ $dashboard }}</a></li>
                    <li><a>{{ $subTitle }}</a></li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                @include('backend.partials.form-errors')
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
                        <p class="text-muted" style="margin-bottom:12px;">
                            <i class="fa fa-arrows" aria-hidden="true"></i>
                            Drag items to reorder them. To move an item into or out of a submenu, change its <b>Position</b> in Edit.
                            Page content is edited under <a href="{{ route('admin.page.index') }}">Pages</a>.
                            <span id="reorderStatus" style="margin-left:10px;font-weight:600;"></span>
                        </p>

                        <ul class="menu-tree menu-sortable">
                            @foreach($dataList as $top)
                                <li data-id="{{ $top->id }}">
                                    @include('backend.partials.menu-row', ['row' => $top])
                                    <ul class="menu-sortable">
                                        @foreach($top->children as $child)
                                            <li data-id="{{ $child->id }}">
                                                @include('backend.partials.menu-row', ['row' => $child])
                                            </li>
                                        @endforeach
                                    </ul>
                                    @if($top->auto_children)
                                        @php $autoItems = $top->navChildren()->slice($top->children->count()); @endphp
                                        <div class="text-muted" style="margin:0 0 10px 34px;font-size:12px;">
                                            <i class="fa fa-magic"></i>
                                            Auto: {{ \App\Models\Menu::AUTO_CHILDREN[$top->auto_children] ?? $top->auto_children }} —
                                            {{ $autoItems->isEmpty() ? 'none right now' : $autoItems->pluck('title')->join(', ') }}
                                            @if($top->auto_children === 'gallery_albums') (<a href="{{ route('admin.gallery.index') }}">manage albums</a>) @endif
                                        </div>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        @include('backend.modal.menu', ['item' => null])
        @foreach($dataList as $top)
            @include('backend.modal.menu', ['item' => $top])
            @foreach($top->children as $child)
                @include('backend.modal.menu', ['item' => $child])
            @endforeach
        @endforeach

    </div>

    <script>
        // Show the page picker or the URL box depending on "Links to"
        document.querySelectorAll('.menu-form').forEach(function (form) {
            form.querySelectorAll('.menu-link-type').forEach(function (radio) {
                radio.addEventListener('change', function () {
                    form.querySelector('.menu-link-page').style.display = radio.value === 'page' ? '' : 'none';
                    form.querySelector('.menu-link-url').style.display  = radio.value === 'url'  ? '' : 'none';
                });
            });
        });
    </script>

    <script src="{{ asset('admin') }}/vendor/sortable/Sortable.min.js"></script>
    <script>
        (function () {
            var status = document.getElementById('reorderStatus');

            function setStatus(text, color) {
                status.textContent = text;
                status.style.color = color;
            }

            // Each level (top menu, and each submenu) is sorted independently
            document.querySelectorAll('.menu-sortable').forEach(function (list) {
                Sortable.create(list, {
                    draggable: '> li',
                    handle: '.drag-handle',
                    animation: 150,
                    ghostClass: 'reorder-ghost',
                    onEnd: function () {
                        setStatus('Saving...', '#888');

                        var order = Array.prototype.map.call(
                            list.querySelectorAll(':scope > li'),
                            function (row) { return row.getAttribute('data-id'); }
                        );

                        fetch("{{ route('admin.menu.reorder') }}", {
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
            });
        })();
    </script>

@endsection
