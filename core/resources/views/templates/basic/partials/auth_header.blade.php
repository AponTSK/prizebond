@php
    $user = auth()->user();
@endphp

<div class="dashboard-header">
    <div class="dashboard-header__inner flex-between">
        <div class="dashboard-header__left">
            <div class="dashboard-body__bar d-lg-none d-block">
                <span class="dashboard-body__bar-icon"><i class="fas fa-bars"></i></span>
            </div>

            <h6 class="dashboard-header__grettings mb-0">{{ __($pageTitle) }}</h6>

        </div>
        <div class="dashboard-header__right flex-align">

            <div class="user-info">
                <div class="user-info__button flex-align">
                    <span class="user-info__thumb">
                        <img src="{{ @$user->image_src }}" class="fit-image" alt="image" />
                    </span>
                    <div class="user-info__name">
                        <h6 class="title mb-0">{{ @$user->username }}</h6>
                        <span class="setting"><span class="setting-text">@lang('Setting')</span>
                            <i class="las la-angle-down"></i></span>
                    </div>
                </div>
                <ul class="user-info-dropdown">
                    <li class="user-info-dropdown__item">
                        <a class="user-info-dropdown__link" href="{{ route('user.profile.setting') }}">
                            <span class="icon"><i class="fas fa-cog"></i></span>
                            <span class="text">@lang('Profile Setting')</span>
                        </a>
                    </li>
                    <li class="user-info-dropdown__item">
                        <a class="user-info-dropdown__link" href="{{ route('user.logout') }}">
                            <span class="icon"><i class="las la-sign-out-alt"></i></span>
                            <span class="text">@lang('Logout')</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
