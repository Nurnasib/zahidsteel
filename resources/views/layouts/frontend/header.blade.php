
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
                        <ul id="navigation" class="">
                            @foreach($navMenus as $menu)
                                @php $isActive = $menu->isCurrent() || $menu->navChildren->contains(fn ($c) => $c->isCurrent()); @endphp
                                <li class="menu-item {{ $menu->navChildren->isNotEmpty() ? 'menu-item-has-children' : '' }} {{ $isActive ? 'current-menu-item active' : '' }}">
                                    <a href="{{ $menu->link }}" data-ps2id-api="true" @if($menu->new_tab) target="_blank" rel="noopener noreferrer" @endif>{{ $menu->title }}</a>
                                    @if($menu->navChildren->isNotEmpty())
                                        <ul class="sub-menu">
                                            @foreach($menu->navChildren as $child)
                                                <li class="menu-item">
                                                    <a href="{{ $child->link }}" data-ps2id-api="true" @if($child->new_tab) target="_blank" rel="noopener noreferrer" @endif>{{ $child->title }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
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
