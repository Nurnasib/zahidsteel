@extends('layouts.frontend.master')

@section('content')

    <style>

        /* ── Section wrapper ── */
        .clients-section {
            max-width: 1200px;
            margin: 0 auto;
            padding: 60px 24px 40px;
        }

        /* ── Header ── */
        .clients-eyebrow {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-bottom: 14px;
        }
        .clients-eyebrow::before,
        .clients-eyebrow::after {
            content: '';
            display: block;
            width: 40px;
            height: 2px;
            background: #8b1a2b;
        }
        .clients-eyebrow span {
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 2px;
            color: #8b1a2b;
            text-transform: uppercase;
        }

        .clients-title {
            text-align: center;
            font-size: 42px;
            font-weight: 800;
            color: #0d1b3e;
            line-height: 1.15;
            margin-bottom: 6px;
        }
        .clients-title span {
            color: #8b1a2b;
        }

        /* underline accent */
        .title-underline {
            display: flex;
            justify-content: center;
            margin-bottom: 18px;
        }
        .title-underline::after {
            content: '';
            display: block;
            width: 60px;
            height: 3px;
            background: #8b1a2b;
            border-radius: 2px;
        }

        .clients-subtitle {
            text-align: center;
            color: #555;
            font-size: 15px;
            margin-bottom: 40px;
        }

        /* ── Grid ── */
        .clients-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 10px;
            border: 1px solid #dde1ea;
            border-radius: 6px;
            overflow: hidden;

        }

        .client-card {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 6px;
            padding: 28px 16px;
            border-right: 1px solid #dde1ea;
            border-bottom: 1px solid #dde1ea;
            background: #fff;
            transition: background 0.18s;
            min-height: 110px;
        }
        .client-card:hover { background: #f9f0f2; }
        .client-card:nth-child(5n) { border-right: none; }
        .client-card:nth-last-child(-n+5) { border-bottom: none; }

        .client-card img {
            max-width: 130px;
            max-height: 54px;
            width: auto;
            height: auto;
            object-fit: contain;
        }

        .client-card .brand-name {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: #333;
            margin-top: 4px;
        }

        /* ── Fallback logo boxes (SVG-based text logos) ── */
        .logo-svg {
            width: 130px;
            height: 54px;
        }

        /* ── CTA Banner ── */
        .cta-banner {
            margin-top: 32px;
            background: #7a1025;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 28px 36px;
            gap: 24px;
            flex-wrap: wrap;
        }
        .cta-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .cta-icon {
            width: 54px;
            height: 54px;
            border: 2px solid rgba(255,255,255,0.5);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .cta-icon svg { width: 28px; height: 28px; }
        .cta-text {
            color: #fff;
            font-size: 15px;
            line-height: 1.55;
        }
        .cta-text strong { font-weight: 700; }

        .cta-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            border: 2px solid #fff;
            color: #fff;
            background: transparent;
            padding: 13px 28px;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            text-decoration: none;
            border-radius: 4px;
            white-space: nowrap;
            cursor: pointer;
            transition: background 0.18s, color 0.18s;
        }
        .cta-btn:hover { background: #fff; color: #7a1025; }
        .cta-btn svg { width: 16px; height: 16px; }

        /* ── Responsive ── */
        @media (max-width: 900px) {
            .clients-grid { grid-template-columns: repeat(3, 1fr); }
            .client-card:nth-child(5n) { border-right: 1px solid #dde1ea; }
            .client-card:nth-child(3n) { border-right: none; }
            .clients-title { font-size: 30px; }
        }
        @media (max-width: 560px) {
            .clients-grid { grid-template-columns: repeat(2, 1fr); }
            .client-card:nth-child(3n) { border-right: 1px solid #dde1ea; }
            .client-card:nth-child(2n) { border-right: none; }
            .cta-banner { flex-direction: column; align-items: flex-start; }
        }
    </style>


<section class="clients-section">

    <!-- Header -->
    <div class="clients-eyebrow"><span>Our Clients</span></div>
    <h2 class="clients-title">Our Honorable <span>Clients</span></h2>
    <div class="title-underline"></div>
    <p class="clients-subtitle">We are proud to work with some of the leading organizations in Bangladesh.</p>

    <!-- Grid -->
    <div class="clients-grid">

        <!-- Row 1 -->
        @foreach($clientList as $client)
        <div class="client-card">
            @php
            $image = is_string($client->image) ? json_decode($client->image, true) : $client->image;
            $imgSrc = $image['medium'] ?? $image['original'] ?? $image['small'] ?? null;
            @endphp

            @if($imgSrc)
            <img src="{{ asset($imgSrc) }}" alt="{{ $client->title }}">
            @else
            <span class="brand-name">{{ $client->title }}</span>
            @endif
        </div>
        @endforeach


    </div><!-- /grid -->

    <!-- CTA Banner -->
    <div class="cta-banner">
        <div class="cta-left">
            <div class="cta-icon">
                <!-- Handshake icon -->
                <svg viewBox="0 0 28 28" fill="none" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 16l4-4 4 4 5-5 5 5 4-4"/>
                    <path d="M7 20c1.5 1.5 4 2 6 1l6-4"/>
                    <path d="M3 16c0 2.5 2 4 4 4"/>
                </svg>
            </div>
            <div class="cta-text">
                We value every partnership and are committed to delivering<br/>
                <strong>quality, safety and excellence in every project.</strong>
            </div>
        </div>
        <a href="#" class="cta-btn">
            JOIN OUR CLIENT LIST
            <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" xmlns="http://www.w3.org/2000/svg">
                <line x1="2" y1="8" x2="14" y2="8"/>
                <polyline points="9,3 14,8 9,13"/>
            </svg>
        </a>
    </div>

</section>



@endsection
