<section class="elementor-section elementor-top-section elementor-element elementor-element-99db747 elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="99db747" data-element_type="section">
    <div class="elementor-container elementor-column-gap-no">
        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-d682528" data-id="d682528" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-34a77ef elementor-widget elementor-widget-heading" data-id="34a77ef" data-element_type="widget" data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <h2 class="elementor-heading-title elementor-size-default">Recent BLOG</h2>		</div>
                </div>
                <div class="elementor-element elementor-element-b9ad2eb elementor-widget-divider--view-line elementor-widget elementor-widget-divider" data-id="b9ad2eb" data-element_type="widget" data-widget_type="divider.default">
                    <div class="elementor-widget-container">
                        <div class="elementor-divider">
			<span class="elementor-divider-separator">
						</span>
                        </div>
                    </div>
                </div>
                <section class="elementor-section elementor-inner-section elementor-element elementor-element-46bd459 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="46bd459" data-element_type="section">
                    <div class="elementor-container elementor-column-gap-default">
                        @foreach($blogs as $blog)
                        <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-9553f2d" data-id="9553f2d" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-065bc11 elementor-position-top elementor-widget elementor-widget-image-box" data-id="065bc11" data-element_type="widget" data-widget_type="image-box.default">
                                    <div class="elementor-widget-container">
                                        <div class="elementor-image-box-wrapper">
                                            <figure class="elementor-image-box-img">
                                            <a href="{{route('blog.details',$blog->slug)}}"><img decoding="async" src="{{asset($blog->image)}}" title="{{$blog->title}}" alt="{{$blog->title}}" loading="lazy" /></a></figure><div class="elementor-image-box-content"><h3 class="elementor-image-box-title">
                                            <a href="{{route('blog.details',$blog->slug)}}">
                                                <h2 style="font-family: Roboto, sans-serif; font-weight: 600; color: rgb(51, 51, 51); margin: 0px 0px 5px; font-size: 18px; text-transform: uppercase; text-align: start; white-space: normal;">
                                                    {{$blog->title}}</h2></a>
                                        </h3>
                                            <p class="elementor-image-box-description"><span style="display: block; margin: 0px 0px 8px; text-align: start; white-space: normal;"><span style="color: rgb(51, 51, 51); font-family: var( --e-global-typography-text-font-family ), Sans-serif; font-size: 15px; font-weight: var( --e-global-typography-text-font-weight );">
                                               {{$blog->short_description}}...</span><br><span></span></span><span style="display: block; margin: 0px 0px 8px; text-align: start; white-space: normal;">
                                                <span style="color: var( --e-global-color-text ); font-family: var( --e-global-typography-text-font-family ), Sans-serif; font-weight: var( --e-global-typography-text-font-weight ); white-space: pre-wrap; text-align: center;"></span></span></p>
                                        </div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                </section>
            </div>
        </div>
    </div>
</section>
