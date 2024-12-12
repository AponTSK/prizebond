@php
    $content = getContent('footer.content', true);
    $socialElements = getContent('social_icon.element', false);
    $policyPages = getContent('policy_pages.element', false, orderById: true);
@endphp

<footer class="footer-area section-bg">
    <div class="py-60">
        <div class="container">
            <div class="row justify-content-center gy-5">
                <div class="col-xl-5 col-sm-6 col-xsm-6">
                    <div class="footer-item footer-item-frist-child">
                        <div class="footer-item__logo">
                            <a class="navbar-brand logo" href="{{ route('home') }}"><img src="{{ sitelogo('dark') }}" alt="" /></a>
                        </div>
                        <p class="footer-item__desc mb-3">
                            {{ __(@$content->data_values->title) }}
                        </p>
                        <div class="cta-form">
                            <form class="cta__subscribe">
                                @csrf
                                <div class="input-group form-group">
                                    <input type="email" class="form-control form--control email" placeholder="@lang('Enter your email')" />
                                    <button class="btn btn--base">@lang('Submit')</button>
                                </div>
                                <p class="fs-12 text-white">
                                    {{ __(@$communityContent->data_values->subtitle) }}
                                </p>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 col-sm-6 col-xsm-6">
                    <div class="footer-item">
                        <h5 class="footer-item__title">@lang('About Us')</h5>
                        <ul class="footer-menu">
                            <li class="footer-menu__item">
                                <a href="{{ route('contact') }}" class="footer-menu__link">@lang('Contact Us')</a>
                            </li>
                            <li class="footer-menu__item">
                                <a href="#" class="footer-menu__link">@lang('Lottery Result')</a>
                            </li>
                            <li class="footer-menu__item">
                                <a href="#" class="footer-menu__link">@lang('Support')</a>
                            </li>
                            <li class="footer-menu__item">
                                <a href="#" class="footer-menu__link">@lang('About Us')</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 col-xsm-6">
                    <div class="footer-item">
                        <h5 class="footer-item__title">@lang('Follow Us')</h5>
                        <ul class="footer-menu footer-contact-icon">
                            @foreach ($socialElements->reverse() as $socialElement)
                                <li class="footer-menu__item">
                                    <a href="{{ @$socialElement->data_values->url }}" class="footer-menu__link" target="_blank">
                                        @php
                                            echo @$socialElement->data_values->social_icon;
                                        @endphp
                                        {{ __(@$socialElement->data_values->title) }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Top End-->
    <div class="container">
        <!-- bottom Footer -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row gy-3">
                    <div class="col-lg-6">
                        <p class="fs-14 text-lg-start text-center text--black">
                            @lang(' © 2023 Relume. All rights reserved.')
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <div class="footer-bottom__menu justify-content-md-center">
                            <ul>
                                @foreach ($policyPages as $policy)
                                    <li>
                                        <a href="{{ route('policy.pages', $policy->slug) }}">
                                            {{ __($policy->data_values->title) }} |
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

@push('script')
    <script>
        $(document).ready(function() {
            $('.cta__subscribe').on('submit', function(e) {
                e.preventDefault();
                // var email = $('.email').val();
                var email = $(this).find('input[type="email"]').val();
                var token = $('input[name="_token"]').val();
                $.ajax({
                    type: "post",
                    url: "{{ route('subscriber.store') }}",
                    data: {
                        email: email,
                        _token: token
                    },
                    success: function(response) {
                        if (response.success) {
                            $('form').trigger('reset');
                            notify('success', 'Subcribed Successfully');

                        } else {
                            notify('error', response.error);
                        }

                    }
                });
            })
        });
    </script>
@endpush
