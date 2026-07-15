@extends('layouts.frontend.master')

@section('content')
<div class="construction-content-area singlepage">
    <div class="container">
        <div class="row">
            <div class="col-md-9 wow fadeInUp wbg" style="visibility: visible; animation-name: fadeInUp;">
                <!-- Blog Item -->
                <div class="">
                    <div class="single-blog-inner-content">
                        <img width="2500" height="500" src="{{asset($blog->image)}}" class="spimg wp-post-image" alt="" decoding="async" fetchpriority="high" srcset="{{asset($blog->image)}} 2500w, {{asset($blog->image)}} 300w, {{asset($blog->image)}} 1024w, {{asset($blog->image)}} 768w, {{asset($blog->image)}} 1536w, {{asset($blog->image)}} 2048w" sizes="(max-width: 2500px) 100vw, 2500px">                                <h3>Prefabricated Company in Bangladesh</h3>
                        <span class="date-info"><i class="fa fa-calendar"></i> {{ \Carbon\Carbon::parse($blog->createdTime)->format('F d, Y') }}</span>


                        <h2 class="wp-block-heading">{{$blog->title}}</h2>


                        {!! $blog->description !!}
                    </div>



                </div> <!-- End Blog Item -->

                <div class="row">
                    <div class="col-md-12">
                        <!-- Comments Area -->
                        <div class="comments-area wow fadeInUp" style="visibility: hidden; animation-name: none;">
                        </div> <!-- End Comments Area -->
                    </div>
                </div>

            </div>

            <div class="col-md-3 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                <div class="blog-serch-form">
                    <input type="text" placeholder="Search here.....">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </div>
                <div class="widget recent_posts">
                    <h3 class="widget-title">Recent News</h3>
                    <ul>

                        @foreach($blogs as $blog)
                        <li>
                            <a href="{{route('blog.details',$blog->slug)}}">{{$blog->title}} <span>{{ \Carbon\Carbon::parse($blog->createdTime)->format('F d, Y') }}</span></a>
                        </li>
                        @endforeach


                    </ul>
                </div>



            </div>

        </div>
    </div>
</div>
@endsection
