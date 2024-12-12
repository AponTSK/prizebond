@php
    $blogContent = getContent('blog.content', true);
    $blogElements = getContent('blog.element');
@endphp

<section class="blog pt-160 pb-80">
    <div class="container">
        <div class="section-wrapper section-heading style-left d-flex flex-wrap gap-3 justify-content-between">
            <div class="content">
                <h3 class="section-heading__title">{{ __(@$blogContent->data_values->heading) }}</h3>
                <p class="section-heading__desc">
                    {{ __(@$blogContent->data_values->subheading) }}
                </p>
            </div>
            <div class="view-btn">
                <a href="#" class="btn btn--base">{{ __($blogContent->data_values->button_name) }}</a>
            </div>
        </div>
        <div class="row gy-4 justify-content-center">
            @foreach ($blogElements as $blogElement)
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item">
                        <div class="blog-item__thumb">
                            <a href="{{ route('blog.details', @$blogElement->slug) }}" class="blog-item__thumb-link">
                                <img src="{{ frontendImage('blog', @$blogElement->data_values->image, '416x257') }}" class="fit-image" alt="" />
                            </a>
                        </div>
                        <div class="blog-item__content">
                            <ul class="text-list flex-align gap-3">
                                <li class="text-list__item fs-16">{{ @$blogElement->data_values->date }}</li>
                            </ul>
                            <h5 class="blog-item__title">
                                <a href="{{ route('blog.details', @$blogElement->slug) }}" class="blog-item__title-link border-effect">{{ __(@$blogElement->data_values->title) }}</a>
                            </h5>
                            <p class="blog-item__desc">
                                {{ __(@$blogElement->data_values->description) }}
                            </p>
                            <a href="{{ route('blog.details', @$blogElement->slug) }}" class="btn--simple">@lang('Read More')
                                <span class="btn--simple__icon">@php
                                    echo @$blogContent->data_values->icon;
                                @endphp</span></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
