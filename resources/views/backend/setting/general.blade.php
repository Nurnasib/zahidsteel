@extends('layouts.backend.master')
@section('admin')
    <div class="content">
        <div class="content-header">
            <div class="leftside-content-header">
                <ul class="breadcrumbs">
                    <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">{{ $dashboard }}</a></li>
                    <li><a>{{ $subTitle }}</a></li>
                </ul>
            </div>
        </div>

        <div class="panel">
            <form id="myForm" method="POST"
                  action="{{ route('admin.generalSetting.add.update.info') }}"
                  enctype="multipart/form-data">
                @csrf
                <div class="panel-content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel-content">

                                {{-- Site Name --}}
                                <div class="form-group">
                                    <label for="site_name" class="control-label">Site Name</label>
                                    <input type="text" class="form-control" id="site_name" name="site_name"
                                           value="{{ $dataInfo->site_name ?? '' }}">
                                </div>

                                {{-- Logo --}}
                                <div class="form-group">
                                    <label for="logo" class="control-label">Site Logo</label>
                                    <div class="mb-2">
                                        <img id="logo-preview"
                                             src="{{ $dataInfo && $dataInfo->logo ? asset($dataInfo->logo) : 'https://via.placeholder.com/150x60?text=Logo' }}"
                                             alt="Logo Preview" style="max-height: 60px;">
                                    </div>
                                    <input type="file" class="form-control" id="logo" name="logo" accept="image/*"
                                           onchange="previewImage(event, 'logo-preview')">
                                </div>

                                {{-- White BG Logo --}}
                                <div class="form-group">
                                    <label for="whitebglogo" class="control-label">Organogram</label>
                                    <div class="mb-2">
                                        <img id="whitebglogo-preview"
                                             src="{{ $dataInfo && $dataInfo->whitebglogo ? asset($dataInfo->whitebglogo) : 'https://via.placeholder.com/150x60?text=Logo' }}"
                                             alt="White BG Logo Preview" style="max-height: 60px;">
                                    </div>
                                    <input type="file" class="form-control" id="whitebglogo" name="whitebglogo" accept="image/*"
                                           onchange="previewImage(event, 'whitebglogo-preview')">
                                </div>

                                {{-- Favicon --}}
                                <div class="form-group">
                                    <label for="favicon" class="control-label">Upload Favicon</label>
                                    <div class="mb-2">
                                        <img id="favicon-preview"
                                             src="{{ $dataInfo && $dataInfo->favicon ? asset($dataInfo->favicon) : 'https://via.placeholder.com/30?text=Favicon' }}"
                                             alt="Favicon Preview" style="max-height: 30px;">
                                    </div>
                                    <input type="file" class="form-control" id="favicon" name="favicon" accept="image/*"
                                           onchange="previewImage(event, 'favicon-preview')">
                                </div>
                                <div class="form-group">
                                    <label for="favicon" class="control-label">Brochure</label>

                                    <input type="file" class="form-control" id="brochure" name="brochure" accept="file/*"
                                          >
                                </div>

                                {{-- Dynamic Phones --}}
                                <div class="form-group">
                                    <label class="control-label">Phone Numbers</label>
                                    <div id="phone-wrapper">
                                        @forelse($dataInfo->phones ?? [] as $phone)
                                            <div class="input-group mb-2 contact-row">
                                                <input type="text" class="form-control" name="phones[]"
                                                       value="{{ $phone }}" placeholder="Enter phone number">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-danger remove-row">
                                                        <i class="fa fa-minus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="input-group mb-2 contact-row">
                                                <input type="text" class="form-control" name="phones[]"
                                                       placeholder="Enter phone number">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-danger remove-row">
                                                        <i class="fa fa-minus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        @endforelse
                                    </div>
                                    <button type="button" class="btn btn-success btn-sm mt-1"
                                            onclick="addRow('phone-wrapper', 'phones[]', 'text', 'phone number')">
                                        <i class="fa fa-plus"></i> Add Phone
                                    </button>
                                </div>

                                {{-- Dynamic Emails --}}
                                <div class="form-group">
                                    <label class="control-label">Email Addresses</label>
                                    <div id="email-wrapper">
                                        @forelse($dataInfo->emails ?? [] as $email)
                                            <div class="input-group mb-2 contact-row">
                                                <input type="email" class="form-control" name="emails[]"
                                                       value="{{ $email }}" placeholder="Enter email address">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-danger remove-row">
                                                        <i class="fa fa-minus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="input-group mb-2 contact-row">
                                                <input type="email" class="form-control" name="emails[]"
                                                       placeholder="Enter email address">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-danger remove-row">
                                                        <i class="fa fa-minus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        @endforelse
                                    </div>
                                    <button type="button" class="btn btn-success btn-sm mt-1"
                                            onclick="addRow('email-wrapper', 'emails[]', 'email', 'email address')">
                                        <i class="fa fa-plus"></i> Add Email
                                    </button>
                                </div>

                                {{-- Dynamic Addresses --}}
                                <div class="form-group">
                                    <label class="control-label">Addresses</label>
                                    <div id="address-wrapper">
                                        @forelse($dataInfo->addresses ?? [] as $address)
                                            <div class="input-group mb-2 contact-row">
                <textarea class="form-control" name="addresses[]"
                          rows="2" placeholder="Enter address">{{ $address }}</textarea>
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-danger remove-row">
                                                        <i class="fa fa-minus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="input-group mb-2 contact-row">
                <textarea class="form-control" name="addresses[]"
                          rows="2" placeholder="Enter address"></textarea>
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-danger remove-row">
                                                        <i class="fa fa-minus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        @endforelse
                                    </div>
                                    <button type="button" class="btn btn-success btn-sm mt-1"
                                            onclick="addRowTextarea('address-wrapper', 'addresses[]', 'address')">
                                        <i class="fa fa-plus"></i> Add Address
                                    </button>
                                </div>

                                <div class="form-group">
                                    <label for="url" class="control-label">Google Map</label>
                                    <input type="text" class="form-control" id="map" name="map"
                                           value="{{ $dataInfo->map ?? '' }}">
                                </div>
                                {{-- Website URL --}}
                                <div class="form-group">
                                    <label for="url" class="control-label">Website URL</label>
                                    <input type="url" class="form-control" id="url" name="url"
                                           value="{{ $dataInfo->url ?? '' }}">
                                </div>

                                {{-- Video URL --}}
                                <div class="form-group">
                                    <label for="videoUrl" class="control-label">Taxes Information</label>
                                    <input type="text" class="form-control" id="videoUrl" name="videoUrl"
                                           value="{{ $dataInfo->videoUrl ?? '' }}">
                                </div>

                                {{-- IOS URL --}}
                                <div class="form-group">
                                    <label for="iosUrl" class="control-label">Registration</label>
                                    <input type="text" class="form-control" id="iosUrl" name="iosUrl"
                                           value="{{ $dataInfo->iosUrl ?? '' }}">
                                </div>

                                {{-- Android URL --}}
                                <div class="form-group">
                                    <label for="androidUrl" class="control-label">Android URL</label>
                                    <input type="url" class="form-control" id="androidUrl" name="androidUrl"
                                           value="{{ $dataInfo->androidUrl ?? '' }}">
                                </div>

                                {{-- Web URL --}}
                                <div class="form-group">
                                    <label for="webUrl" class="control-label">WEB URL</label>
                                    <input type="url" class="form-control" id="webUrl" name="webUrl"
                                           value="{{ $dataInfo->webUrl ?? '' }}">
                                </div>

                                {{-- Currency --}}
                                <div class="form-group">
                                    <label for="currency" class="control-label">Currency</label>
                                    <input type="text" class="form-control" id="currency" name="currency"
                                           value="{{ $dataInfo->currency ?? '' }}">
                                </div>

                                {{-- Position --}}
                                <div class="form-group">
                                    <label for="position" class="control-label">Currency Position</label>
                                    <select class="form-select form-control" id="position" name="position">
                                        <option value="">Please select position</option>
                                        <option value="left" {{ ($dataInfo->position ?? '') == 'left' ? 'selected' : '' }}>Left</option>
                                        <option value="right" {{ ($dataInfo->position ?? '') == 'right' ? 'selected' : '' }}>Right</option>
                                    </select>
                                </div>

                                {{-- Term & Condition --}}
                                <div class="form-group">
                                    <label for="term_condition" class="control-label">Term & Condition</label>
                                    <textarea name="term_condition" class="form-control summernote">{!! old('term_condition', $dataInfo->term_condition ?? '') !!}</textarea>
                                    @error('term_condition')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Privacy Policy --}}
                                <div class="form-group">
                                    <label for="privacy_policy" class="control-label">Privacy Policy</label>
                                    <textarea name="privacy_policy" class="form-control summernote">{!! old('privacy_policy', $dataInfo->privacy_policy ?? '') !!}</textarea>
                                    @error('privacy_policy')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="panel-content">

                                {{-- SEO Title --}}
                                <div class="form-group">
                                    <label for="seo_title" class="control-label">SEO Title</label>
                                    <input type="text" class="form-control" id="seo_title" name="seo_title"
                                           value="{{ $dataInfo->seo_title ?? '' }}">
                                </div>

                                {{-- SEO Description --}}
                                <div class="form-group">
                                    <label for="seo_description" class="control-label">SEO Description</label>
                                    <textarea class="form-control" id="seo_description" name="seo_description"
                                              rows="3">{{ $dataInfo->seo_description ?? '' }}</textarea>
                                </div>

                                {{-- Google Pixel --}}
                                <div class="form-group">
                                    <label for="google_pixle" class="control-label">Google Pixel</label>
                                    <textarea class="form-control" id="google_pixle" name="google_pixle">{{ $dataInfo->google_pixle ?? '' }}</textarea>
                                </div>

                                {{-- Facebook Pixel --}}
                                <div class="form-group">
                                    <label for="facebook_pixle" class="control-label">Facebook Pixel</label>
                                    <textarea class="form-control" id="facebook_pixle" name="facebook_pixle">{{ $dataInfo->facebook_pixle ?? '' }}</textarea>
                                </div>

                                {{-- Facebook URL --}}
                                <div class="form-group">
                                    <label for="fb" class="control-label">Facebook URL</label>
                                    <input type="url" class="form-control" id="fb" name="fb"
                                           value="{{ $dataInfo->fb ?? '' }}">
                                </div>

                                {{-- WhatsApp URL --}}
                                <div class="form-group">
                                    <label for="wp" class="control-label">WhatsApp URL</label>
                                    <input type="url" class="form-control" id="wp" name="wp"
                                           value="{{ $dataInfo->wp ?? '' }}">
                                </div>

                                {{-- Twitter URL --}}
                                <div class="form-group">
                                    <label for="twitter" class="control-label">Twitter URL</label>
                                    <input type="url" class="form-control" id="twitter" name="twitter"
                                           value="{{ $dataInfo->twitter ?? '' }}">
                                </div>

                                {{-- YouTube URL --}}
                                <div class="form-group">
                                    <label for="youtube" class="control-label">YouTube URL</label>
                                    <input type="url" class="form-control" id="youtube" name="youtube"
                                           value="{{ $dataInfo->youtube ?? '' }}">
                                </div>

                                {{-- LinkedIn URL --}}
                                <div class="form-group">
                                    <label for="linkdi" class="control-label">LinkedIn URL</label>
                                    <input type="url" class="form-control" id="linkdi" name="linkdi"
                                           value="{{ $dataInfo->linkdi ?? '' }}">
                                </div>

                                {{-- Return Policy --}}
                                <div class="form-group">
                                    <label for="return_policy" class="control-label">Return Policy</label>
                                    <textarea name="return_policy" class="form-control summernote">{!! old('return_policy', $dataInfo->return_policy ?? '') !!}</textarea>
                                    @error('return_policy')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- About Us --}}
                                <div class="form-group">
                                    <label for="about_us" class="control-label">About Us</label>
                                    <textarea name="about_us" class="form-control summernote">{!! old('about_us', $dataInfo->about_us ?? '') !!}</textarea>
                                    @error('about_us')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Footer Content --}}
                                <div class="form-group">
                                    <label for="footer_content" class="control-label">Footer Text</label>
                                    <textarea name="footer_content" class="form-control summernote">{!! old('footer_content', $dataInfo->footer_content ?? '') !!}</textarea>
                                    @error('footer_content')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="form-group" style="text-align: right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewImage(event, previewId) {
            const reader = new FileReader();
            const fileInput = event.target;
            const preview = document.getElementById(previewId);

            reader.onload = function () {
                preview.src = reader.result;
            }

            if (fileInput.files[0]) {
                reader.readAsDataURL(fileInput.files[0]);
            }
        }

        // For text / email inputs
        function addRow(wrapperId, inputName, inputType, placeholder) {
            const wrapper = document.getElementById(wrapperId);
            const div     = document.createElement('div');
            div.className = 'input-group mb-2 contact-row';
            div.innerHTML = `
        <input type="${inputType}" class="form-control"
               name="${inputName}" placeholder="Enter ${placeholder}">
        <div class="input-group-append">
            <button type="button" class="btn btn-danger remove-row">
                <i class="fa fa-minus"></i>
            </button>
        </div>`;
            wrapper.appendChild(div);
        }

        // For textarea (address)
        function addRowTextarea(wrapperId, inputName, placeholder) {
            const wrapper = document.getElementById(wrapperId);
            const div     = document.createElement('div');
            div.className = 'input-group mb-2 contact-row';
            div.innerHTML = `
        <textarea class="form-control" name="${inputName}"
                  rows="2" placeholder="Enter ${placeholder}"></textarea>
        <div class="input-group-append">
            <button type="button" class="btn btn-danger remove-row">
                <i class="fa fa-minus"></i>
            </button>
        </div>`;
            wrapper.appendChild(div);
        }

        // Remove row — keep at least 1
        document.addEventListener('click', function (e) {
            if (e.target.closest('.remove-row')) {
                const row     = e.target.closest('.contact-row');
                const wrapper = row.parentElement;
                if (wrapper.querySelectorAll('.contact-row').length > 1) {
                    row.remove();
                }
            }
        });
    </script>
@endsection
