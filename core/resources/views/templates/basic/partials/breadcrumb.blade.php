@php
    $breadCrumbContent = getContent('breadcrumb.content', true);
@endphp

<section class="breadcrumb py-120 bg-img" data-background-image="{{ frontendImage('breadcrumb', @$breadCrumbContent->data_values->background_image) }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb__wrapper">
                    <h4 class="breadcrumb__title">{{ __($pageTitle) }}</h4>
                </div>
            </div>
        </div>
    </div>
</section>
