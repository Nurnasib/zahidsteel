@extends('layouts.frontend.master')

@section('content')
<div class="construction-content-area pagew">
    <div class="container">

        <div class="row">
            <div class="ppt pstn">Running Projects</div>

            <div id="prj" class="col-md-12 wow ppage animated" style="visibility: visible;">
                <!-- Item -->

                @include('frontend.partial.project')


            </div>
        </div>

    </div>
</div>

@endsection
