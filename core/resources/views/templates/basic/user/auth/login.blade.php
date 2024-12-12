@php
    $loginRegisterContent = getContent('login_register.content', true);
@endphp

@extends($activeTemplate . 'layouts.frontend')
@section('content')
    <section class="account py-80">
        <div class="container">
            <div class="account__inner">
                <div class="account-left">
                    <form method="POST" action="{{ route('user.login') }}" class="verify-gcaptcha account-content__form">
                        @csrf
                        <div class="account-content">
                            <div class="account-content__inner">
                                <div class="login-link">
                                    <a href="#">@lang('LOGIN')</a>
                                </div>
                                <h4 class="account-content__title">{{ __(@$loginRegisterContent->data_values->login_heading) }}</h4>
                                <p class="account-content__desc">{{ __(@$loginRegisterContent->data_values->login_register_subheading) }}</p>
                                <div class="account-content__login">
                                    <a href="# " class="btn btn--login w-100">
                                        <img src="{{ frontendImage('login_register', @$loginRegisterContent->data_values->social_image) }}" alt="img"> {{ __(@$loginRegisterContent->data_values->social_text) }}
                                    </a>
                                </div>
                                <div class="account-form__content mb-4">
                                    <div class="account-form__or">@lang('OR')</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="email" class="form-label">@lang('Username or Email')</label>
                                    <input type="text" name="username" value="{{ old('username') }}" class="form-control form--control" required>
                                </div>

                                <div class="form-group col-12">
                                    <div class="d-flex flex-wrap justify-content-between mb-2">
                                        <label class="form-label mb-0">@lang('Password')</label>
                                        <a class="fw-bold forgot-pass" href="{{ route('user.password.request') }}">
                                            @lang('Forgot your password?')
                                        </a>
                                    </div>
                                    <input id="password" type="password" class="form-control form--control" name="password" required>
                                </div>
                                <x-captcha />
                                <div class="form-group form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        @lang('Remember Me')
                                    </label>
                                </div>

                                <div class="form-group col-12">
                                    <button type="submit" id="recaptcha" class="btn btn--base w-100">
                                        @lang('Login')
                                    </button>
                                </div>
                                <p class="mb-0">@lang('Don\'t have any account?') <a href="{{ route('user.register') }}">@lang('Register')</a>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="account-right">
                    <img src="{{ frontendImage('login_register', @$loginRegisterContent->data_values->right_bg_image) }}" alt="" class="account-right__bg">
                    <div class="account-right__content">
                        <h4 class="account-right__title">{{ @$loginRegisterContent->data_values->Right_heading }}</h4>
                        <p class="account-right__desc fs-15">{{ @$loginRegisterContent->data_values->Right_subheading }}</p>
                        <img src="{{ frontendImage('login_register', @$loginRegisterContent->data_values->right_image) }}" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
