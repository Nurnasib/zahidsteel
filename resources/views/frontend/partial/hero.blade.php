<div class="hompage-slides-wrapper">

    <div class="homepage-slides">

@foreach($sliders as $slider)
        @php
        $media = json_decode($slider->image, true);
        @endphp
        <div class="single-slider-item">
            <div class="slide-item-table">
                <img src="{{ asset($media['original'] ?? '') }}" alt="{{$slider->title}}">

            </div>
        </div>
        @endforeach




    </div>
</div> <!-- End Homepage Slider -->
