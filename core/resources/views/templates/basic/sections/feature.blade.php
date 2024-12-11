@php
    $featureContent = getContent('feature.content', true);
    $featureElements = getContent('feature.element');
@endphp

<section class="lottery-features pt-160 pb-80">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section-heading style-three">
                    <h3 class="section-heading__title">{{ __(@$featureContent->data_values->heading) }}</h3>
                    <p class="section-heading__desc">
                        {{ __(@$featureContent->data_values->subheading) }}
                    </p>
                </div>
            </div>
        </div>
        <div class="row gy-4 justify-content-center">
            @foreach ($featureElements as $featureElement)
                <div class="col-lg-4 col-md-6">
                    <div class="features-item text-center">
                        <div class="features-item__thumb">
                            <img src="{{ frontendImage('feature', @$featureElement->data_values->image) }}" alt="img" />
                        </div>
                        <h5 class="features-item__title">{{ __(@$featureElement->data_values->heading) }}</h5>
                        <p class="features-item__desc">
                            {{ __(@$featureElement->data_values->subheading) }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
