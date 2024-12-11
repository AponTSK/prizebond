@php
    $communityContent = getContent('community.content', true);
@endphp

<section class="cta-area pt-80 pb-160">
    <div class="container">
        <div class="cta-area-wrapper bg-img py-60" data-background-image="{{ frontendImage('community', @$communityContent->data_values->background_image) }}">
            <img class="cta-left d-none d-lg-block" src="{{ frontendImage('community', @$communityContent->data_values->left_image) }}" alt="img" />
            <img class="cta-right d-none d-lg-block" src="{{ frontendImage('community', @$communityContent->data_values->right_image) }}" alt="img" />

            <div class="row justify-content-center">
                <div class="col-lg-6 col-sm-10">
                    <div class="cta-content text-center">
                        <h3 class="cta-content__title text-white">
                            {{ __(@$communityContent->data_values->heading) }}
                        </h3>
                        <p class="cta-content__sub-title mb-4 text-white">
                            {{ __(@$communityContent->data_values->subheading) }}
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
            </div>
        </div>
    </div>
</section>
