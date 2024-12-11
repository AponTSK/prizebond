@php
    $banner = getContent('banner.content', true);
@endphp

<section class="banner-section bg-img" data-background-image="{{ frontendImage('banner', @$banner->data_values->background_image) }}">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="banner-content">
                    <span class="banner-content__subtitle text--white">
                        {{ __(@$banner->data_values->title) }}</span>
                    <h1 class="banner-content__title">
                        <span>
                            {{ __(@$banner->data_values->heading) }}
                        </span>
                    </h1>
                    <p class="banner-content__desc">
                        {{ __(@$banner->data_values->subheading) }}
                    </p>
                    <div class="banner-content__button d-flex align-items-center gap-3">
                        <a href="{{ @$banner->data_values->button_one_url }}" class="btn btn--white">
                            {{ __(@$banner->data_values->button_one_name) }}
                        </a>
                        <a href=" {{ @$banner->data_values->button_two_url }}" class="btn btn-outline--white">
                            {{ __(@$banner->data_values->button_two_name) }}
                        </a>
                    </div>
                    <div class="payment__gateway">
                        <p class="title"> {{ __(@$banner->data_values->payment_gateway_title) }}s</p>
                        <div class="payment__gateway__thumb">
                            <img src="{{ frontendImage('banner', @$banner->data_values->payment_gateway_image) }}" alt="img" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="banner-thumb d-none d-lg-block">
                    <div class="thumb">
                        <img src="{{ frontendImage('banner', @$banner->data_values->banner_image) }}" alt="img" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
