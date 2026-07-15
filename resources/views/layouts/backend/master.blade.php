<!doctype html>
<html lang="en" class="fixed left-sidebar-top">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>{{$setting->site_name}}</title>

    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset(optional($setting)->favicon ?? 'default/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset(optional($setting)->favicon ?? 'default/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset(optional($setting)->favicon ?? 'default/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset(optional($setting)->favicon ?? 'default/favicon.png') }}">

    @include('layouts.backend.style')
</head>

<body>
<div class="wrap">
    @include('layouts.backend.navbar')

    <div class="page-body">
        @include('layouts.backend.sidebar')

        @yield('admin')
    </div>
</div>

@include('sweetalert::alert')
@include('layouts.backend.script')
@yield('script')

<script>
    // ─── FA Icons list ────────────────────────────────────────────────────────────
    const FA_ICONS = [
        'fa-home','fa-user','fa-users','fa-cog','fa-star','fa-heart',
        'fa-check','fa-check-circle','fa-times','fa-times-circle',
        'fa-plus','fa-plus-circle','fa-minus','fa-info-circle',
        'fa-exclamation-circle','fa-exclamation-triangle',
        'fa-question-circle','fa-search','fa-lock','fa-unlock',
        'fa-key','fa-shield','fa-bell','fa-comment','fa-comments',
        'fa-envelope','fa-phone','fa-mobile','fa-map-marker',
        'fa-globe','fa-flag','fa-bookmark','fa-tag','fa-folder',
        'fa-file','fa-file-text','fa-edit','fa-trash','fa-download',
        'fa-upload','fa-cloud','fa-share','fa-link','fa-arrow-right',
        'fa-arrow-left','fa-arrow-up','fa-arrow-down','fa-bars',
        'fa-list','fa-list-ul','fa-list-ol','fa-th','fa-filter',
        'fa-refresh','fa-eye','fa-image','fa-camera','fa-calendar',
        'fa-clock-o','fa-print','fa-database','fa-desktop','fa-wifi',
        'fa-bolt','fa-rocket','fa-plane','fa-car','fa-truck',
        'fa-bicycle','fa-shopping-cart','fa-credit-card','fa-money',
        'fa-bar-chart','fa-line-chart','fa-pie-chart','fa-briefcase',
        'fa-building','fa-medkit','fa-heartbeat','fa-thumbs-up',
        'fa-thumbs-down','fa-trophy','fa-book','fa-pencil',
        'fa-paint-brush','fa-magic','fa-gift','fa-tree','fa-leaf',
        'fa-fire','fa-umbrella','fa-recycle','fa-facebook','fa-twitter',
        'fa-instagram','fa-linkedin','fa-youtube','fa-github',
        'fa-whatsapp','fa-wrench','fa-paper-plane','fa-sitemap',
        'fa-check-square','fa-square-o','fa-circle','fa-dot-circle-o',
        'fa-location-arrow','fa-send','fa-inbox','fa-expand',
        'fa-map-signs','fa-reply','fa-forward','fa-certificate',
        'fa-graduation-cap','fa-gamepad','fa-sun-o','fa-moon-o',
    ];

    // ─── Register icon plugin (must be before summernote init) ────────────────────
    (function ($) {
        $.extend($.summernote.plugins, {
            'faIconPicker': function (context) {
                const ui = $.summernote.ui;

                const $dropdown = $([
                    '<div style="display:none;position:fixed;z-index:99999;background:#fff;',
                    '     border:1px solid #ccc;border-radius:6px;padding:8px;',
                    '     width:320px;max-height:260px;overflow-y:auto;',
                    '     box-shadow:0 6px 20px rgba(0,0,0,.18);">',
                    '  <input type="text" placeholder="Search icon…"',
                    '     class="form-control input-sm sn-fa-search" style="margin-bottom:8px;">',
                    '  <div class="sn-fa-grid" style="display:flex;flex-wrap:wrap;gap:4px;"></div>',
                    '</div>',
                ].join('')).appendTo('body');

                function buildGrid(filter) {
                    const $grid = $dropdown.find('.sn-fa-grid').empty();
                    FA_ICONS.filter(ic => !filter || ic.includes(filter)).forEach(function (ic) {
                        $('<button type="button">').attr('title', ic)
                            .css({ width:'38px', height:'38px', border:'1px solid #eee',
                                borderRadius:'4px', background:'#fafafa', cursor:'pointer',
                                display:'flex', alignItems:'center', justifyContent:'center' })
                            .html('<i class="fa ' + ic + '" style="font-size:15px;color:#444;pointer-events:none;"></i>')
                            .on('mouseenter', function () { $(this).css('background','#f0f0f0'); })
                            .on('mouseleave', function () { $(this).css('background','#fafafa'); })
                            .on('click', function (e) {
                                e.stopPropagation();
                                context.invoke('editor.restoreRange');
                                context.invoke('editor.focus');
                                context.invoke('editor.insertNode',
                                    $('<i class="fa ' + ic + '" style="margin:0 3px;"></i>')[0]
                                );
                                $dropdown.hide();
                            }).appendTo($grid);
                    });
                }

                $dropdown.on('input', '.sn-fa-search', function () {
                    buildGrid($(this).val().toLowerCase().replace(/^fa-?/, 'fa-'));
                });

                $(document).on('click.snFa', function (e) {
                    if (!$(e.target).closest($dropdown).length &&
                        !$(e.target).hasClass('sn-fa-btn')) { $dropdown.hide(); }
                });

                this.initialize = function () {};
                this.events = { 'summernote.destroy': function () {
                        $dropdown.remove(); $(document).off('click.snFa');
                    }};

                context.memo('button.faIconPicker', function () {
                    return ui.button({
                        contents : '<i class="fa fa-flag" style="color:#e91e8c;"></i> Icon',
                        tooltip  : 'Insert Icon',
                        className: 'sn-fa-btn',
                        click: function (e) {
                            e.stopPropagation();
                            if ($dropdown.is(':visible')) { $dropdown.hide(); return; }
                            context.invoke('editor.saveRange');
                            const $btn = $(e.currentTarget), off = $btn.offset();
                            const top  = ($(window).height() - off.top - $btn.outerHeight()) > 270
                                ? off.top + $btn.outerHeight() + 2
                                : off.top - 272;
                            $dropdown.css({ top: top, left: off.left }).show();
                            buildGrid('');
                            $dropdown.find('.sn-fa-search').val('').trigger('focus');
                        }
                    }).render();
                });
            }
        });
    })(jQuery);

    // ─── Your original code — only ['icon'] line added ────────────────────────────
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 250,
            fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Helvetica', 'Impact', 'Tahoma', 'Times New Roman', 'Verdana', 'Poppins', 'Roboto', 'Open Sans', 'Lato'],
            fontNamesIgnoreCheck: ['Poppins', 'Roboto', 'Open Sans', 'Lato'],
            toolbar: [
                ['style',    ['style']],
                ['font',     ['bold', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color',    ['color']],
                ['para',     ['ul', 'ol', 'paragraph']],
                ['table',    ['table']],
                ['insert',   ['link', 'picture', 'video']],
                ['icon',     ['faIconPicker']],   // ← only this line added
                ['view',     ['fullscreen', 'codeview', 'help']]
            ]
        });
    });
</script>

</body>
</html>
