@php
    $contactContent = getContent('contact_us.content', true);
@endphp

@extends($activeTemplate . 'layouts.frontend')
@section('content')
    @include('Template::partials.breadcrumb')

    <section class="contact-area py-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-left d-none d-lg-block">
                        <div class="contact__thumb">
                            <img src="{{ frontendImage('contact_us', @$contactContent->data_values->image) }}" alt="img">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-right pl-lg-space">
                        <div class="map-info">
                            <h5 class="map-info__title">
                                {{ __(@$contactContent->data_values->title) }}
                            </h5>
                            <div class="map-area pb-0">
                                <iframe class="map" src="{{ @$contactContent->data_values->map_url }}"></iframe>
                            </div>
                        </div>

                        <div class="row gy-4 mb-5">
                            <div class="col-md-4 col-sm-4">
                                <div class="contact">
                                    <div class="contact__icon email">
                                        <i class="las la-envelope"></i>
                                    </div>
                                    <h6 class="contact__title">
                                        @lang('Email')
                                    </h6>
                                    <p class="contact__desc">
                                        @lang('Lorem ipsum dolor sit amet.')
                                    </p>
                                    <div class="contact__link">
                                        <a href="#">{{ @$contactContent->data_values->email_address }}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="contact">
                                    <div class="contact__icon phone">
                                        <i class="las la-phone-alt"></i>
                                    </div>
                                    <h6 class="contact__title">
                                        @lang('Phone')
                                    </h6>
                                    <p class="contact__desc">
                                        @lang('Lorem ipsum dolor sit amet.')
                                    </p>
                                    <div class="contact__link">
                                        <a href="tel:+1(555)000-0000">{{ @$contactContent->data_values->contact_number }}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="contact">
                                    <div class="contact__icon location">
                                        <i class="las la-map-marker-alt"></i>
                                    </div>
                                    <h6 class="contact__title">
                                        @lang('Office')
                                    </h6>
                                    <p class="contact__desc location">
                                        {{ __(@$contactContent->data_values->contact_details) }}
                                    </p>
                                    <div class="contact__link">
                                        <a href="#">@lang('Get Directions')<i class="las la-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="contact-form mt-4">
                            <div class="contact-form_content">
                                <h5 class="contact-form__title">Fill Up To Contact</h5>
                            </div>
                            <form class="verify-gcaptcha contact-form-box" action="{{ route('contact') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <div class="form--group">
                                            <label for="name" class="form-label form--label required">@lang('Your Name')</label>
                                            <input name="name" type="text" class="form-control form--control" value="{{ old('name', @$user->fullname) }}" @if ($user && $user->profile_complete) readonly @endif required
                                                id="name" placeholder="@lang('Your first name')">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <div class="form--group">
                                            <label for="email" class="form-label form--label required">@lang('Your Email')</label>
                                            <input name="email" type="email" class="form-control form--control" value="{{ old('email', @$user->email) }}" @if ($user) readonly @endif required
                                                id="email" placeholder="@lang('Enter your email')">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 form-group">
                                        <div class="form--group">
                                            <label for="subject" class="form-label form--label required">@lang('Your Subject')</label>
                                            <input type="text" id="subject" placeholder="@lang('Enter your subject')" name="subject" class="form-control form--control" value="{{ old('subject') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 form-group">
                                        <div class="form--group">
                                            <label for="message" class="form--label required">@lang('How can we help you?')</label>
                                            <textarea id="message" name="message" class="form-control form--control" required></textarea>
                                        </div>
                                    </div>
                                    <x-captcha />
                                    <div class="col-sm-12 form-group">
                                        <button type="submit" class="btn btn--base w-100"> @lang('Submit')</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
