
<div id="header" class=" fadeIn animated" >

    <style>
        @media screen and (max-width: 1000px) {
            .selogo {
                display: none;
            }
        }
    </style>
    <!-- Top Header -->
    <div class="header-top-area wow">
        <div class="container">
            <div class="row">

                <div class="col-md-9">

                    <a href="#">
                        <i class="fa fa-clock"></i> Mon - Sat : 8.00 - 6.00
                    </a> <span class="seprator">|</span>

                    <a href="#"><i class="fa fa-envelope"></i> {{$setting->emails[0]}}</a>

                </div>
                <div class="col-md-3 text-right">
                    <div class="social-icon">
                        Follow Us:
                        <a href="{{$setting->fb}}"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '','+8801713-355637') }}" target="_blank"  title="Chat on WhatsApp">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="{{$setting->twitter}}"><i class="fab fa-twitter"></i></a>
                        <a href="{{$setting->youtube}}"><i class="fab fa-youtube"></i></a>
                        <a href="{{$setting->linkdi}}"><i class="fab fa-linkedin-in"></i></a>

                    </div>
                </div>
                <!--                <div class="mselogo">-->
                <!--                    <a href="#" class="sbma"><img src="wp-content/uploads/2020/10/Asset-1sbma.png" alt="sbma"></a>-->
                <!--                    <a href="#" class="isos"><img src="wp-content/uploads/2020/04/ISO9001-2015.png" alt="ISO"></a>-->
                <!--                    <a href="#" class="uni"><img src="wp-content/uploads/2020/04/UNi-CERT-Logo-01.png" alt="UNI CERT"></a>-->

                <!--                </div>-->
            </div>
        </div>
    </div> <!-- End Top Header -->

    <!-- Main Menu -->
    <div class="mainmenu-area">
        <div class="container">
            <div class="row" style="position: relative;">
                <div class="col-md-2">
                    <div class="logo">
                        <a href="/">
                            <img src="{{asset($setting->logo)}}" alt="Logo" height="60px">
                        </a>
                    </div>
                    <div class="responsive-menu-wrap"></div>
                </div>
                <div class="col-md-10">
                    <!-- 					<i class="fa fa-bars"></i> -->
                    <div class="mainmenu">
                        <ul id="navigation" class=""><li id="menu-item-1335" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-1096 current_page_item menu-item-1335 active "><a href="/" aria-current="page" data-ps2id-api="true">Home</a></li>
                            <li id="menu-item-3168" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-3168"><a href="{{route('about-us')}}" data-ps2id-api="true">About Us</a>
                                <ul class="sub-menu">
                                    <li id="menu-item-3130" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3130"><a href="{{route('about-us')}}#s1" data-ps2id-api="true">Company Profile</a></li>
                                    <li id="menu-item-3132" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3132"><a href="{{route('about-us')}}#s3" data-ps2id-api="true">Our History </a></li>
                                    <li id="menu-item-3155" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3155"><a href="{{route('about-us')}}#s2" data-ps2id-api="true">Our Mission &#038; Vision</a></li>

                                    <li id="menu-item-3170" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3170"><a href="{{route('about-us')}}#s4" data-ps2id-api="true">	Why Choose Us </a></li>
                                    <li id="menu-item-4118" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-4118"><a href="{{route('about-us')}}#s5" data-ps2id-api="true">	Quality Policy </a></li>
                                    <li id="menu-item-3412" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3412"><a href="{{route('about-us')}}#s7" data-ps2id-api="true">	Factory & Facilities </a></li>
                                    <li id="menu-item-7085" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7085"><a href="{{route('client.list')}}" data-ps2id-api="true">Certifications </a></li>


                                </ul>
                            </li>

                            <li id="menu-item-3062" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-3062"><a href="{{ route('services.design') }}" data-ps2id-api="true">Services</a>
                                <ul class="sub-menu">
                                    <li id="menu-item-3404" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3404"><a href="{{ route('services.design') }}">Design</a></li>
                                    <li id="menu-item-3405" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3405"><a href="{{ route('services.erection') }}">Erection</a></li>
                                    <li id="menu-item-3406" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3406"><a href="{{ route('services.fabrication') }}">Fabrication </a></li>
                                    <li id="menu-item-3406" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3406"><a href="{{ route('services.supply') }}"> Supply</a></li>
                                </ul>
                            </li>
                            <li id="menu-item-3062" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-3062"><a href="{{ route('products.show', 'steel-structure') }}" data-ps2id-api="true">Products</a>
                                <ul class="sub-menu">
                                    <li id="menu-item-3404" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3404">
                                        <a href="https://industrialrackbd.com/guardrail/" target="_blank" rel="noopener noreferrer">
                                            Highway Guard Rail Systems
                                        </a>
                                    </li>
                                    <li id="menu-item-3405" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3405"><a href="{{ route('products.show', 'steel-structure') }}">Steel Structures</a></li>
                                    <li id="menu-item-3406" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3406"><a href="{{ route('products.show', 'road-safety') }}">Road Safety Products</a></li>
                                    <li id="menu-item-3406" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3406"><a href="{{ route('products.show', 'custom-fabrication') }}">Custom Fabrication</a></li>
                                    <li id="menu-item-3406" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3406"><a href="https://industrialrackbd.com" data-ps2id-api="true">		Industrial Rack </a></li>
                                    <li id="menu-item-3406" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3406"><a href="https://industrialrackbd.com/industrial-furniture/" target="_blank" rel="noopener noreferrer"> 	Industrial Furniture</a></li>
                                </ul>
                            </li>
                            <li id="menu-item-7061" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-7061"><a href="{{route('complete-project')}}" data-ps2id-api="true">Our Projects</a>
                                <ul class="sub-menu">
                                    <li id="menu-item-7083" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7083"><a href="{{route('running-project')}}" data-ps2id-api="true">Running Projects</a></li>
                                    <li id="menu-item-7062" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7062"><a href="{{route('complete-project')}}" data-ps2id-api="true">Completed Projects</a></li>
                                </ul>
                            </li>
                            <li id="menu-item-7061" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-7061"><a href="{{route('complete-project')}}" data-ps2id-api="true">	Manufacturing </a>
                                <ul class="sub-menu">
                                    <li id="menu-item-7083" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7083"><a href="{{route('running-project')}}" data-ps2id-api="true">	Production Process </a></li>
                                    <li id="menu-item-7062" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7062"><a href="{{route('complete-project')}}" data-ps2id-api="true">Quality Control </a></li>
                                </ul>
                            </li>
                            <li id="menu-item-3057" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3057"><a href="{{route('gallery')}}" data-ps2id-api="true">	Clients</a></li>
                            <li id="menu-item-7061" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-7061"><a href="{{route('complete-project')}}" data-ps2id-api="true">	Gallery </a>
                                <ul class="sub-menu">
                                    <li id="menu-item-7083" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7083"><a href="{{route('running-project')}}" data-ps2id-api="true">		Photo Gallery  </a></li>
                                    <li id="menu-item-7062" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7062"><a href="{{route('complete-project')}}" data-ps2id-api="true">	Video Gallery  </a></li>
                                </ul>
                            </li>

                            <!--                            <li id="menu-item-3057" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3057"><a href="{{route('gallery')}}" data-ps2id-api="true">Gallery</a></li>-->

                            <li id="menu-item-3056" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3056"><a href="{{route('blog.index')}}" data-ps2id-api="true">	News & Events</a></li>
                            <li id="menu-item-7606" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7606"><a href="media-coverage/index.html" data-ps2id-api="true">	Careers </a></li>
                            <li id="menu-item-3060" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3060"><a href="{{route('contact-us')}}" data-ps2id-api="true">Contact us</a></li>
                        </ul>                    </div>


                </div>

                <!--                <div class="col-md-2 selogo d-none d-lg-flex " >-->
                <!--                   <div style="display: flex;align-items: center;-->
                <!--    gap: 10px">-->
                <!--                       <a href="tel:{{$setting->phones[0]}}"-->
                <!--                          style="display: flex; justify-content: center; align-items: center;-->
                <!--          width: 40px; height: 40px; border-radius: 50%; background: #603A47; color:#fff">-->
                <!--                           <i class="fa fa-phone"></i>-->
                <!--                       </a>-->
                <!--                       <div style="gap:2px">-->
                <!--                           <div>Call Anytime</div>-->
                <!--                           <div>-->
                <!--                               {{$setting->phones[0]}}</div>-->
                <!--                       </div>-->
                <!--                   </div>-->
                <!--                </div>-->
            </div>
        </div>
    </div> <!-- End Main Menu -->
</div>
