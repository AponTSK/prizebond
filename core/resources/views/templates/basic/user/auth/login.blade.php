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
                                    <a href="#">LOGIN</a>
                                </div>
                                <h4 class="account-content__title">Welcome Back!</h4>
                                <p class="account-content__desc">Provide insights into team performance and engagement</p>
                                <div class="account-content__login">
                                    <a href="# " class="btn btn--login w-100">
                                        <img src="assets/images/thumbs/google.svg" alt="svg"> Continue with Google
                                    </a>
                                </div>
                                <div class="account-form__content mb-4">
                                    <div class="account-form__or">OR</div>
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
                    <img src="assets/images/thumbs/account-right-bg.png" alt="" class="account-right__bg">
                    <div class="account-right__content">
                        <h4 class="account-right__title">Prize Bond Lottery</h4>
                        <p class="account-right__desc fs-15">Play and Win money Unlimited</p>
                        <img src="assets/images/thumbs/login-02.png" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
