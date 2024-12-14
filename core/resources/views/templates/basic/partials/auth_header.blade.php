@php
    use Illuminate\Support\Facades\Auth;
    $user = Auth::user();
@endphp


<div class="dashboard-header">
    <div class="dashboard-header__inner flex-between">
        <div class="dashboard-header__left">
            <div class="dashboard-body__bar d-lg-none d-block">
                <span class="dashboard-body__bar-icon"><i class="fas fa-bars"></i></span>
            </div>

            <h6 class="dashboard-header__grettings mb-0">{{ __($pageTitle) }}</h6>
            <form action="*" method="get" class="search-form active d-none d-md-block">
                <input type="text" name="search" class="form--control" placeholder="@lang('Search here...')" />
                <button type="submit" class="search-form__btn">
                    <i class="fas fa-search"></i>
                </button>
            </form>
            <div class="d-block d-md-none">
                <button type="button" class="header-search-btn">
                    <i class="la la-search"></i>
                </button>
                <div class="header-search">
                    <form action="*" method="get" class="search-form active">
                        <input type="text" name="search" class="form--control" placeholder="@lang('Search here...')" />
                        <button type="submit" class="search-form__btn">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="dashboard-header__right flex-align">
            <div class="notifi__inner">
                <div class="dropdown">
                    <button type="button" class="notify-btn" data-bs-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                        <i class="far fa-bell"></i>
                        <span class="notifi-count-btn">10</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu--md dropdown-menu-right">
                        <div class="notifi__inner-header">
                            <span class="caption">@lang('Notification')</span>
                            <p>You have 19 unread notification</p>
                        </div>
                        <div class="notifi__inner_body">
                            <a href="#" class="dropdown-menu__item">
                                <div class="navbar-notifi">
                                    <div class="navbar-notifi__left">
                                        <img src="{{ @$user->image_src }}" class="fit-image" alt="Profile Image" />
                                    </div>
                                    <div class="navbar-notifi__right">
                                        <h6 class="notifi__title mb-0">
                                            New support ticket has opened
                                        </h6>
                                        <span class="time"><i class="far fa-clock"></i> 1 day ago</span>
                                    </div>
                                </div>
                                <!-- navbar-notifi end -->
                            </a>
                            <a href="#" class="dropdown-menu__item">
                                <div class="navbar-notifi">
                                    <div class="navbar-notifi__left">
                                        <img src="{{ @$user->image_src }}" class="fit-image" alt="Profile Image" />
                                    </div>
                                    <div class="navbar-notifi__right">
                                        <h6 class="notifi__title mb-0">
                                            unexpected response from API
                                        </h6>
                                        <span class="time"><i class="far fa-clock"></i> 1 month ago</span>
                                    </div>
                                </div>
                                <!-- navbar-notifi end -->
                            </a>
                            <a href="#" class="dropdown-menu__item">
                                <div class="navbar-notifi">
                                    <div class="navbar-notifi__left">
                                        <img src="assets/images/thumbs/author-03.png" alt="Profile Image" />
                                    </div>
                                    <div class="navbar-notifi__right">
                                        <h6 class="notifi__title mb-0">
                                            unexpected response from API
                                        </h6>
                                        <span class="time"><i class="far fa-clock"></i> 1 month ago</span>
                                    </div>
                                </div>
                                <!-- navbar-notifi end -->
                            </a>
                            <a href="#" class="dropdown-menu__item">
                                <div class="navbar-notifi">
                                    <div class="navbar-notifi__left">
                                        <img src="assets/images/thumbs/author-04.png" alt="Profile Image" />
                                    </div>
                                    <div class="navbar-notifi__right">
                                        <h6 class="notifi__title mb-0">
                                            New member registered
                                        </h6>
                                        <span class="time"><i class="far fa-clock"></i> 1 month ago</span>
                                    </div>
                                </div>
                                <!-- navbar-notifi end -->
                            </a>
                            <a href="#" class="dropdown-menu__item">
                                <div class="navbar-notifi">
                                    <div class="navbar-notifi__left">
                                        <img src="assets/images/thumbs/author-05.png" alt="Profile Image" />
                                    </div>
                                    <div class="navbar-notifi__right">
                                        <h6 class="notifi__title mb-0">
                                            unexpected response from API
                                        </h6>
                                        <span class="time"><i class="far fa-clock"></i> 1 month ago</span>
                                    </div>
                                </div>
                                <!-- navbar-notifi end -->
                            </a>
                        </div>
                        <div class="notifi__inner__footer">
                            <a href="https://localhost/visermart/admin/notifications" class="view-all-message">@lang('View All Notification')</a>
                        </div>
                    </div>
                </div>
            </div>
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
                        <a class="user-info-dropdown__link" href="#">
                            <span class="icon"><i class="far fa-user-circle"></i></span>
                            <span class="text">@lang('My Profile')</span>
                        </a>
                    </li>
                    <li class="user-info-dropdown__item">
                        <a class="user-info-dropdown__link" href="#">
                            <span class="icon"><i class="fas fa-cog"></i></span>
                            <span class="text">@lang('Settings')</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
