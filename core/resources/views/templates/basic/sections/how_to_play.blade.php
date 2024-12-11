@php
    $howToPlayContent = getContent('how_to_play.content', true);
    $howToPlayElements = getContent('how_to_play.element');
@endphp

<section class="how-work-section pt-80 pb-80">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section-heading style-three">
                    <h3 class="section-heading__title">{{ __(@$howToPlayContent->data_values->heading) }}</h3>
                    <p class="section-heading__desc">
                        {{ __(@$howToPlayContent->data_values->subheading) }}
                    </p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="how-work">
                    @foreach ($howToPlayElements->reverse() as $howToPlayElement)
                        <div class="how-work__item">
                            <span class="work-count">1</span>
                            <div class="how-work__thumb">
                                <img src="{{ frontendImage('how_to_play', @$howToPlayElement->data_values->image) }}" alt="image" />
                            </div>
                            <div class="how-work__content">
                                <h5 class="how-work__title">{{ __(@$howToPlayElement->data_values->title) }}</h5>
                                <p class="how-work__desc">
                                    {{ __(@$howToPlayElement->data_values->subtitle) }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
