@extends($activeTemplate . 'layouts.frontend')
@section('content')
    @include('Template::partials.breadcrumb')

    <section class="blog-detials py-120">
        <div class="container">
            <div class="row gy-5 justify-content-center">
                <div class="col-xl-9 col-lg-8">
                    <div class="blog-details">
                        <div class="blog-details__thumb">
                            <img src="{{ frontendImage('blog', $blog->data_values->image) }}" class="fit-image" alt="img">

                        </div>
                        <div class="blog-details__content">
                            <span class="blog-item__date mb-2"><span class="blog-item__date-icon"><i class="las la-clock"></i></span> {{ showDateTime($blog->data_values->date) }}</span>
                            <h3 class="blog-details__title"> {{ __(@$blog->data_values->title) }} </h3>
                            <p class="blog-details__desc">{{ __(@$blog->data_values->description) }}</p>
                            <div class="quote-text">
                                <p class="quote-text__desc">{{ __(@$blog->data_values->quote) }}</p>
                            </div>
                            <p class="blog-details__desc">{{ __(@$blog->data_values->description) }}</p>

                            <div class="blog-details__share mt-4 d-flex align-items-center flex-wrap">
                                <h5 class="social-share__title mb-0 me-sm-3 me-1 d-inline-block">@lang('Share This')</h5>
                                <ul class="social-list">
                                    <ul class="social-list">
                                        <li class="social-list__item">
                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" class="social-list__link flex-center" target="_blank">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li class="social-list__item">
                                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode(@$blog->data_values->title) }}" class="social-list__link flex-center"
                                                target="_blank">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="social-list__item">
                                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}&title={{ urlencode(@$blog->data_values->title) }}"
                                                class="social-list__link flex-center" target="_blank">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                        </li>
                                        <li class="social-list__item">
                                            <a href="https://pinterest.com/pin/create/button/?url={{ urlencode(url()->current()) }}&media={{ urlencode(frontendImage('blog', @$blog->data_values->image)) }}&description={{ urlencode(@$blog->data_values->title) }}"
                                                class="social-list__link flex-center" target="_blank">
                                                <i class="fab fa-pinterest"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </ul>
                                <div class="fb-comments" data-href="{{ url()->current() }}" data-numposts="5"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <!-- ============================= Blog Details Sidebar Start ======================== -->
                    <section class="blog-sidebar-wrapper">
                        <div class="blog-sidebar">
                            <h5 class="blog-sidebar__title"> @lang('Latest Blog') </h5>
                            @foreach ($latestBlog as $item)
                                <div class="latest-blog">
                                    <div class="latest-blog__thumb">
                                        <a href="{{ route('blog.details', $item->slug) }}"> <img src="{{ frontendImage('blog', $item->data_values->image) }}" class="fit-image" alt=""></a>
                                    </div>
                                    <div class="latest-blog__content">
                                        <h6 class="latest-blog__title"><a href="blog-details.html">{{ __(@$item->data_values->title) }}</a></h6>
                                        <span class="latest-blog__date fs-13">{{ showDateTime($item->data_values->date) }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                    <!-- ============================= Blog Details Sidebar End ======================== -->
                </div>
            </div>
        </div>
    </section>
@endsection

@push('fbComment')
    @php echo loadExtension('fb-comment') @endphp
@endpush
