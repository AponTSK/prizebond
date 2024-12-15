@php
    $activeLang = $languages->where('code', config('app.locale') ?? 'en')->first();
@endphp

<header class="header" id="header">
    <div class="container">
        <nav class="navbar navbar-expand-xl navbar-light">
            <a class="navbar-brand logo" href="{{ route('home') }}"><img src="{{ sitelogo() }}" alt="site-logo" /></a>
            <button class="navbar-toggler header-button" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span id="hiddenNav"><i class="las la-bars"></i></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-menu mx-auto align-items-xl-center">
                    @if (gs('multi_language'))
                        <li class="nav-item d-block d-xl-none">
                            <div class="top-button d-flex flex-wrap justify-content-between align-items-center">
                                <div class="custom--dropdown">
                                    <div class="custom--dropdown__selected dropdown-list__item">
                                        <span class="text"> {{ $activeLang->code }} </span>
                                        <div class="thumb">
                                            <img src="{{ $activeLang->image_src }}" alt="image" />
                                        </div>
                                    </div>
                                    <ul class="dropdown-list">
                                        @foreach ($languages as $language)
                                            <li class="dropdown-list__item" data-value="eng">
                                                <span class="text"> {{ $language->code }} </span>
                                                <a href="{{ route('lang', $language->code) }}" class="thumb">
                                                    <img src="{{ $language->image_src }}" alt="image" />
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <ul>
                                    <li class="header-login__item">
                                        <a class="btn btn--base" href="#">@lang('Get Started')</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('home') }}">@lang('Home')</a>
                    </li>


                    @foreach ($pages as $k => $data)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pages', [$data->slug]) }}">{{ __($data->name) }}
                            </a>
                        </li>
                    @endforeach

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('blogs') }}">@lang('Blog')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">@lang('Contact')</a>
                    </li>
                </ul>

                <div class="d-none d-xl-block">
                    <ul class="header-login list primary-menu">

                        @auth
                            <li class="header-login__item">
                                <a class="header-login__item-link" href="{{ route('user.home') }}">@lang('Dashboard')</a>
                            </li>
                        @else
                            <li class="header-login__item">
                                <a class="header-login__item-link" href="{{ route('user.login') }}">@lang('Login')</a>
                            </li>
                            <li class="header-login__item">
                                <a class="btn btn--base-two" href="{{ route('user.register') }}">@lang('Sign Up')</a>
                            </li>
                        @endauth

                        @if (gs('multi_language'))

                            <li class="header-login__item">
                                <div class="custom--dropdown">
                                    <div class="custom--dropdown__selected dropdown-list__item">
                                        <span class="text"> {{ $activeLang->code }} </span>
                                        <div class="thumb">
                                            <img src="{{ $activeLang->image_src }}" alt="image" />
                                        </div>
                                    </div>
                                    <ul class="dropdown-list">
                                        @foreach ($languages as $language)
                                            <li class="dropdown-list__item" data-value="eng">
                                                <span class="text"> {{ $language->code }} </span>
                                                <a href="{{ route('lang', $language->code) }}" class="thumb">
                                                    <img src="{{ $language->image_src }}" alt="image" /></a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
