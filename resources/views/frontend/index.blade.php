@extends('layouts.frontend.master')

@section('content')
<!-- Homepage Slider -->
@include('frontend.partial.hero')
<div class="cl_section">

    <div class="container lsn">
        <div class="section-title">
            <h2>Our Valuable Clients</h2>
        </div>

        <div class="container">
            <div class="customer-logos">
@foreach($clients as $client)
                @php
                $image = is_string($client->image) ? json_decode($client->image, true) : $client->image;
                $imgSrc = $image['medium'] ?? $image['original'] ?? $image['small'] ?? null;
                @endphp
                <div class="slide"><img src="{{ asset($imgSrc) }}" alt="{{$client->title}}"></div>
@endforeach

            </div>
        </div>

    </div>

</div>


<div class="construction-content-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-5">

                <div class="project-info wow fadeInUp jf">
                    <div data-elementor-type="wp-page" data-elementor-id="1096" class="elementor elementor-1096">
                        <section class="elementor-section elementor-top-section elementor-element elementor-element-7f91b78 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="7f91b78" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                            <div class="elementor-container elementor-column-gap-default">
                                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-fed9642" data-id="fed9642" data-element_type="column">
                                    <div class="elementor-widget-wrap elementor-element-populated">
                                        <div class="elementor-element elementor-element-c36e933 elementor-widget elementor-widget-heading" data-id="c36e933" data-element_type="widget" data-widget_type="heading.default">
                                            <div class="elementor-widget-container">
                                                <h2 class="elementor-heading-title elementor-size-default">Steel Building Manufacturing Company in Bangladesh</h2>		</div>
                                        </div>
                                        <div class="elementor-element elementor-element-3225553 elementor-widget elementor-widget-text-editor" data-id="3225553" data-element_type="widget" data-widget_type="text-editor.default">
                                            <div class="elementor-widget-container">
                                                <p>About steel structure building in Bangladesh, Zahid Steel Structure Ltd. is one of the pioneers and steel building manufacturing company in Bangladesh. Zahid Steel Structure Ltd. delighted to introduce oneself as one of the organizations who provide total steel structure solution for corporate and retail business models. Steel structure building in Bangladesh is increasing and its high time to give a professional touch. By providing the best materials and enthusiastic steel building company in Bangladesh Zahid Steel Structure Ltd. earn its reputation. We started with the idea of Quality, reliability, and vision for steel structure homes that can change the perspective what we think about steel structure company in Bangladesh. steel structure company in Bangladesh still growing strong in national and international market Zahid steel structure Ltd. defines the ultimate solution for your next investment. By providing unmatched exigency and professional management we standby code of quality and positive future engagement of our business steel construction engineering.</p><p><div class="bg-margin-for-link"><input type='hidden' bg_collapse_expand='6a23bc6b8c0cf0023728163' value='6a23bc6b8c0cf0023728163'><input type='hidden' id='bg-show-more-text-6a23bc6b8c0cf0023728163' value='Show More'><input type='hidden' id='bg-show-less-text-6a23bc6b8c0cf0023728163' value='Show Less'><a id='bg-showmore-action-6a23bc6b8c0cf0023728163' class='bg-showmore-plg-link bg-arrow '  style=" color:#4a4949;;" href='#'>Show More</a><div id='bg-showmore-hidden-6a23bc6b8c0cf0023728163' ></p><p>Zahid Steel Structure Ltd. serves to residential projects to factory projects and we made the amazing trust in steel structure companies in Dhaka. Your workplace or residence is the place where you going to spend most of your time and you deserve a steel building fabrication company in Bangladesh. If it doesn&apos;t put a smile on your face then it can&apos;t be the place you will make your business next move. We steel structure building in Bangladesh provides various kinds of design and comfort which is essential for every business and home. that&apos;s why the Steel structure companies in Dhaka rising day by day. We take the prefabricated company in Bangladesh and steel construction engineering very effectively, our professional designer and engineers provide the best possible solution for your dream project. The company steel structure building in Bangladesh serves the following field of industrial and residential structure: Textiles, spinning mill, composite mills, Warehouse, Garments factory, shoe factory, All kind of manufacturing firms, hospitals, aircraft hangers, residential building, luxury duplex villas, etc. Every steel building company in Bangladesh has a completely unique and independent construction process. Steel structure building in Bangladesh is committed to serving with unmatched quality.</p><p></div></div></p>						</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class="elementor-section elementor-top-section elementor-element elementor-element-3ebef84f elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="3ebef84f" data-element_type="section">
                            <div class="elementor-container elementor-column-gap-no">
                                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-449024f3" data-id="449024f3" data-element_type="column">
                                    <div class="elementor-widget-wrap elementor-element-populated">
                                        <div class="elementor-element elementor-element-73478195 elementor-widget elementor-widget-heading" data-id="73478195" data-element_type="widget" data-widget_type="heading.default">
                                            <div class="elementor-widget-container">
                                                <h2 class="elementor-heading-title elementor-size-default">Services & Solutions</h2>		</div>
                                        </div>
                                        <div class="elementor-element elementor-element-fc8ec95 elementor-widget-divider--view-line elementor-widget elementor-widget-divider" data-id="fc8ec95" data-element_type="widget" data-widget_type="divider.default">
                                            <div class="elementor-widget-container">
                                                <div class="elementor-divider">
			<span class="elementor-divider-separator">
						</span>
                                                </div>
                                            </div>
                                        </div>
                                        <section class="elementor-section elementor-inner-section elementor-element elementor-element-55df7ff0 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="55df7ff0" data-element_type="section">
                                            <div class="elementor-container elementor-column-gap-default">
                                                <div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-4b0c262c" data-id="4b0c262c" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                    <div class="elementor-widget-wrap elementor-element-populated">
                                                        <div class="elementor-element elementor-element-6865ae40 elementor-view-stacked elementor-shape-circle elementor-position-top elementor-mobile-position-top elementor-widget elementor-widget-icon-box" data-id="6865ae40" data-element_type="widget" data-widget_type="icon-box.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="elementor-icon-box-wrapper">
                                                                    <div class="elementor-icon-box-icon">
				<span class="elementor-icon elementor-animation-grow" >
				<i aria-hidden="true" class="far fa-building"></i>				</span>
                                                                    </div>
                                                                    <div class="elementor-icon-box-content">
                                                                        <h3 class="elementor-icon-box-title">
					<span  >
						Design					</span>
                                                                        </h3>
                                                                        <p class="elementor-icon-box-description">
                                                                            We have a remarkable structural design team having been skilled, experienced and competently qualified					</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-adab579" data-id="adab579" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                    <div class="elementor-widget-wrap elementor-element-populated">
                                                        <div class="elementor-element elementor-element-e0342c4 elementor-view-stacked elementor-shape-circle elementor-position-top elementor-mobile-position-top elementor-widget elementor-widget-icon-box" data-id="e0342c4" data-element_type="widget" data-widget_type="icon-box.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="elementor-icon-box-wrapper">
                                                                    <div class="elementor-icon-box-icon">
				<span class="elementor-icon elementor-animation-grow" >
				<i aria-hidden="true" class="fas fa-cogs"></i>				</span>
                                                                    </div>
                                                                    <div class="elementor-icon-box-content">
                                                                        <h3 class="elementor-icon-box-title">
					<span  >
						Maintenance					</span>
                                                                        </h3>
                                                                        <p class="elementor-icon-box-description">
                                                                            Zahid Steel Structure Ltd. having been well equipped with modern machinery along with expert engineer and					</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-ce44b1b" data-id="ce44b1b" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                    <div class="elementor-widget-wrap elementor-element-populated">
                                                        <div class="elementor-element elementor-element-846af5b elementor-view-stacked elementor-shape-circle elementor-position-top elementor-mobile-position-top elementor-widget elementor-widget-icon-box" data-id="846af5b" data-element_type="widget" data-widget_type="icon-box.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="elementor-icon-box-wrapper">
                                                                    <div class="elementor-icon-box-icon">
				<span class="elementor-icon elementor-animation-grow" >
				<i aria-hidden="true" class="fas fa-users-cog"></i>				</span>
                                                                    </div>
                                                                    <div class="elementor-icon-box-content">
                                                                        <h3 class="elementor-icon-box-title">
					<span  >
						Erection					</span>
                                                                        </h3>
                                                                        <p class="elementor-icon-box-description">
                                                                            Zahid Steel Structure Ltd. has a strong team of engineers who are responsible for erection of					</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-33a8035" data-id="33a8035" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                    <div class="elementor-widget-wrap elementor-element-populated">
                                                        <div class="elementor-element elementor-element-81c4f61 elementor-view-stacked elementor-shape-circle elementor-position-top elementor-mobile-position-top elementor-widget elementor-widget-icon-box" data-id="81c4f61" data-element_type="widget" data-widget_type="icon-box.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="elementor-icon-box-wrapper">
                                                                    <div class="elementor-icon-box-icon">
				<span class="elementor-icon elementor-animation-grow" >
				<i aria-hidden="true" class="fas fa-baby-carriage"></i>				</span>
                                                                    </div>
                                                                    <div class="elementor-icon-box-content">
                                                                        <h3 class="elementor-icon-box-title">
					<span  >
						Delivery					</span>
                                                                        </h3>
                                                                        <p class="elementor-icon-box-description">
                                                                            Delivery is the process of transporting goods from a source location to a predefined destination					</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </section>
@include('frontend.partial.blog')

                    </div>
                </div>
            </div>

        </div>
    </div>
</div> <!-- End Done & Dusted Area -->



@endsection

