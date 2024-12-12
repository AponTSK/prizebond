@extends($activeTemplate . 'layouts.frontend')
@section('content')
    @include('Template::partials.breadcrumb')

    <div class="blog pt-160 pb-80">
        <div class="container">
            <div class="section-wrapper section-heading style-left d-flex flex-wrap row gy-4 justify-content-center">
                @foreach ($blogs as $blogElement)
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
                                <a href="{{ route('blog.details', @$blogElement->slug) }}" class="btn--simple">@lang('Read More')</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>


    {{-- <div class="cotaniner mt-5 my-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h1>@lang('Blog Page')</h1>
                    <hr>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deleniti tempora optio dolorum autem
                        est accusamus atque, porro totam architecto, aliquam repellendus maxime quo? Aperiam, non
                        labore. Repudiandae error facilis quam tenetur debitis autem porro consequuntur quo, minima sed
                        placeat molestias aperiam recusandae corrupti odit voluptates deserunt laudantium sunt.
                        Doloremque, dolore!</p>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
