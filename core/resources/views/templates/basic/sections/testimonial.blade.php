@php
    $testimonialContent = getContent('testimonial.content', true);
    $testimonialElements = getContent('testimonial.element');
@endphp

<section class="testimonials py-120 section-bg">
    <div class="container">
        <div class="section-wrapper section-heading style-left d-flex flex-wrap gap-3 justify-content-between">
            <div class="content">
                <h3 class="section-heading__title">{{ __(@$testimonialContent->data_values->heading) }}</h3>
                <p class="section-heading__desc">
                    {{ __(@$testimonialContent->data_values->subheading) }}
                </p>
            </div>
        </div>
        <div class="testimonial-slider">
            @foreach ($testimonialElements as $testimonialElement)
                <div class="testimonails-card">
                    <div class="testimonial-item">
                        <div class="testimonial-item__content">
                            <div class="testimonial-item__info">
                                <div class="testimonial-item__thumb">
                                    <img src="{{ frontendImage('testimonial', @$testimonialElement->data_values->customer_image) }}" class="fit-image" alt="" />
                                </div>
                                <div class="testimonial-item__details">
                                    <h6 class="testimonial-item__name">{{ __(@$testimonialElement->data_values->customer_name) }}</h6>
                                </div>
                            </div>
                        </div>
                        <p class="testimonial-item__desc">
                            {{ __(@$testimonialElement->data_values->review) }}
                        </p>
                        <div class="testimonial-item__rating">
                            <ul class="rating-list">
                                @for ($i = 0; $i < $testimonialElement->data_values->rating; $i++)
                                    <li class="rating-list__item"><i class="fas fa-star"></i></li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
