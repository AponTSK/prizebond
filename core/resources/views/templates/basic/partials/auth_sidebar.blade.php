<div class="sidebar-menu flex-between">
    <div class="sidebar-menu__inner">
        <span class="sidebar-menu__close d-lg-none d-block">
            <i class="fas fa-times"></i>
        </span>

        <div class="sidebar-logo">
            <a href="{{ route('home') }}" class="sidebar-logo__link"><img src="{{ siteLogo() }}" alt=""></a>
        </div>

        <ul class="sidebar-menu-list">
            <li class="sidebar-menu-list__item {{ menuActive('user.home*') }}">
                <a href="{{ route('user.home') }}" class="sidebar-menu-list__link">
                    <span class="icon"><i class="las la-home"></i></span>
                    <span class="text">@lang('Dashboard')</span>
                </a>
            </li>
            <li class="sidebar-menu-list__item {{ menuActive('user.deposit.history*') }}">
                <a href="{{ route('user.deposit.history') }}" class="sidebar-menu-list__link">
                    <span class="icon"><i class="las la-money-bill-wave"></i></span>
                    <span class="text">@lang('Deposit')</span>
                </a>
            </li>
            <li class="sidebar-menu-list__item {{ menuActive('user.withdraw.history*') }}">
                <a href="{{ route('user.withdraw.history') }}" class="sidebar-menu-list__link">
                    <span class="icon"><i class="las la-wallet"></i></span>
                    <span class="text">@lang('Withdraw')</span>
                </a>
            </li>
            <li class="sidebar-menu-list__item {{ menuActive('ticket.index*') }}">
                <a href="{{ route('ticket.index') }}" class="sidebar-menu-list__link">
                    <span class="icon"><i class="las la-ticket-alt"></i></span>
                    <span class="text">@lang('My Ticket')</span>
                </a>
            </li>
            <li class="sidebar-menu-list__item {{ menuActive('user.transactions*') }}">
                <a href="{{ route('user.transactions') }}" class="sidebar-menu-list__link">
                    <span class="icon"><i class="las la-hand-holding-usd"></i></span>
                    <span class="text"> @lang('Transactions')</span>
                </a>
            </li>
            <li class="sidebar-menu-list__item {{ menuActive('user.change.password*') }}">
                <a href="{{ route('user.change.password') }}" class="sidebar-menu-list__link">
                    <span class="icon"><i class="las la-key"></i></span>
                    <span class="text"> @lang('Change Password')</span>
                </a>
            </li>
            <li class="sidebar-menu-list__item {{ menuActive('user.twofactor*') }}">
                <a href="{{ route('user.twofactor') }}" class="sidebar-menu-list__link">
                    <span class="icon"><i class="las la-shield-alt"></i></span>
                    <span class="text"> @lang('2FA Security')</span>
                </a>
            </li>
        </ul>
    </div>
</div>
