@extends('layouts.frontend.master')

@section('content')
<div class="construction-content-area pagew">
    <div class="container">
        <div class="row">
            <div class="col-md-12 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                <div class="single-blog-inner-content">

                    <div class="panel panel-info">
                        <div class="panel-heading">{{$setting->site_name}} factory</div>
                        <div class="panel-body">
                            <p><strong>{{$setting->site_name}}</strong> factory is&nbsp;established &amp; located in {{$setting->addresses[1] ?? ''}}. The factory coverage an area of 40,000 square feet. It's built with ultra modern facilities and state of the art machinery &amp; equipment. The factory will offer first class main frames, columns, beams, purlins, sheeting &amp; necessary components. Our pre-engineered buildings facility can produce 7000 Tones yearly.<br>&nbsp;<br>
                                Since long a standard in commercial and industrial market segments such as warehouse, distribution centers and industrial facilities are continuing to make greater inroads into the low-rise sophisticated building market, commercial office buildings and mixed use facilities. Institutional and governmental constructions are some of the areas where PEB building systems are being used more and more. These buildings are increasingly recognized as reliable, aesthetically pleasing, energy efficient and cost-effective building alternatives. The sustainable green attributes of metal building systems with their recycled content recycle-ability makes them a natural choice for today's owners.</p>
                            <p>&nbsp;</p>

                            {{-- Dynamic Factory Sections --}}
                            @php $chunkSize = 2; $chunks = $factory->chunk($chunkSize); @endphp

                            @foreach($chunks as $chunkIndex => $chunk)
                            <div class="row rg">
                                @foreach($chunk as $section)
                                @php
                                $sectionId = 'gallery-section-' . $section->id;
                                $images = $section->gallery->map(function($item) {
                                $galleryData = json_decode($item->gallery, true);
                                return asset($galleryData['original'] ?? '');
                                });
                                @endphp
                                <div class="col-md-6">
                                    <h2 class="modTitle" style="text-align: center;">
                                        <ol class="breadcrumb">{{ $section->title }}<br></ol>
                                    </h2>

                                    <style>
                                        #{{ $sectionId }} { margin: auto; }
                                        #{{ $sectionId }} .gallery-item { float: left; margin-top: 10px; text-align: center; width: 33%; }
                                        #{{ $sectionId }} img { border: 2px solid #cfcfcf; }
                                        #{{ $sectionId }} .gallery-caption { margin-left: 0; }
                                    </style>

                                    <div id="{{ $sectionId }}" class="gallery gallery-columns-3 gallery-size-medium">
                                        @foreach($images as $imgIndex => $imgUrl)
                                        <dl class="gallery-item">
                                            <dt class="gallery-icon landscape">
                                                <a href="{{ $imgUrl }}"
                                                   class="factory-lightbox-trigger"
                                                   data-section="{{ $section->id }}"
                                                   data-index="{{ $imgIndex }}">
                                                    <img loading="lazy" decoding="async"
                                                         width="300" height="225"
                                                         src="{{ $imgUrl }}"
                                                         class="attachment-medium size-medium"
                                                         alt="{{ $section->title }}"
                                                         style="width:100%;height:auto;object-fit:cover;">
                                                </a>
                                            </dt>
                                        </dl>
                                        @if(($imgIndex + 1) % 3 === 0)
                                        <br style="clear: both">
                                        @endif
                                        @endforeach
                                        <br style="clear: both">
                                    </div>
                                </div>

                                {{-- Store images for lightbox JS --}}
                                <script>
                                    window.factoryGalleries = window.factoryGalleries || {};
                                    window.factoryGalleries[{{ $section->id }}] = @json($images->values());
                                </script>
                                @endforeach
                            </div>
                            <p>&nbsp;</p>
                            @endforeach

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

{{-- Lightbox Modal --}}
<div id="factory-lightbox" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.85); z-index:99999; align-items:center; justify-content:center;">
    <span id="lightbox-close" style="position:absolute; top:15px; right:20px; font-size:28px; color:#fff; cursor:pointer; z-index:100000; line-height:1;">&times;</span>
    <span id="lightbox-prev" style="position:absolute; left:15px; top:50%; transform:translateY(-50%); font-size:40px; color:#fff; cursor:pointer; z-index:100000; user-select:none;">&#10094;</span>
    <div style="max-width:700px; width:90%; text-align:center; position:relative;">
        <img id="lightbox-img" src="" alt="" style="max-width:100%; max-height:80vh; border:none; display:block; margin:0 auto;">
        <div id="lightbox-counter" style="color:#fff; margin-top:8px; font-size:14px; font-family:Arial,sans-serif;"></div>
    </div>
    <span id="lightbox-next" style="position:absolute; right:15px; top:50%; transform:translateY(-50%); font-size:40px; color:#fff; cursor:pointer; z-index:100000; user-select:none;">&#10095;</span>
</div>

<script>
    (function () {
        // Build ONE flat array of ALL images across ALL sections in order
        var allImages = [];

        // factoryGalleries is keyed by section id in insertion order
        // We need to collect them in DOM order (same order sections appear on page)
        document.querySelectorAll('.factory-lightbox-trigger').forEach(function(el) {
            var src = el.getAttribute('href');
            // avoid duplicates
            if (!allImages.includes(src)) {
                allImages.push(src);
            }
        });

        var lightbox        = document.getElementById('factory-lightbox');
        var lightboxImg     = document.getElementById('lightbox-img');
        var lightboxCounter = document.getElementById('lightbox-counter');
        var closeBtn        = document.getElementById('lightbox-close');
        var prevBtn         = document.getElementById('lightbox-prev');
        var nextBtn         = document.getElementById('lightbox-next');

        var currentIndex = 0;

        function openLightbox(src) {
            var idx = allImages.indexOf(src);
            currentIndex = idx >= 0 ? idx : 0;
            showImage();
            lightbox.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            lightbox.style.display = 'none';
            document.body.style.overflow = '';
        }

        function showImage() {
            lightboxImg.src = allImages[currentIndex];
            lightboxCounter.textContent = (currentIndex + 1) + ' of ' + allImages.length;
        }

        function prevImage() {
            currentIndex = (currentIndex - 1 + allImages.length) % allImages.length;
            showImage();
        }

        function nextImage() {
            currentIndex = (currentIndex + 1) % allImages.length;
            showImage();
        }

        document.addEventListener('click', function (e) {
            var trigger = e.target.closest('.factory-lightbox-trigger');
            if (trigger) {
                e.preventDefault();
                openLightbox(trigger.getAttribute('href'));
            }
        });

        closeBtn.addEventListener('click', closeLightbox);
        prevBtn.addEventListener('click', prevImage);
        nextBtn.addEventListener('click', nextImage);

        lightbox.addEventListener('click', function (e) {
            if (e.target === lightbox) closeLightbox();
        });

        document.addEventListener('keydown', function (e) {
            if (lightbox.style.display === 'flex') {
                if (e.key === 'ArrowLeft')  prevImage();
                if (e.key === 'ArrowRight') nextImage();
                if (e.key === 'Escape')     closeLightbox();
            }
        });
    })();
</script>
@endsection
