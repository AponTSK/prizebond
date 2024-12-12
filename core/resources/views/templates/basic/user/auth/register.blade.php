@php
    $loginRegisterContent = getContent('login_register.content', true);
@endphp

@extends($activeTemplate . 'layouts.frontend')
@section('content')
    <section class="account py-80">
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
                                <div class="account-content__login">
                                    <a href="# " class="btn btn--login w-100">
                                        <img src="{{ frontendImage('login_register', @$loginRegisterContent->data_values->social_image) }}" alt="img"> {{ __(@$loginRegisterContent->data_values->social_text) }} </a>
                                </div>
                                <div class="account-form__content mb-4">
                                    <div class="account-form__or">@lang('OR')</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form--label">@lang('First Name')</label>
                                        <input type="text" class="form-control form--control" name="firstname" value="{{ old('firstname') }}" required placeholder="@lang('Your first name')">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form--label">@lang('Last Name')</label>
                                        <input type="text" class="form-control form--control" name="lastname" value="{{ old('lastname') }}" required placeholder="@lang('Your last name')">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form--label">@lang('Email')</label>
                                        <input type="email" placeholder="@lang('Enter your email')" class="form-control form--control checkUser" name="email" value="{{ old('email') }}" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form--label">@lang('Password')</label>
                                    <div class="form-group">
                                        <input type="password" placeholder="@lang('Password')" class="form-control form--control floating-input" id="your-password" name="password" required>
                                        <span class="password-show-hide fas fa-eye toggle-password fa-eye-slash" id="#your-password"></span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form--label">@lang('Confirm Password')</label>
                                    <div class="form-group">
                                        <input type="password" placeholder="@lang('Password')" class="form-control form--control floating-input" id="confirm-password" name="password_confirmation" required>
                                        <span class="password-show-hide fas fa-eye toggle-password fa-eye-slash" id="confirm-password1"></span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    @if (gs('agree'))
                                        @php
                                            $policyPages = getContent('policy_pages.element', false, orderById: true);
                                        @endphp
                                        <div class="form-group">
                                            <input type="checkbox" class="form-check-input" id="agree" @checked(old('agree')) name="agree" required>
                                            <label for="agree" class="form-check-label">@lang('I agree with')</label>
                                            <span>
                                                @foreach ($policyPages as $policy)
                                                    <a href="{{ route('policy.pages', $policy->slug) }}" target="_blank">
                                                        {{ __($policy->data_values->title) }}
                                                    </a>
                                                    @if (!$loop->last)
                                                        ,
                                                    @endif
                                                @endforeach
                                            </span>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12 form-group">
                                    <div class="form-group text-center">
                                        <button type="submit" id="recaptcha" class="btn btn--base w-100">@lang('Sign In')</button>
                                    </div>
                                </div>
                            </div>
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
