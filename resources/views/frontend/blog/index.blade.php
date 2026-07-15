@extends('layouts.frontend.master')

@section('content')
<div class="construction-content-area">
    <div class="container">
        <div class="row">
            <div class="col-md-9 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                <!-- Blog Items -->
                <div class="blog-items">

                  @foreach($blogList as $data)
                    <div class="single-blog-item">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="single-blog-image-preview fms"><img width="2500" height="500" src="{{asset($data->image)}}" class="wp-post-image wp-post-image" alt="" decoding="async" loading="lazy" srcset="{{asset($data->image)}} 2500w, {{asset($data->image)}} 300w, {{asset($data->image)}} 1024w, {{asset($data->image)}} 768w, {{asset($data->image)}} 1536w, {{asset($data->image)}} 2048w" sizes="auto, (max-width: 2500px) 100vw, 2500px"></div>
                            </div>
                            <div class="col-md-7">
                                <div class="single-blog-info">
                                    <h2>{{$data->title}}</h2>
                                    <span class="date-info"><i class="fa fa-calendar"></i> {{ \Carbon\Carbon::parse($data->createdTime)->format('F d, Y') }}</span>
                                    <p>I{{$data->short_description}}...</p>
                                    <a class="blog-readmore-btn" href="{{route('blog.details',$data->slug)}}">Read more →</a>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach







                </div>
                <!-- End Blog Items -->
                <div class="row">
                    <!-- Pagination -->
                    <div class="col-md-9 text-center">

                    </div> <!-- End Pagination -->
                </div>
            </div>

            <!-- Blog Widget Sidebar -->
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
