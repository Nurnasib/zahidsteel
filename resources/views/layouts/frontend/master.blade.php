<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="6ZFrznxep4f00Bug0ZhmBcM8tMqMNUhiR2TiYMiS5nM" />

    <title>@yield('meta_title', $seoTitle)</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/bootstrap.min.css">
    <!-- Font-awesome CSS -->
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/all.css">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/owl.carousel.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/magnific-popup.css">
    <!-- Slick Nav CSS -->
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/slicknav.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/animate.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/main.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('frontend')}}/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/responsive.css">
    <!-- jQuery min js -->

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-F02Z9THPN5"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-F02Z9THPN5');
    </script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-123761147-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-123761147-1');
    </script>


    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />

    <meta name="description" content="@yield('meta_description', $seoDescription)" />
    <link rel="canonical" href="{{ url()->current() }}" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    {{-- Social sharing: pages override meta_title / meta_description / og_image via @section --}}
    <meta property="og:title" content="@yield('meta_title', $seoTitle)" />
    <meta property="og:description" content="@yield('meta_description', $seoDescription)" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:site_name" content="{{$setting->site_name}}" />
    <meta property="article:publisher" content="{{$setting->fb}}" />
    <meta property="og:image" content="@yield('og_image', asset($setting->logo))" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="@yield('meta_title', $seoTitle)" />
    <meta name="twitter:description" content="@yield('meta_description', $seoDescription)" />
    <meta name="twitter:image" content="@yield('og_image', asset($setting->logo))" />




    <style id="wp-img-auto-sizes-contain-inline-css">
        img:is([sizes=auto i],[sizes^="auto," i]){contain-intrinsic-size:3000px 1500px}
        /*# sourceURL=wp-img-auto-sizes-contain-inline-css */
    </style>
    <style id="wp-emoji-styles-inline-css">

        img.wp-smiley, img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 0.07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }
        /*# sourceURL=wp-emoji-styles-inline-css */
    </style>
    <style id="wp-block-library-inline-css">
        :root{--wp-block-synced-color:#7a00df;--wp-block-synced-color--rgb:122,0,223;--wp-bound-block-color:var(--wp-block-synced-color);--wp-editor-canvas-background:#ddd;--wp-admin-theme-color:#007cba;--wp-admin-theme-color--rgb:0,124,186;--wp-admin-theme-color-darker-10:#006ba1;--wp-admin-theme-color-darker-10--rgb:0,107,160.5;--wp-admin-theme-color-darker-20:#005a87;--wp-admin-theme-color-darker-20--rgb:0,90,135;--wp-admin-border-width-focus:2px}@media (min-resolution:192dpi){:root{--wp-admin-border-width-focus:1.5px}}.wp-element-button{cursor:pointer}:root .has-very-light-gray-background-color{background-color:#eee}:root .has-very-dark-gray-background-color{background-color:#313131}:root .has-very-light-gray-color{color:#eee}:root .has-very-dark-gray-color{color:#313131}:root .has-vivid-green-cyan-to-vivid-cyan-blue-gradient-background{background:linear-gradient(135deg,#00d084,#0693e3)}:root .has-purple-crush-gradient-background{background:linear-gradient(135deg,#34e2e4,#4721fb 50%,#ab1dfe)}:root .has-hazy-dawn-gradient-background{background:linear-gradient(135deg,#faaca8,#dad0ec)}:root .has-subdued-olive-gradient-background{background:linear-gradient(135deg,#fafae1,#67a671)}:root .has-atomic-cream-gradient-background{background:linear-gradient(135deg,#fdd79a,#004a59)}:root .has-nightshade-gradient-background{background:linear-gradient(135deg,#330968,#31cdcf)}:root .has-midnight-gradient-background{background:linear-gradient(135deg,#020381,#2874fc)}:root{--wp--preset--font-size--normal:16px;--wp--preset--font-size--huge:42px}.has-regular-font-size{font-size:1em}.has-larger-font-size{font-size:2.625em}.has-normal-font-size{font-size:var(--wp--preset--font-size--normal)}.has-huge-font-size{font-size:var(--wp--preset--font-size--huge)}:root .has-text-align-center{text-align:center}:root .has-text-align-left{text-align:left}:root .has-text-align-right{text-align:right}.has-fit-text{white-space:nowrap!important}#end-resizable-editor-section{display:none}.aligncenter{clear:both}.items-justified-left{justify-content:flex-start}.items-justified-center{justify-content:center}.items-justified-right{justify-content:flex-end}.items-justified-space-between{justify-content:space-between}.screen-reader-text{word-wrap:normal!important;border:0;clip-path:inset(50%);height:1px;margin:-1px;overflow:hidden;padding:0;position:absolute;width:1px}.screen-reader-text:focus{background-color:#ddd;clip-path:none;color:#444;display:block;font-size:1em;height:auto;left:5px;line-height:normal;padding:15px 23px 14px;text-decoration:none;top:5px;width:auto;z-index:100000}html :where(.has-border-color){border-style:solid}html :where([style*=border-color]){border-style:solid}html :where([style*=border-top-color]){border-top-style:solid}html :where([style*=border-right-color]){border-right-style:solid}html :where([style*=border-bottom-color]){border-bottom-style:solid}html :where([style*=border-left-color]){border-left-style:solid}html :where([style*=border-width]){border-style:solid}html :where([style*=border-top-width]){border-top-style:solid}html :where([style*=border-right-width]){border-right-style:solid}html :where([style*=border-bottom-width]){border-bottom-style:solid}html :where([style*=border-left-width]){border-left-style:solid}html :where(img[class*=wp-image-]){height:auto;max-width:100%}:where(figure){margin:0 0 1em}html :where(.is-position-sticky){--wp-admin--admin-bar--position-offset:var(--wp-admin--admin-bar--height,0px)}@media screen and (max-width:600px){html :where(.is-position-sticky){--wp-admin--admin-bar--position-offset:0px}}

        /*# sourceURL=/wp-includes/css/dist/block-library/common.min.css */
    </style>
    <style id="classic-theme-styles-inline-css">
        /*! This file is auto-generated */
        .wp-block-button__link{color:#fff;background-color:#32373c;border-radius:9999px;box-shadow:none;text-decoration:none;padding:calc(.667em + 2px) calc(1.333em + 2px);font-size:1.125em}.wp-block-file__button{background:#32373c;color:#fff;text-decoration:none}
        /*# sourceURL=/wp-includes/css/classic-themes.min.css */
    </style>

    <style id="global-styles-inline-css">
        :root{--wp--preset--aspect-ratio--square: 1;--wp--preset--aspect-ratio--4-3: 4/3;--wp--preset--aspect-ratio--3-4: 3/4;--wp--preset--aspect-ratio--3-2: 3/2;--wp--preset--aspect-ratio--2-3: 2/3;--wp--preset--aspect-ratio--16-9: 16/9;--wp--preset--aspect-ratio--9-16: 9/16;--wp--preset--color--black: #000000;--wp--preset--color--cyan-bluish-gray: #abb8c3;--wp--preset--color--white: #ffffff;--wp--preset--color--pale-pink: #f78da7;--wp--preset--color--vivid-red: #cf2e2e;--wp--preset--color--luminous-vivid-orange: #ff6900;--wp--preset--color--luminous-vivid-amber: #fcb900;--wp--preset--color--light-green-cyan: #7bdcb5;--wp--preset--color--vivid-green-cyan: #00d084;--wp--preset--color--pale-cyan-blue: #8ed1fc;--wp--preset--color--vivid-cyan-blue: #0693e3;--wp--preset--color--vivid-purple: #9b51e0;--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg,rgb(6,147,227) 0%,rgb(155,81,224) 100%);--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg,rgb(122,220,180) 0%,rgb(0,208,130) 100%);--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg,rgb(252,185,0) 0%,rgb(255,105,0) 100%);--wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg,rgb(255,105,0) 0%,rgb(207,46,46) 100%);--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg,rgb(238,238,238) 0%,rgb(169,184,195) 100%);--wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg,rgb(74,234,220) 0%,rgb(151,120,209) 20%,rgb(207,42,186) 40%,rgb(238,44,130) 60%,rgb(251,105,98) 80%,rgb(254,248,76) 100%);--wp--preset--gradient--blush-light-purple: linear-gradient(135deg,rgb(255,206,236) 0%,rgb(152,150,240) 100%);--wp--preset--gradient--blush-bordeaux: linear-gradient(135deg,rgb(254,205,165) 0%,rgb(254,45,45) 50%,rgb(107,0,62) 100%);--wp--preset--gradient--luminous-dusk: linear-gradient(135deg,rgb(255,203,112) 0%,rgb(199,81,192) 50%,rgb(65,88,208) 100%);--wp--preset--gradient--pale-ocean: linear-gradient(135deg,rgb(255,245,203) 0%,rgb(182,227,212) 50%,rgb(51,167,181) 100%);--wp--preset--gradient--electric-grass: linear-gradient(135deg,rgb(202,248,128) 0%,rgb(113,206,126) 100%);--wp--preset--gradient--midnight: linear-gradient(135deg,rgb(2,3,129) 0%,rgb(40,116,252) 100%);--wp--preset--font-size--small: 13px;--wp--preset--font-size--medium: 20px;--wp--preset--font-size--large: 36px;--wp--preset--font-size--x-large: 42px;--wp--preset--spacing--20: 0.44rem;--wp--preset--spacing--30: 0.67rem;--wp--preset--spacing--40: 1rem;--wp--preset--spacing--50: 1.5rem;--wp--preset--spacing--60: 2.25rem;--wp--preset--spacing--70: 3.38rem;--wp--preset--spacing--80: 5.06rem;--wp--preset--shadow--natural: 6px 6px 9px rgba(0, 0, 0, 0.2);--wp--preset--shadow--deep: 12px 12px 50px rgba(0, 0, 0, 0.4);--wp--preset--shadow--sharp: 6px 6px 0px rgba(0, 0, 0, 0.2);--wp--preset--shadow--outlined: 6px 6px 0px -3px rgb(255, 255, 255), 6px 6px rgb(0, 0, 0);--wp--preset--shadow--crisp: 6px 6px 0px rgb(0, 0, 0);}:where(body) { margin: 0; }:where(.is-layout-flex){gap: 0.5em;}:where(.is-layout-grid){gap: 0.5em;}body .is-layout-flex{display: flex;}.is-layout-flex{flex-wrap: wrap;align-items: center;}.is-layout-flex > :is(*, div){margin: 0;}body .is-layout-grid{display: grid;}.is-layout-grid > :is(*, div){margin: 0;}body{padding-top: 0px;padding-right: 0px;padding-bottom: 0px;padding-left: 0px;}:root :where(.wp-element-button, .wp-block-button__link){background-color: #32373c;border-width: 0;color: #fff;font-family: inherit;font-size: inherit;font-style: inherit;font-weight: inherit;letter-spacing: inherit;line-height: inherit;padding-top: calc(0.667em + 2px);padding-right: calc(1.333em + 2px);padding-bottom: calc(0.667em + 2px);padding-left: calc(1.333em + 2px);text-decoration: none;text-transform: inherit;}.has-black-color{color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-color{color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-color{color: var(--wp--preset--color--white) !important;}.has-pale-pink-color{color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-color{color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-color{color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-color{color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-color{color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-color{color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-color{color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-color{color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-color{color: var(--wp--preset--color--vivid-purple) !important;}.has-black-background-color{background-color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-background-color{background-color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-background-color{background-color: var(--wp--preset--color--white) !important;}.has-pale-pink-background-color{background-color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-background-color{background-color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-background-color{background-color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-background-color{background-color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-background-color{background-color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-background-color{background-color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-background-color{background-color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-background-color{background-color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-background-color{background-color: var(--wp--preset--color--vivid-purple) !important;}.has-black-border-color{border-color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-border-color{border-color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-border-color{border-color: var(--wp--preset--color--white) !important;}.has-pale-pink-border-color{border-color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-border-color{border-color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-border-color{border-color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-border-color{border-color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-border-color{border-color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-border-color{border-color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-border-color{border-color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-border-color{border-color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-border-color{border-color: var(--wp--preset--color--vivid-purple) !important;}.has-vivid-cyan-blue-to-vivid-purple-gradient-background{background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;}.has-light-green-cyan-to-vivid-green-cyan-gradient-background{background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;}.has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background{background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;}.has-luminous-vivid-orange-to-vivid-red-gradient-background{background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;}.has-very-light-gray-to-cyan-bluish-gray-gradient-background{background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;}.has-cool-to-warm-spectrum-gradient-background{background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;}.has-blush-light-purple-gradient-background{background: var(--wp--preset--gradient--blush-light-purple) !important;}.has-blush-bordeaux-gradient-background{background: var(--wp--preset--gradient--blush-bordeaux) !important;}.has-luminous-dusk-gradient-background{background: var(--wp--preset--gradient--luminous-dusk) !important;}.has-pale-ocean-gradient-background{background: var(--wp--preset--gradient--pale-ocean) !important;}.has-electric-grass-gradient-background{background: var(--wp--preset--gradient--electric-grass) !important;}.has-midnight-gradient-background{background: var(--wp--preset--gradient--midnight) !important;}.has-small-font-size{font-size: var(--wp--preset--font-size--small) !important;}.has-medium-font-size{font-size: var(--wp--preset--font-size--medium) !important;}.has-large-font-size{font-size: var(--wp--preset--font-size--large) !important;}.has-x-large-font-size{font-size: var(--wp--preset--font-size--x-large) !important;}
        /*# sourceURL=global-styles-inline-css */
    </style>

    <link rel='stylesheet' id='contact-form-7-css' href='{{asset("frontend")}}/plugins/contact-form-7/includes/css/stylesdfc9.css?ver=5.8.5' media='all' />
    <link rel='stylesheet' id='bg-shce-genericons-css' href='{{asset("frontend")}}/plugins/show-hidecollapse-expand/assets/css/genericons/genericons8717.css?ver=7.0' media='all' />
    <link rel='stylesheet' id='bg-show-hide-css' href='{{asset("frontend")}}/plugins/show-hidecollapse-expand/assets/css/bg-show-hide8717.css?ver=7.0' media='all' />
    <link rel='stylesheet' id='slb_core-css' href='{{asset("frontend")}}/plugins/simple-lightbox/client/css/appf342.css?ver=2.9.3' media='all' />
    <link rel='stylesheet' id='tablepress-default-css' href='{{asset("frontend")}}/plugins/tablepress/css/build/defaultac31.css?ver=2.2.4' media='all' />
    <link rel='stylesheet' id='elementor-icons-css' href='{{asset("frontend")}}/plugins/elementor/assets/lib/eicons/css/elementor-icons.mind618.css?ver=5.21.0' media='all' />
    <link rel='stylesheet' id='elementor-frontend-css' href='{{asset("frontend")}}/plugins/elementor/assets/css/frontend.min5829.css?ver=3.15.1' media='all' />
    <link rel='stylesheet' id='swiper-css' href='{{asset("frontend")}}/plugins/elementor/assets/lib/swiper/css/swiper.min48f5.css?ver=5.3.6' media='all' />
    <link rel='stylesheet' id='elementor-post-5898-css' href='{{asset("frontend")}}/uploads/elementor/css/post-58982e9d.css' media='all' />
    <link rel='stylesheet' id='elementor-pro-css' href='{{asset("frontend")}}/plugins/elementor-pro/assets/css/frontend.minac9e.css?ver=3.7.7' media='all' />
    <link rel='stylesheet' id='fancy-elementor-flipbox-css-css' href='{{asset("frontend")}}/plugins/fancy-elementor-flipbox/assets/css/fancy-elementor-flipbox8717.css?ver=7.0' media='all' />
    <link rel='stylesheet' id='elementor-global-css' href='{{asset("frontend")}}/uploads/elementor/css/global9208.css?ver=1769855434' media='all' />
    <link rel='stylesheet' id='elementor-post-1096-css' href='{{asset("frontend")}}/uploads/elementor/css/post-1096cc51.css?ver=1769856407' media='all' />
    <link rel='stylesheet' id='google-fonts-1-css' href='https://fonts.googleapis.com/css?family=Roboto:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic%7CRoboto+Slab:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&amp;display=auto&amp;ver=7.0' media='all' />
    <link rel='stylesheet' id='elementor-icons-shared-0-css' href='{{asset("frontend")}}/plugins/elementor/assets/lib/font-awesome/css/fontawesome.min52d5.css?ver=5.15.3' media='all' />
    <link rel='stylesheet' id='elementor-icons-fa-regular-css' href='{{asset("frontend")}}/plugins/elementor/assets/lib/font-awesome/css/regular.min52d5.css?ver=5.15.3' media='all' />
    <link rel='stylesheet' id='elementor-icons-fa-solid-css' href='{{asset("frontend")}}/plugins/elementor/assets/lib/font-awesome/css/solid.min52d5.css?ver=5.15.3' media='all' />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin><script id="jquery-core-js" src="{{asset('frontend')}}/js/jquery/jquery.minf43b.js?ver=3.7.1"></script>
    <script id="jquery-migrate-js" src="{{asset('frontend')}}/js/jquery/jquery-migrate.min5589.js?ver=3.4.1"></script>

    <link rel='stylesheet' id='elementor-global-css' href='{{asset("frontend")}}/uploads/elementor/css/global.css?ver=1769855434' media='all' />
    <link rel='stylesheet' id='elementor-post-5527-css' href='{{asset("frontend")}}/uploads/elementor/css/post-5527.css?ver=1769862781' media='all' />

    <link rel='stylesheet' id='elementor-post-3068-css' href='{{asset("frontend")}}/uploads/elementor/css/post-3068.css?ver=1772524307' media='all' />

    <link rel="icon" href="{{asset($setting->favicon)}}" sizes="32x32" />
    <link rel="icon" href="{{asset($setting->favicon)}}" sizes="192x192" />
    <link rel="apple-touch-icon" href="{{asset($setting->favicon)}}" />
    <meta name="msapplication-TileImage" content="{{asset($setting->favicon)}}" />
    <link rel='stylesheet' id='e-animations-css' href='{{asset("frontend")}}/plugins/elementor/assets/lib/animations/animations.min5829.css?ver=3.15.1' media='all' />

</head>
<body class="home wp-singular page-template page-template-a-home page-template-a-home-php page page-id-1096 wp-custom-logo wp-theme-marnsteel_wp elementor-default elementor-kit-5898 elementor-page elementor-page-1096" >

@include('layouts.frontend.header')
<!-- end header -->

@yield('content')


@include('layouts.frontend.footer')


<!-- Start scroll to top feature -->
<!--     <a href="#" id="back-to-top" title="Back to Top"><i class="fa fa-fighter-jet"></i></a> -->
<!-- End scroll to top feature -->

<!-- Footer Area -->

<!-- Bootstrap JS file -->
<script src="{{asset('frontend')}}/assets/js/bootstrap.min.js"></script>
<!-- Owl-Carousel JS file -->
<script src="{{asset('frontend')}}/assets/js/owl.carousel.min.js"></script>
<!-- Slick-Nav JS file -->
<script src="{{asset('frontend')}}/assets/js/jquery.slicknav.min.js"></script>
<!-- Magnific Popup JS file -->
<!-- Mixitup JS file -->
<script src="{{asset('frontend')}}/assets/js/mixitup.min.js"></script>
<!-- WOW JS file -->
<script src="{{asset('frontend')}}/assets/js/wow.min.js"></script>
<!-- Custom JS file -->
<script src="{{asset('frontend')}}/assets/js/active.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

<script id="page-scroll-to-id-plugin-script-js-extra">
    var mPS2id_params = {"instances":{"mPS2id_instance_0":{"selector":"a[rel='m_PageScroll2id']","autoSelectorMenuLinks":"true","excludeSelector":"a[href^='#tab-'], a[href^='#tabs-'], a[data-toggle]:not([data-toggle='tooltip']), a[data-slide], a[data-vc-tabs], a[data-vc-accordion]","scrollSpeed":1000,"autoScrollSpeed":"true","scrollEasing":"easeInOutQuint","scrollingEasing":"easeOutQuint","forceScrollEasing":"false","pageEndSmoothScroll":"true","stopScrollOnUserAction":"false","autoCorrectScroll":"false","autoCorrectScrollExtend":"false","layout":"vertical","offset":0,"dummyOffset":"false","highlightSelector":"","clickedClass":"mPS2id-clicked","targetClass":"mPS2id-target","highlightClass":"mPS2id-highlight","forceSingleHighlight":"false","keepHighlightUntilNext":"false","highlightByNextTarget":"false","appendHash":"false","scrollToHash":"true","scrollToHashForAll":"true","scrollToHashDelay":0,"scrollToHashUseElementData":"true","scrollToHashRemoveUrlHash":"false","disablePluginBelow":0,"adminDisplayWidgetsId":"true","adminTinyMCEbuttons":"true","unbindUnrelatedClickEvents":"false","unbindUnrelatedClickEventsSelector":"","normalizeAnchorPointTargets":"false","encodeLinks":"false"}},"total_instances":"1","shortcode_class":"_ps2id"};
    //# sourceURL=page-scroll-to-id-plugin-script-js-extra
</script>
<script id="page-scroll-to-id-plugin-script-js" src="{{asset('frontend')}}/plugins/page-scroll-to-id/js/page-scroll-to-id.min725d.js?ver=1.7.8"></script>
<script id="jquery-effects-core-js" src="{{asset('frontend')}}/js/jquery/ui/effect.minb37e.js?ver=1.13.3"></script>
<script id="jquery-effects-slide-js" src="{{asset('frontend')}}/js/jquery/ui/effect-slide.minb37e.js?ver=1.13.3"></script>
<script id="jquery-effects-highlight-js" src="{{asset('frontend')}}/js/jquery/ui/effect-highlight.minb37e.js?ver=1.13.3"></script>
<script id="jquery-effects-fold-js" src="{{asset('frontend')}}/js/jquery/ui/effect-fold.minb37e.js?ver=1.13.3"></script>
<script id="jquery-effects-blind-js" src="{{asset('frontend')}}/js/jquery/ui/effect-blind.minb37e.js?ver=1.13.3"></script>
<script id="bg-show-hide-script-js-extra">
    var BG_SHCE_USE_EFFECTS = "0";
    var BG_SHCE_TOGGLE_SPEED = "400";
    var BG_SHCE_TOGGLE_OPTIONS = "none";
    var BG_SHCE_TOGGLE_EFFECT = "blind";
    //# sourceURL=bg-show-hide-script-js-extra
</script>
<script id="bg-show-hide-script-js" src="{{asset('frontend')}}/plugins/show-hidecollapse-expand/assets/js/bg-show-hide8717.js?ver=7.0"></script>
<script id="jquery-ui-core-js" src="{{asset('frontend')}}/js/jquery/ui/core.minb37e.js?ver=1.13.3"></script>


</body>


</html>


