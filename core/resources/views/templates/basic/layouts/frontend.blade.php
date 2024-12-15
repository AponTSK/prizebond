@extends($activeTemplate . 'layouts.app')
@section('app-content')
    @stack('fbComment')
    @include('Template::partials.header')
    @if (!request()->routeIs('home', 'user.*'))
        @include('Template::partials.breadcrumb')
    @endif
    @yield('content')
    @include('Template::partials.footer')
@endsection
