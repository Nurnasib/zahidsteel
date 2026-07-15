<footer class="site-footer">
    <div class="mfo">
        <div class="container">
            <div class="fwd qq">
                <h4>Quick Query</h4>

                <div class="wpcf7 no-js" id="wpcf7-f4903-o1" lang="en-US" dir="ltr">
                    <div class="screen-reader-response"><p role="status" aria-live="polite" aria-atomic="true"></p> <ul></ul></div>
                    <form action="#" method="post" class="wpcf7-form init" aria-label="Contact form" novalidate="novalidate" data-status="init">
                        <div style="display: none;">
                            <input type="hidden" name="_wpcf7" value="4903" />
                            <input type="hidden" name="_wpcf7_version" value="5.8.5" />
                            <input type="hidden" name="_wpcf7_locale" value="en_US" />
                            <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f4903-o1" />
                            <input type="hidden" name="_wpcf7_container_post" value="0" />
                            <input type="hidden" name="_wpcf7_posted_data_hash" value="" />
                        </div>
                        <p><span class="wpcf7-form-control-wrap" data-name="text-10"><input size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required quickquery" aria-required="true" aria-invalid="false" placeholder="Name" value="" type="text" name="text-10" /></span>
                        </p>
                        <p><span class="wpcf7-form-control-wrap" data-name="email-936"><input size="40" class="wpcf7-form-control wpcf7-email wpcf7-validates-as-required wpcf7-text wpcf7-validates-as-email quickquery" aria-required="true" aria-invalid="false" placeholder="Email" value="" type="email" name="email-936" /></span>
                        </p>
                        <p><span class="wpcf7-form-control-wrap" data-name="tel-466"><input size="40" class="wpcf7-form-control wpcf7-tel wpcf7-validates-as-required wpcf7-text wpcf7-validates-as-tel tel1" aria-required="true" aria-invalid="false" placeholder="Phone No." value="" type="tel" name="tel-466" /></span>
                        </p>
                        <p><span class="wpcf7-form-control-wrap" data-name="textarea-112"><textarea cols="40" rows="5" class="wpcf7-form-control wpcf7-textarea quickquery" aria-invalid="false" placeholder="Message" name="textarea-112"></textarea></span>
                        </p>
                        <p><input class="wpcf7-form-control wpcf7-submit has-spinner sub" type="submit" value="Send" />
                        </p><div class="wpcf7-response-output" aria-hidden="true"></div>
                    </form>
                </div>
            </div>
            <div class="fwd nev-widget">

                <div class="footer-widget"><h4 class="widget-title">Quick Links</h4><div class="menu-quick-links-container"><ul id="menu-quick-links" class="menu"><li id="menu-item-4905" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4905"><a href="{{route('about-us')}}" data-ps2id-api="true">About Us</a></li>
                    <li id="menu-item-4906" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4906"><a href="{{route('gallery')}}" data-ps2id-api="true">Gallery</a></li>
                    <li id="menu-item-4914" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4914"><a href="{{route('blog.index')}}" data-ps2id-api="true">Blog</a></li>

                    <li id="menu-item-4908" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4908"><a href="{{route('contact-us')}}" data-ps2id-api="true">Contact us</a></li>
                </ul></div></div>
            </div>
            <div class="fwd address-widget">
                <div class="footer-widget"><h4 class="widget-title">Address</h4>			<div class="textwidget">
                    <p><strong>Corporate Office </strong></p>
                    <p>{{$setting->addresses[0] ?? ''}}</p>
                    <p><strong>Factory </strong></p>
                    <p>{{$setting->addresses[1] ?? ''}}</p>
                    <p><strong>Phone</strong><br />
                       <p>  @php
                        $phones = is_array($setting->phones)
                        ? $setting->phones
                        : json_decode($setting->phones, true);
                        @endphp

                        @if(is_array($phones))
                        {{ implode(', ', $phones) }}
                        @else
                        {!! $setting->phones !!}
                        @endif</p>
                    <p><strong>Email</strong></p>
                    <p> @php
                        $emails = is_array($setting->emails)
                        ? $setting->emails
                        : json_decode($setting->emails, true);
                        @endphp

                        @if(is_array($emails))
                        {{ implode(', ', $emails) }}
                        @else
                        {!! $setting->emails !!}
                        @endif</p>
                </div>
                </div>
            </div>

        </div>
        <div class="style_copy">{{$setting->site_name}} © {{ date('Y') }} All Rights Reserved. </div>
    </div>
    <!-- Floating Social Icons -->
    <!-- Floating Social Icons -->
    <div class="floating-social-icons">
        <a href="{{ $setting->fb ?? '#' }}" target="_blank" class="fsi-btn fsi-facebook" title="Visit our Facebook page">
            <i class="fab fa-facebook-f"></i>
        </a>
        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '','+8801713-355637') }}" target="_blank" class="fsi-btn fsi-whatsapp" title="Chat on WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>
        <a href="{{$setting->youtube}}" target="_blank" class="fsi-btn fsi-youtube" title="Visit our YouTube channel">
            <i class="fab fa-youtube"></i>
        </a>
        <a href="{{ $setting->linkdi ?? '#' }}" target="_blank" class="fsi-btn fsi-linkedin" title="Visit our LinkedIn page">
            <i class="fab fa-linkedin-in"></i>
        </a>

    </div>

    <style>
        .floating-social-icons {
            position: fixed;
            bottom: 30px;
            right: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            z-index: 9999;
        }
        .fsi-btn {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 20px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.2);
            transition: transform 0.2s ease;
        }
        .fsi-btn:hover {
            transform: scale(1.1);
            color: #fff;
        }
        .fsi-facebook  { background: #1877f2; }
        .fsi-whatsapp  { background: #25d366; }
        .fsi-youtube   { background: #ff0000; }
        .fsi-linkedin  { background: #0a66c2; }
        .fsi-call      { background: #29b6f6; }
        .fsi-chat      { background: #2c2c2c; }

        @media (max-width: 768px) {
            .floating-social-icons { bottom: 15px; right: 12px; }
            .fsi-btn { width: 40px; height: 40px; font-size: 17px; }
        }
    </style>
</footer> <!-- End Footer Area -->
