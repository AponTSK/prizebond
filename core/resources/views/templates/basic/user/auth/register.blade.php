@php
    $loginRegisterContent = getContent('login_register.content', true);
@endphp

@extends($activeTemplate . 'layouts.frontend')
@section('content')
    <section class="account py-60">
        <div class="container">
            <div class="account__inner">
                <div class="account-left">
                    <form action="{{ route('user.register') }}" method="POST" class="verify-gcaptcha account-content__form">
                        @csrf
                        <div class="account-content">
                            <div class="account-content__inner">
                                <div class="login-link">
                                    <a href="#">@lang('Registration')</a>
                                </div>
                                <h4 class="account-content__title">{{ __(@$loginRegisterContent->data_values->register_heading) }}</h4>
                                <p class="account-content__desc">{{ __(@$loginRegisterContent->data_values->login_register_subheading) }}</p>
                                @include($activeTemplate . 'partials.social_login')
                            </div>
                            <div class="row">
                                @if (session()->get('reference') != null)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="referenceBy" class="form-label">@lang('Reference by')</label>
                                            <input type="text" name="referBy" id="referenceBy" class="form-control form--control" value="{{ session()->get('reference') }}" readonly>
                                        </div>
                                    </div>
                                @endif
                                <div class="form-group col-sm-6">
                                    <label class="form-label">@lang('First Name')</label>
                                    <input type="text" class="form-control form--control" name="firstname" value="{{ old('firstname') }}" required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label class="form-label">@lang('Last Name')</label>
                                    <input type="text" class="form-control form--control" name="lastname" value="{{ old('lastname') }}" required>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('E-Mail Address')</label>
                                        <input type="email" class="form-control form--control checkUser" name="email" value="{{ old('email') }}" required>
                                        <span class="exists-error d-none"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Password')</label>
                                        <input type="password" class="form-control form--control" name="password" required>
                                        <x-strong-password />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Confirm Password')</label>
                                        <input type="password" class="form-control form--control" name="password_confirmation" required>
                                    </div>
                                </div>
                                <x-captcha />
                            </div>

                            @if (gs('agree'))
                                @php
                                    $policyPages = getContent('policy_pages.element', false, orderById: true);
                                @endphp
                                <div class="form-group">
                                    <input type="checkbox" id="agree" @checked(old('agree')) name="agree" required>
                                    <label for="agree">@lang('I agree with')</label> <span>
                                        @foreach ($policyPages as $policy)
                                            <a href="{{ route('policy.pages', $policy->slug) }}" target="_blank">{{ __($policy->data_values->title) }}</a>
                                            @if (!$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                    </span>
                                </div>
                            @endif
                            <div class="form-group">
                                <button type="submit" id="recaptcha" class="btn btn--base w-100">
                                    @lang('Register')
                                </button>
                            </div>
                            <p class="mb-0">
                                @lang('Already have an account?') <a href="{{ route('user.login') }}">@lang('Login')</a>
                            </p>
                        </div>
                    </form>
                </div>
                <div class="account-right">
                    <img src="{{ frontendImage('login_register', @$loginRegisterContent->data_values->right_bg_image) }}" alt="" class="account-right__bg">
                    <div class="account-right__content">
                        <h4 class="account-right__title">{{ __(@$loginRegisterContent->data_values->Right_heading) }}</h4>
                        <p class="account-right__desc fs-15">{{ __(@$loginRegisterContent->data_values->Right_subheading) }}</p>
                        <img src="{{ frontendImage('login_register', @$loginRegisterContent->data_values->right_image) }}" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@push('script')
    <script>
        "use strict";
        (function($) {

            $('.checkUser').on('focusout', function(e) {
                var url = "{{ route('user.checkUser') }}";
                var value = $(this).val();
                var token = '{{ csrf_token() }}';

                var data = {
                    email: value,
                    _token: token
                }

                $.post(url, data, function(response) {
                    if (response.data == true) {
                        $(".exists-error").html(`
                                @lang('You’re already part of our community!')
                                <a class="ms-1" href="{{ route('user.login') }}">@lang('Login now')</a>
                            `).removeClass('d-none').addClass("text-danger mt-1 d-block");
                        $(`button[type=submit]`).attr('disabled', true).addClass('disabled');
                    } else {
                        $(".exists-error").empty().addClass('d-none').removeClass(
                            "text-danger mt-1 d-block");
                        $(`button[type=submit]`).attr('disabled', false).removeClass('disabled');
                    }
                });
            });
        })(jQuery);
    </script>
@endpush
