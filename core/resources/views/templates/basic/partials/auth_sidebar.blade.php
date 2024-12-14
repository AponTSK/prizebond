<div class="sidebar-menu flex-between">
    <div class="sidebar-menu__inner">
        <span class="sidebar-menu__close d-lg-none d-block">
            <i class="fas fa-times"></i>
        </span>
        <!-- Sidebar Logo Start -->
        <div class="sidebar-logo">
            <a href="{{ route('home') }}" class="sidebar-logo__link"><img src="{{ siteLogo() }}" alt=""></a>
        </div>
        <!-- Sidebar Logo End -->

        <!-- ========= Sidebar Menu Start ================ -->
        <ul class="sidebar-menu-list">
            <li class="sidebar-menu-list__item {{ menuActive('user.home') }}">
                <a href="{{ route('user.home') }}" class="sidebar-menu-list__link">
                    <span class="icon"><i class="las la-home"></i></span>
                    <span class="text">@lang('Dashboard')</span>
                </a>
            </li>

            <li class="sidebar-menu-list__item">
                <a href="#" class="sidebar-menu-list__link">
                    <span class="icon"><i class="fas fa-file-invoice"></i></span>
                    <span class="text">@lang('Lottery')</span>
                </a>
            </li>

            <li class="sidebar-menu-list__item">
                <a href="#" class="sidebar-menu-list__link">
                    <span class="icon"><i class="fas fa-shopping-cart"></i></span>
                    <span class="text">@lang('Transaction')</span>
                </a>
            </li>

            <li class="sidebar-menu-list__item has-dropdown">
                <a href="javascript:void(0)" class="sidebar-menu-list__link">
                    <span class="icon"><i class="fas fa-globe"></i></span>
                    <span class="text">@lang('Language')</span>
                </a>
                <div class="sidebar-submenu">
                    <ul class="sidebar-submenu-list">
                        <li class="sidebar-submenu-list__item">
                            <a href="#" class="sidebar-submenu-list__link">
                                <span class="text">@lang('Bangla')</span>
                            </a>
                        </li>
                        <li class="sidebar-submenu-list__item">
                            <a href="#" class="sidebar-submenu-list__link">
                                <span class="text">@lang('English') </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="sidebar-menu-list__item">
                <a href="#" class="sidebar-menu-list__link">
                    <span class="icon"><i class="far fa-bell"></i></span>
                    <span class="text">@lang('Notifications')</span>
                </a>
            </li>
            <li class="sidebar-menu-list__item">
                <a href="#" class="sidebar-menu-list__link">
                    <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                    <span class="text">@lang('Help Center')</span>
                </a>
            </li>
        </ul>
        <!-- ========= Sidebar Menu End ================ -->
    </div>
</div>
