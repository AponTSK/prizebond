@extends('admin.layouts.app')
@section('panel')
    <x-admin.ui.widget.group.dashboard.demo_five />
    <x-admin.ui.widget.group.dashboard.users :widget="$widget" />
    <x-admin.ui.widget.group.dashboard.trx :widget="$widget" />
    <x-admin.ui.widget.group.dashboard.financial_overview :widget="$widget" />
    <x-admin.ui.widget.group.dashboard.demo_one />
    <x-admin.ui.widget.group.dashboard.demo_two />
    <x-admin.ui.widget.group.dashboard.demo_three />
    <x-admin.ui.widget.group.dashboard.demo_four />
    <div class="row gy-4 mb-4">
        <x-admin.other.dashboard_trx_chart />
        <div class="col-xl-4">
            <x-admin.other.dashboard_login_chart :userLogin=$userLogin />
        </div>
    </div>

    {{-- <x-admin.other.cron_modal /> --}}
@endsection

@push('script-lib')
    <script src="{{ asset('assets/admin/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/charts.js') }}"></script>
    <script src="{{ asset('assets/global/js/flatpickr.js') }}"></script>
@endpush


@push('style-lib')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/css/flatpickr.min.css') }}">
@endpush

@push('script')
    <script>
        "use strict";
        (function($) {
            $(".date-picker").flatpickr({
                mode: 'range',
                maxDate: new Date(),
            });
        })(jQuery);
    </script>
@endpush