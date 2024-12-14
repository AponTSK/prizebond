@extends($activeTemplate . 'layouts.app')
@section('app-content')
    <div class="dashboard position-relative">
        <div class="dashboard__inner flex-wrap">
            @include('Template::partials.auth_sidebar')
            <div class="dashboard__right">
                @include('Template::partials.auth_header')
                <div class="dashboard-body">
                    @yield('content')
                </div>
            </div>
            @include('Template::partials.auth_footer')
        </div>
    </div>
@endsection
