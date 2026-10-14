{{-- Shared styling for Services detail pages (rich-text, admin-managed) --}}
{{-- Styles both the fixed hero/CTA and whatever HTML Summernote outputs inside .svc-body --}}
<style>
    .svc-page { --svc-primary: #5E1224; --svc-primary-dark: #440d1a; --svc-text: #3a3a3a; --svc-dark: #222; --svc-muted: #666; color: var(--svc-text); }
    .svc-page .container { max-width: 1140px; }
    .svc-wrap { padding: 50px 0 60px; }

    /* Page title + subtitle + rule */
    .svc-title { font-size: 34px; font-weight: 700; color: var(--svc-dark); margin: 0 0 8px; line-height: 1.25; }
    .svc-subtitle { font-size: 18px; color: var(--svc-muted); margin: 0; line-height: 1.6; }
    .svc-title-rule { border: 0; border-top: 2px solid #e4e4e4; margin: 18px 0 30px; }
    @media (max-width: 767px) { .svc-title { font-size: 26px; } .svc-subtitle { font-size: 16px; } }

    /* Optional hero image */
    .svc-hero-img { margin: 0 0 34px; }
    .svc-hero-img img { width: 100%; height: auto; border-radius: 10px; display: block; }

    /* Image placeholder (shown when no image is uploaded) */
    .svc-ph {
        background: #f2f2f2; border: 1px solid #e3e3e3; border-radius: 10px;
        display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 8px;
        min-height: 300px; color: #bdbdbd; text-align: center; padding: 20px;
    }
    .svc-ph i { font-size: 40px; }
    .svc-ph span { font-size: 12px; letter-spacing: 1px; text-transform: uppercase; }
    .svc-ph.gallery-ph { min-height: 210px; }

    /* ── Rich-text body (Summernote output) ───────────────────────── */
    .svc-body { font-size: 16px; line-height: 1.85; }
    .svc-body p { margin: 0 0 16px; text-align: justify; color: var(--svc-text); }
    .svc-body h2 {
        font-size: 26px; font-weight: 700; color: var(--svc-dark);
        margin: 40px 0 16px; padding-bottom: 10px; border-bottom: 2px solid #eee;
    }
    .svc-body h3 { font-size: 19px; font-weight: 700; color: var(--svc-primary); margin: 22px 0 8px; }
    .svc-body h4 { font-size: 17px; font-weight: 700; color: var(--svc-dark); margin: 18px 0 8px; }
    .svc-body ul { list-style: none; padding-left: 0; margin: 0 0 16px; }
    .svc-body ul li { position: relative; padding-left: 24px; margin-bottom: 10px; line-height: 1.6; }
    .svc-body ul li::before { content: ""; position: absolute; left: 4px; top: 10px; width: 7px; height: 7px; border-radius: 50%; background: var(--svc-primary); }
    .svc-body ol { padding-left: 20px; margin: 0 0 16px; }
    .svc-body ol li { margin-bottom: 10px; line-height: 1.6; }
    .svc-body a { color: var(--svc-primary); font-weight: 600; text-decoration: none; }
    .svc-body a:hover { text-decoration: underline; }
    .svc-body img { max-width: 100%; height: auto; border-radius: 8px; margin: 10px 0; }
    .svc-body table { width: 100%; border-collapse: collapse; margin: 0 0 18px; }
    .svc-body table th, .svc-body table td { border: 1px solid #e4e4e4; padding: 10px 14px; text-align: left; }
    .svc-body table th { background: #faf5f6; color: var(--svc-dark); }
    @media (max-width: 767px) { .svc-body h2 { font-size: 22px; } }

    /* Process flow line:  Design → Detailing → Fabrication ...  */
    .svc-body p.svc-flowline {
        background: #faf5f6; border: 1px solid #ecdfe2; border-left: 4px solid var(--svc-primary);
        border-radius: 6px; padding: 14px 18px; font-weight: 600; color: var(--svc-dark);
        text-align: left; letter-spacing: .2px;
    }
    /* Star strip:  Suitable Projects: Factories ★ Warehouses ★ ...  */
    .svc-body p.svc-starline { text-align: left; line-height: 2; }

    /* Image + text blocks (two-column, alternating) */
    .svc-blocks { margin: 0 0 30px; }
    .svc-row { display: flex; gap: 42px; align-items: center; flex-wrap: wrap; margin-bottom: 40px; }
    .svc-row:last-child { margin-bottom: 0; }
    .svc-row > .svc-col { flex: 1 1 340px; min-width: 280px; }
    .svc-row .svc-col.svc-body { font-size: 16px; line-height: 1.85; }
    @media (min-width: 900px) { .svc-row.reverse { flex-direction: row-reverse; } }
    .svc-block-img { width: 100%; height: auto; border-radius: 10px; display: block; }
    .svc-row .svc-ph { min-height: 320px; }

    /* Photo gallery */
    .svc-gallery { margin-top: 44px; }
    .svc-gallery h2 { font-size: 26px; font-weight: 700; color: var(--svc-dark); margin: 0 0 18px; padding-bottom: 10px; border-bottom: 2px solid #eee; }
    .svc-gallery-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; }
    @media (max-width: 767px) { .svc-gallery-grid { grid-template-columns: repeat(2, 1fr); } }
    @media (max-width: 480px) { .svc-gallery-grid { grid-template-columns: 1fr; } }
    .svc-gallery-grid a { display: block; border-radius: 8px; overflow: hidden; border: 1px solid #ececec; }
    .svc-gallery-grid img { width: 100%; height: 210px; object-fit: cover; display: block; transition: transform .3s ease; }
    .svc-gallery-grid a:hover img { transform: scale(1.05); }

    /* CTA (fixed buttons) */
    .svc-cta { margin-top: 44px; background: #faf5f6; border: 1px solid #efe2e5; border-radius: 10px; padding: 30px; text-align: center; }
    .svc-btns { display: flex; gap: 12px; justify-content: center; flex-wrap: wrap; }
    .svc-btn { display: inline-block; padding: 12px 28px; border-radius: 4px; font-weight: 600; font-size: 15px; text-decoration: none; transition: all .2s ease; }
    .svc-btn.primary { background: var(--svc-primary); color: #fff; }
    .svc-btn.primary:hover { background: var(--svc-primary-dark); color: #fff; }
    .svc-btn.outline { background: #fff; color: var(--svc-primary); border: 1px solid var(--svc-primary); }
    .svc-btn.outline:hover { background: var(--svc-primary); color: #fff; }
</style>
