{{-- ================================================================
     layouts/backend/style.blade.php
     Load ALL stylesheets here in the correct order.
================================================================ --}}

{{-- Pace loader CSS (first so the progress bar shows immediately) --}}
<link href="{{asset('admin')}}/vendor/pace/pace-theme-minimal.css" rel="stylesheet">

{{-- Bootstrap --}}
<link rel="stylesheet" href="{{asset('admin')}}/vendor/bootstrap/css/bootstrap.css">

{{-- Font Awesome 4 --}}
<link rel="stylesheet" href="{{asset('admin')}}/vendor/font-awesome/css/font-awesome.css">

{{-- Animate.css --}}
<link rel="stylesheet" href="{{asset('admin')}}/vendor/animate.css/animate.css">

{{-- Select2 --}}
<link rel="stylesheet" href="{{asset('admin')}}/vendor/select2/css/select2.min.css">
<link rel="stylesheet" href="{{asset('admin')}}/vendor/select2/css/select2-bootstrap.min.css">

{{-- Toastr --}}
<link rel="stylesheet" href="{{asset('admin')}}/vendor/toastr/toastr.min.css">

{{-- Magnific popup --}}
<link rel="stylesheet" href="{{asset('admin')}}/vendor/magnific-popup/magnific-popup.css">

{{-- Summernote --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote.min.css">

{{-- Admin template --}}
<link rel="stylesheet" href="{{asset('admin')}}/stylesheets/css/style.css">
