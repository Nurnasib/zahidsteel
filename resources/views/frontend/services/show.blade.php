@extends('layouts.frontend.master')

@if(!empty($page?->meta_title))
    @section('meta_title', $page->meta_title)
@endif
@if(!empty($page?->meta_description))
    @section('meta_description', $page->meta_description)
@endif
@if($page?->shareImage())
    @section('og_image', $page->shareImage())
@endif

@section('content')
@if($page && ($faqs = $page->faqs()))
    {{-- FAQ rich results, read from the page's "Frequently Asked Questions" section --}}
    <script type="application/ld+json">{!! json_encode([
        '@context'   => 'https://schema.org',
        '@type'      => 'FAQPage',
        'mainEntity' => array_map(fn ($faq) => [
            '@type'          => 'Question',
            'name'           => $faq['question'],
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq['answer']],
        ], $faqs),
    ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG) !!}</script>
@endif
<div class="svc-page">
    @include('frontend.services._styles')

    <div class="svc-wrap">
        <div class="container">

            @if($page)
                <h1 class="svc-title">{{ $page->title }}</h1>
                @if($page->subtitle)
                    <p class="svc-subtitle">{{ $page->subtitle }}</p>
                @endif
                <hr class="svc-title-rule">

                @php $hero = !empty($page->image) ? json_decode($page->image) : null; @endphp
                @if($hero)
                    <div class="svc-hero-img">
                        <picture>
                            <source media="(max-width:480px)" srcset="{{ asset($hero->small) }}">
                            <source media="(max-width:991px)" srcset="{{ asset($hero->medium) }}">
                            <img src="{{ asset($hero->large ?? $hero->original) }}" alt="{{ $page->title }}">
                        </picture>
                    </div>
                @endif

                {{-- Image + text blocks (two-column, auto-alternating sides) --}}
                @php $blocks = !empty($page->blocks) ? json_decode($page->blocks) : []; @endphp
                @if(!empty($blocks))
                    <div class="svc-blocks">
                        @foreach($blocks as $bi => $b)
                            <div class="svc-row {{ $bi % 2 == 1 ? 'reverse' : '' }}">
                                <div class="svc-col svc-body">{!! $b->text ?? '' !!}</div>
                                <div class="svc-col">
                                    @if(!empty($b->image))
                                        <img class="svc-block-img" src="{{ asset($b->image->large ?? $b->image->original) }}" alt="{{ $page->title }}">
                                    @else
                                        <div class="svc-ph"><i class="fas fa-image"></i><span>Image</span></div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                {{-- Admin-managed rich-text content --}}
                <div class="svc-body">
                    {!! $page->body !!}
                </div>

                {{-- Admin-managed photo gallery --}}
                @php $gallery = !empty($page->gallery) ? json_decode($page->gallery) : []; @endphp
                @if(!empty($gallery))
                    <div class="svc-gallery">
                        <h2>Gallery</h2>
                        <div class="svc-gallery-grid">
                            @foreach($gallery as $g)
                                <a href="{{ asset($g->large ?? $g->original) }}" target="_blank" rel="noopener">
                                    <img src="{{ asset($g->medium ?? $g->original) }}" alt="{{ $page->title }}" loading="lazy">
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                {{-- Fixed call-to-action (links always work) --}}
                <div class="svc-cta">
                    <div class="svc-btns">
                        <a href="{{ route('contact-us') }}" class="svc-btn primary">Request a Quote</a>
                        <a href="{{ route('contact-us') }}" class="svc-btn outline">Contact Us</a>
                    </div>
                </div>
            @else
                <h1 class="svc-title">Service</h1>
                <hr class="svc-title-rule">
                <p>Content for this page has not been added yet.</p>
            @endif

        </div>
    </div>
</div>
@endsection
