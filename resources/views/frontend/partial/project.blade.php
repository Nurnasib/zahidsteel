@foreach($projects as $project)
@php
$galleryImages = $project->gallery ?? collect();
$firstImg  = $galleryImages->first();
$secondImg = $galleryImages->skip(1)->first();
$firstSrc  = $firstImg  ? json_decode($firstImg->gallery)?->original  : '';
$secondSrc = $secondImg ? json_decode($secondImg->gallery)?->original : '';
@endphp

<div class="single-blog-inner-content pbn">
    <div class="col-md-8 gitem">

        {{-- First image --}}
        @if($firstSrc)
        <a title="Gallery"
           class="gallery-item open-lightbox"
           href="#"
           data-project="{{ $project->id }}"
           data-index="0">
            <img class="tmg" src="{{ asset($firstSrc) }}" alt="{{ $project->title }}">
        </a>
        @endif

        {{-- Second image --}}
        @if($secondSrc)
        <a title="Gallery"
           class="gallery-item open-lightbox"
           href="#"
           data-project="{{ $project->id }}"
           data-index="1">
            <img class="tmg" src="{{ asset($secondSrc) }}" alt="{{ $project->title }}">
        </a>
        @endif

    </div>

    <div class="col-md-4 pdtlc">
        <h2>Project Details</h2>
        <h3>{{ $project->title }}</h3>
        <p class="psc">
            @if($project->type)
            <span><strong>Building Type:&nbsp;</strong>{{ $project->type }}</span>
            @endif
            @if($project->size)
            <span><strong>Building Size:</strong>{{ $project->size }}</span>
            @endif
            @if($project->location)
            <span><strong>Location:&nbsp;</strong>{{ $project->location }}</span>
            @endif
        </p>
    </div>
</div>

{{-- Hidden gallery data for lightbox --}}
<div id="gallery-data-{{ $project->id }}" style="display:none;">
    @foreach($galleryImages as $gItem)
    @php $gImg = json_decode($gItem->gallery)?->original; @endphp
    @if($gImg)
    <span data-src="{{ asset($gImg) }}"></span>
    @endif
    @endforeach
</div>

@endforeach


{{-- ══════════════════════════════════════════════
LIGHTBOX MODAL  (single shared modal)
══════════════════════════════════════════════ --}}
<div id="customLightbox" style="
    display:none; position:fixed; z-index:99999; top:0; left:0;
    width:100%; height:100%; background:rgba(0,0,0,0.88);
    align-items:center; justify-content:center; flex-direction:column;">

    {{-- Close --}}
    <span id="lbClose" style="
        position:absolute; top:18px; right:28px;
        color:#fff; font-size:36px; cursor:pointer; font-weight:bold;
        line-height:1; z-index:2;">&times;</span>

    {{-- Prev --}}
    <span id="lbPrev" style="
        position:absolute; left:16px; top:50%; transform:translateY(-50%);
        color:#fff; font-size:48px; cursor:pointer; user-select:none;
        z-index:2;">&#10094;</span>

    {{-- Main image --}}
    <img id="lbImage" src="" alt="" style="
        max-width:90vw; max-height:80vh;
        object-fit:contain; border:3px solid #fff;
        box-shadow:0 0 40px rgba(0,0,0,.6);">

    {{-- Counter --}}
    <div id="lbCounter" style="
        color:#fff; margin-top:10px;
        font-size:14px; letter-spacing:1px;"></div>

    {{-- Thumbnail strip --}}
    <div id="lbThumbs" style="
        display:flex; gap:6px; margin-top:12px;
        flex-wrap:wrap; justify-content:center;
        max-width:90vw; overflow-y:auto; max-height:110px;"></div>

    {{-- Next --}}
    <span id="lbNext" style="
        position:absolute; right:16px; top:50%; transform:translateY(-50%);
        color:#fff; font-size:48px; cursor:pointer; user-select:none;
        z-index:2;">&#10095;</span>
</div>


{{-- ══════════════════════════════════════════════
LIGHTBOX SCRIPT
══════════════════════════════════════════════ --}}
<script>
    (function () {
        var lb        = document.getElementById('customLightbox');
        var lbImg     = document.getElementById('lbImage');
        var lbCounter = document.getElementById('lbCounter');
        var lbThumbs  = document.getElementById('lbThumbs');
        var images    = [];
        var current   = 0;

        function openLightbox(projectId, startIndex) {
            var container = document.getElementById('gallery-data-' + projectId);
            if (!container) return;
            images = Array.from(container.querySelectorAll('[data-src]'))
                .map(function(el){ return el.getAttribute('data-src'); });
            if (!images.length) return;

            current = startIndex || 0;
            render();
            lb.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        function render() {
            lbImg.src = images[current];
            lbCounter.textContent = (current + 1) + ' / ' + images.length;

            lbThumbs.innerHTML = '';
            images.forEach(function(src, i) {
                var t = document.createElement('img');
                t.src = src;
                t.style.cssText = 'width:70px;height:52px;object-fit:cover;cursor:pointer;border:2px solid '
                    + (i === current ? '#fff' : 'transparent')
                    + ';opacity:' + (i === current ? '1' : '0.55')
                    + ';transition:all .2s;';
                t.addEventListener('click', function(e){
                    e.stopPropagation();
                    current = i;
                    render();
                });
                lbThumbs.appendChild(t);
            });
        }

        function closeLightbox() {
            lb.style.display = 'none';
            document.body.style.overflow = '';
            images = [];
        }

        // Open on image click
        document.addEventListener('click', function(e) {
            var link = e.target.closest('.open-lightbox');
            if (!link) return;
            e.preventDefault();
            openLightbox(link.dataset.project, parseInt(link.dataset.index) || 0);
        });

        // ── Close button ──────────────────────────────────────
        document.getElementById('lbClose').addEventListener('click', function(e) {
            e.stopPropagation();
            closeLightbox();
        });

        // ── Prev / Next ───────────────────────────────────────
        document.getElementById('lbPrev').addEventListener('click', function(e) {
            e.stopPropagation();
            current = (current - 1 + images.length) % images.length;
            render();
        });

        document.getElementById('lbNext').addEventListener('click', function(e) {
            e.stopPropagation();
            current = (current + 1) % images.length;
            render();
        });

        // ── Stop clicks on the inner content from closing ─────
        lbImg.addEventListener('click', function(e) {
            e.stopPropagation();
        });
        lbCounter.addEventListener('click', function(e) {
            e.stopPropagation();
        });
        lbThumbs.addEventListener('click', function(e) {
            e.stopPropagation();
        });

        // ── Backdrop click (only the dark area itself) ────────
        lb.addEventListener('click', function(e) {
            if (e.target === lb) {
                closeLightbox();
            }
        });

        // ── Keyboard ──────────────────────────────────────────
        document.addEventListener('keydown', function(e) {
            if (lb.style.display === 'none') return;
            if (e.key === 'ArrowRight') { current = (current + 1) % images.length; render(); }
            if (e.key === 'ArrowLeft')  { current = (current - 1 + images.length) % images.length; render(); }
            if (e.key === 'Escape')     { closeLightbox(); }
        });
    })();
</script>
