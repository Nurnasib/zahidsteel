@extends('layouts.frontend.master')

@isset($album)
    @section('meta_title', $album->title . ' | Gallery')
    @php $cover = json_decode($album->gallery->first()?->gallery ?? '', true)['original'] ?? null; @endphp
    @if($cover)
        @section('og_image', asset($cover))
    @endif
@endisset

@section('content')
<div class="construction-content-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                @isset($album)
                    {{-- Single album: heading instead of the category filter --}}
                    <h1 style="font-size:30px;font-weight:700;margin:0 0 25px;">{{ $album->title }}</h1>
                @else
                <div class="shorting-menu">
                    <button type="button" data-filter="all" class="mixitup-control-active">All</button>
                    @foreach($gallery as $cat)
                    @if($cat->gallery->count() > 0)
                    <button type="button" data-filter=".cat-{{ $cat->id }}">{{ $cat->title }}</button>
                    @endif
                    @endforeach
                </div>
                @endisset
            </div>
        </div>

        <div class="row shorting" id="MixItUpGallery">
            @foreach($gallery as $cat)
            @foreach($cat->gallery as $image)
            @php
            $imgData  = is_string($image->gallery) ? json_decode($image->gallery, true) : [];
            $imgPath  = $imgData['original'] ?? '';
            $imgUrl   = $imgPath ? asset($imgPath) : '';
            $imgTitle = $image->title ?? $cat->title;
            @endphp
            @if($imgUrl)
            <div class="col-md-3 col-sm-6 mix cat-{{ $cat->id }}">
                <div class="single-portfolio-item">
                    <a title="{{ $imgTitle }}"
                       class="gallery-item"
                       href="{{ $imgUrl }}"
                       data-title="{{ $imgTitle }}">
                        <img class="tmg" src="{{ $imgUrl }}" alt="{{ $imgTitle }}">
                    </a>
                    <h3>{{ $imgTitle }}</h3>
                </div>
            </div>
            @endif
            @endforeach
            @endforeach
        </div>
    </div>
</div>

{{-- Lightbox Modal (matches existing screenshot design) --}}
<div id="lb-overlay" style="display:none;">
    <div id="lb-bg"></div>
    <button id="lb-close">&#x2715;</button>
    <button id="lb-prev">&#10094;</button>
    <button id="lb-next">&#10095;</button>
    <div id="lb-content">
        <img id="lb-img" src="" alt="">
        <div id="lb-footer">
            <p id="lb-title"></p>
            <span id="lb-counter"></span>
        </div>
    </div>
</div>

<style>
    /* ── Lightbox overlay ──────────────────────────── */
    #lb-overlay {
        position: fixed;
        inset: 0;
        z-index: 99999;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    #lb-bg {
        position: absolute;
        inset: 0;
        background: rgba(0,0,0,.85);
    }
    #lb-content {
        position: relative;
        z-index: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        max-width: 80vw;
    }
    #lb-img {
        max-width: 78vw;
        max-height: 82vh;
        display: block;
        object-fit: contain;
        border-radius: 2px;
    }
    #lb-footer {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 8px 4px 0;
    }
    #lb-title {
        color: #fff;
        font-size: 15px;
        margin: 0;
        font-weight: 500;
    }
    #lb-counter {
        color: #aaa;
        font-size: 13px;
        white-space: nowrap;
        margin-left: 16px;
    }
    /* ── Buttons ───────────────────────────────────── */
    #lb-close, #lb-prev, #lb-next {
        position: fixed;
        z-index: 2;
        background: rgba(255,255,255,.12);
        border: none;
        color: #fff;
        cursor: pointer;
        border-radius: 50%;
        width: 44px;
        height: 44px;
        font-size: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background .2s;
        line-height: 1;
    }
    #lb-close:hover, #lb-prev:hover, #lb-next:hover {
        background: rgba(255,255,255,.3);
    }
    #lb-close { top: 14px; right: 18px; font-size: 17px; }
    #lb-prev  { left: 18px;  top: 50%; transform: translateY(-50%); font-size: 22px; }
    #lb-next  { right: 18px; top: 50%; transform: translateY(-50%); font-size: 22px; }
</style>

<script>
    (function () {
        var overlay   = document.getElementById('lb-overlay');
        var lbBg      = document.getElementById('lb-bg');
        var lbImg     = document.getElementById('lb-img');
        var lbTitle   = document.getElementById('lb-title');
        var lbCounter = document.getElementById('lb-counter');

        var items   = [];   // {src, title}
        var current = 0;

        /* Build flat list of all visible gallery items */
        function buildItems(filterCat) {
            items = [];
            var links = document.querySelectorAll('#MixItUpGallery .gallery-item');
            links.forEach(function (a) {
                var parent = a.closest('.mix');
                if (!parent) return;
                /* skip items hidden by MixItUp (display:none) */
                if (window.getComputedStyle(parent).display === 'none') return;
                /* if filtering, only include matching category */
                if (filterCat && filterCat !== 'all' && !parent.classList.contains(filterCat)) return;
                items.push({ src: a.href, title: a.getAttribute('data-title') || a.title || '' });
            });
        }

        function show(idx) {
            current = (idx + items.length) % items.length;
            lbImg.src       = items[current].src;
            lbTitle.textContent   = items[current].title;
            lbCounter.textContent = (current + 1) + ' of ' + items.length;
        }

        function open(clickedHref) {
            /* rebuild based on currently visible items */
            buildItems(null);
            var idx = items.findIndex(function (i) { return i.src === clickedHref; });
            show(idx >= 0 ? idx : 0);
            overlay.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        function close() {
            overlay.style.display = 'none';
            document.body.style.overflow = '';
            lbImg.src = '';
        }

        /* Click on any gallery thumbnail */
        document.getElementById('MixItUpGallery').addEventListener('click', function (e) {
            var a = e.target.closest('.gallery-item');
            if (!a) return;
            e.preventDefault();
            open(a.href);
        });

        document.getElementById('lb-close').addEventListener('click', close);
        lbBg.addEventListener('click', close);

        document.getElementById('lb-prev').addEventListener('click', function () { show(current - 1); });
        document.getElementById('lb-next').addEventListener('click', function () { show(current + 1); });

        document.addEventListener('keydown', function (e) {
            if (overlay.style.display !== 'flex') return;
            if (e.key === 'Escape')     close();
            if (e.key === 'ArrowLeft')  show(current - 1);
            if (e.key === 'ArrowRight') show(current + 1);
        });
    }());
</script>

@push('scripts')
<script>
    $(document).ready(function () {
        if ($('#MixItUpGallery').length && typeof $.fn.mixItUp === 'function') {
            $('#MixItUpGallery').mixItUp();
        }
    });
</script>
@endpush
@endsection
