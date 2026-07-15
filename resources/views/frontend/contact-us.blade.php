@extends('layouts.frontend.master')

@section('content')
<div class="construction-content-area">
    <div class="container">
        <div class="row">
            <!-- Address -->
            <div class="col-md-4 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                <div class="contact-info-left">
                    <address>
                        <strong>Our Address</strong>
                        <i class="fa fa fa-map-marker"></i> &nbsp; {{$setting->addresses[0] ?? ''}}<br><br>

                        <p><strong>Factory </strong></p>
                        <i class="fa fa fa-map-marker"></i> &nbsp; {{$setting->addresses[1] ?? ''}}<br><br>

                        <strong>Call Us</strong>
                        @php
                        $phones = is_array($setting->phones) ? $setting->phones : json_decode($setting->phones, true);
                        @endphp
                        @if(is_array($phones))
                        <i class="fa fa fa-phone"></i> &nbsp; {{ implode(', ', $phones) }}<br>
                        @else
                        <i class="fa fa fa-phone"></i> &nbsp; {!! $setting->phones !!}<br>
                        @endif
                        <br>

                        <strong>Email</strong>
                        @php
                        $emails = is_array($setting->emails) ? $setting->emails : json_decode($setting->emails, true);
                        @endphp
                        @if(is_array($emails))
                        <i class="fa fa fa-envelope"></i> &nbsp; <a href="#">{{ implode(', ', $emails) }}</a><br>
                        @else
                        <i class="fa fa fa-envelope"></i> &nbsp; <a href="#">{!! $setting->emails !!}</a><br>
                        @endif

                        <strong><i class="fa fa fa-globe"> &nbsp; </i><a href="{{$setting->url}}">{{$setting->url}}</a></strong>
                    </address>
                </div>
            </div>
            <!-- End Address -->

            <!-- Contact Form -->
            <div class="col-md-8 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                <div class="contact-form-area">
                    <h3>Fill in the form below and we'll get back in touch:</h3>

                    <div id="alert-box"></div>

                    <form id="contactForm">
                        @csrf
                        <div id="contatc_form">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>
                                        <input type="text" name="name" id="contact_name"
                                               class="wpcf7-form-control wpcf7-text" placeholder="Name:" value="">
                                        <span class="error-msg" id="err-name"></span>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        <input type="email" name="email" id="contact_email"
                                               class="wpcf7-form-control wpcf7-text" placeholder="Email:" value="">
                                        <span class="error-msg" id="err-email"></span>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>
                                        <input type="text" name="subject" id="contact_subject"
                                               class="wpcf7-form-control wpcf7-text" placeholder="Subject:" value="">
                                        <span class="error-msg" id="err-subject"></span>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        <input type="tel" name="phone" id="contact_phone"
                                               class="wpcf7-form-control wpcf7-text" placeholder="Phone:" value="">
                                        <span class="error-msg" id="err-phone"></span>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p>
                                        <textarea name="message" id="contact_message" cols="40" rows="10"
                                                  class="wpcf7-form-control wpcf7-textarea" placeholder="Message:"></textarea>
                                        <span class="error-msg" id="err-message"></span>
                                    </p>
                                </div>
                                <div class="col-md-12">
                                    <p>
                                        <button type="submit" id="submitBtn"
                                                class="wpcf7-form-control wpcf7-submit has-spinner send-btn">
                                            SEND
                                        </button>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Contact Form -->
        </div>

        <div class="row">
            <div class="col-md-12 wow fadeLeft animated" style="visibility: visible;">
                <h4></h4><br><br>
                {!! $setting->map !!}
            </div>
        </div>
    </div>
</div>

<style>
    .error-msg {
        display: block;
        color: #dc3545;
        font-size: 13px;
        margin-top: 4px;
    }
    .input-error {
        border: 1px solid #dc3545 !important;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        document.getElementById('contactForm').addEventListener('submit', function (e) {
            e.preventDefault();

            // Clear previous errors & input highlights
            document.querySelectorAll('.error-msg').forEach(el => el.textContent = '');
            document.querySelectorAll('.input-error').forEach(el => el.classList.remove('input-error'));
            document.getElementById('alert-box').innerHTML = '';

            const btn = document.getElementById('submitBtn');
            btn.disabled = true;
            btn.textContent = 'Sending...';

            const formData = new FormData(this);
            const token = document.querySelector('input[name="_token"]').value;

            fetch('{{ route("send-message") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token,
                    'Accept': 'application/json',
                },
                body: formData
            })
                .then(function(res) {
                    // Parse JSON and pass status along together
                    return res.json().then(function(data) {
                        return { status: res.status, data: data };
                    });
                })
                .then(function(response) {
                    if (response.status === 200 && response.data.success) {
                        // Success
                        document.getElementById('alert-box').innerHTML =
                            '<div style="padding:10px 15px; background:#d4edda; color:#155724; border:1px solid #c3e6cb; border-radius:4px; margin-bottom:15px;">'
                            + response.data.message +
                            '</div>';
                        document.getElementById('contactForm').reset();

                    } else if (response.status === 422 && response.data.errors) {
                        // Validation errors — show red messages under each field
                        const errors = response.data.errors;

                        if (errors.name) {
                            document.getElementById('err-name').textContent = errors.name[0];
                            document.getElementById('contact_name').classList.add('input-error');
                        }
                        if (errors.email) {
                            document.getElementById('err-email').textContent = errors.email[0];
                            document.getElementById('contact_email').classList.add('input-error');
                        }
                        if (errors.subject) {
                            document.getElementById('err-subject').textContent = errors.subject[0];
                            document.getElementById('contact_subject').classList.add('input-error');
                        }
                        if (errors.phone) {
                            document.getElementById('err-phone').textContent = errors.phone[0];
                            document.getElementById('contact_phone').classList.add('input-error');
                        }
                        if (errors.message) {
                            document.getElementById('err-message').textContent = errors.message[0];
                            document.getElementById('contact_message').classList.add('input-error');
                        }

                    } else {
                        document.getElementById('alert-box').innerHTML =
                            '<div style="padding:10px 15px; background:#f8d7da; color:#721c24; border:1px solid #f5c6cb; border-radius:4px; margin-bottom:15px;">Something went wrong. Please try again.</div>';
                    }
                })
                .catch(function() {
                    document.getElementById('alert-box').innerHTML =
                        '<div style="padding:10px 15px; background:#f8d7da; color:#721c24; border:1px solid #f5c6cb; border-radius:4px; margin-bottom:15px;">Network error. Please check your connection.</div>';
                })
                .finally(function() {
                    btn.disabled = false;
                    btn.textContent = 'SEND';
                });
        });

    });
</script>

@endsection
