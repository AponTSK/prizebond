@php
    $statisticsContent = getContent('statistics.content', true);
    $statisticsElements = getContent('statistics.element');
@endphp

<section class="statistics-area py-80">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section-heading style-three">
                    <h3 class="section-heading__title text-white">
                        {{ __(@$statisticsContent->data_values->heading) }}
                    </h3>
                    <p class="section-heading__desc text-white">
                        {{ __(@$statisticsContent->data_values->subheading) }}
                    </p>
                </div>
            </div>
        </div>
        <div class="row gy-4">
            @foreach ($statisticsElements as $statisticsElement)
                <div class="col-lg-3 col-sm-6 col-xsm-6">
                    <div class="counterup-item">
                        <div class="counterup-item__thumb">
                            <img src="{{ frontendImage('statistics', @$statisticsElement->data_values->image) }}" alt="images" class="img" />
                        </div>
                        <p class="counterup-item__title">{{ __(@$statisticsElement->data_values->title) }}</p>
                        <h3 class="counterup-item__count">
                            <span class="odometer" data-odometer-final="{{ @$statisticsElement->data_values->digit }}">0</span>k+
                        </h3>
                    </div>
                </div>
            @endforeach
            <div class="statistics-btn text-center">
                <a href="{{ @$statisticsContent->data_values->button_url }}" class="btn btn--white">{{ __(@$statisticsContent->data_values->button_name) }}</a>
            </div>
        </div>
    </div>
</section>


@push('style-lib')
    <link rel="stylesheet" href="{{ asset($activeTemplateTrue . 'css/odometer.css') }}">
@endpush

@push('script-lib')
    <script src="{{ asset($activeTemplateTrue . 'js/odometer.min.js') }}"></script>
    <script src="{{ asset($activeTemplateTrue . 'js/viewport.jquery.js') }}"></script>
@endpush
