@extends('layouts.frontend.master')

@section('content')
<div class="construction-content-area pagew">
    <div class="container">

        <div class="row">
            <div class="ppt pstn">Completed Projects</div>

            <div id="prj" class="col-md-12 wow fadeInUp ppage" style="visibility: visible; animation-name: fadeInUp;">
                <!-- Item -->
              @include('frontend.partial.project')


            </div>
        </div>

    </div>
</div>

@endsection
