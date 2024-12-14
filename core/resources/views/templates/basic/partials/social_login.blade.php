@if (@gs('socialite_credentials')->linkedin->status || @gs('socialite_credentials')->facebook->status == Status::ENABLE || @gs('socialite_credentials')->google->status == Status::ENABLE)
    <div class="social-login">
        <div class="account-content__login">
            @if (@gs('socialite_credentials')->google->status == Status::ENABLE)
                <div class="mb-3 continue-google flex-fill">
                    <a href="{{ route('user.social.login', 'google') }}" class="btn social-login-btn btn--login w-100">
                        <span class="google-icon">
                            <img src="{{ asset($activeTemplateTrue . 'images/google.svg') }}" alt="Google">
                            @lang('Continue with Google')
                        </span>
                    </a>
                </div>
            @endif
            @if (@gs('socialite_credentials')->facebook->status == Status::ENABLE)
                <div class="mb-3 continue-facebook flex-fill">
                    <a href="{{ route('user.social.login', 'facebook') }}" class="btn social-login-btn btn--login w-100">
                        <span class="facebook-icon">
                            <img src="{{ asset($activeTemplateTrue . 'images/facebook.svg') }}" alt="Facebook">
                            @lang('Continue with Facebook')
                        </span>
                    </a>
                </div>
            @endif
            @if (@gs('socialite_credentials')->linkedin->status == Status::ENABLE)
                <div class="continue-facebook mb-3 flex-fill">
                    <a href="{{ route('user.social.login', 'linkedin') }}" class="btn social-login-btn btn--login w-100">
                        <span class="facebook-icon">
                            <img src="{{ asset($activeTemplateTrue . 'images/linkdin.svg') }}" alt="Linkedin">
                            @lang('continue_with_linkedin')
                        </span>
                    </a>
                </div>
            @endif
        </div>

        <div class="account-form__content mb-4">
            <div class="account-form__or">@lang('OR')</div>
        </div>
    </div>
    @push('style')
        <style>
            .social-login-btn {
                border: 1px solid #cbc4c4;
            }
        </style>
    @endpush
@endif
