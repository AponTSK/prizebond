@php
    $blogContent = getContent('blog.content', true);
    $blogElements = getContent('blog.element');
@endphp

@extends($activeTemplate . 'layouts.frontend')
@section('content')
    <section class="breadcrumb py-120 bg-img" data-background-image="assets/images/thumbs/breadcump.png">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb__wrapper">
                        <h4 class="breadcrumb__title"> Blog Details</h4>
                        <ul class="breadcrumb__list">
                            <li class="breadcrumb__item"><a href="index.html" class="breadcrumb__link"> <i class="las la-home"></i> Home</a> </li>
                            <li class="breadcrumb__item"><i class="fas fa-arrow-right"></i></li>
                            <li class="breadcrumb__item"> <span class="breadcrumb__item-text"> Blog Details </span> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-detials py-120">
        <div class="container">
            <div class="row gy-5 justify-content-center">
                <div class="col-xl-9 col-lg-8">
                    <div class="blog-details">
                        <div class="blog-details__thumb">
                            <img src="assets/images/thumbs/blog2.png" class="fit-image" alt="">
                        </div>
                        <div class="blog-details__content">
                            <span class="blog-item__date mb-2"><span class="blog-item__date-icon"><i class="las la-clock"></i></span> 26 June, 2022</span>
                            <h3 class="blog-details__title"> What Is Cryptocurrency Mining? </h3>
                            <p class="blog-details__desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis atque excepturi cupiditate soluta nisi aperiam illum maxime dolorum. Impedit, quibusdam. Lorem ipsum
                                dolor sit amet consectetur adipisicing elit. Quis atque excepturi cupiditate soluta nisi aperiam illum maxime dolorum. Impedit, quibipsum dolor sit amet consectetur adipisicing elit. Quis
                                atque excepturi cupiditate soluta nisi aperiam illum maxime dolorum. Impedit, quibusdam. Lorem ipsum orem ipsum dolor sit amet consectetur adipisicing elit. Quis atque excepturi cupiditate
                                soluta nisi aperiam illum maxime dolorum. Impedit, quibusdam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis atque excepturi cupiditate soluta nisi aperiam illum maxime dolorum.
                                Impedit, quibusdam.</p>
                            <div class="quote-text">
                                <p class="quote-text__desc">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quod quibusdam ea aut officiis iure officia nostrum quas, molestias minus. Molestiae blanditiis doloribus
                                    dolor vel ex quibusdam, explicabo distinctio tenetur nam nostrum corrupti vero, pariatur consectetur eveniet odio aliquid quos fuga nihil deserunt! Corporis quisquam, magnam doloremque
                                    fugit quasi, quae quo totam error sunt, ab nostrum similique velit laudantium iure quas.</p>
                            </div>
                            <p class="blog-details__desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis atque excepturi cupiditate soluta nisi aperiam illum maxime dolorum. Impedit, quiLorem ipsum dolor sit
                                amet consectetur adipisicing elit. Quis atque excepturi cupiditate soluta nisi aperiam illum maxime dolorum. Impedit, quibusdam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis
                                atque excepturi cupiditate soluta nisi aperiam illum maxime dolorum. Impedit, quibusdam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis atque excepturi cupiditate soluta nisi
                                aperiam illum maxime dolorum. Impedit, quibusdam. >Lorem it. Quis atque excepturi cupiditate soluta nisi aperiam illum maxime dolorum. Impedit, quibusdam. Lorem ipsum dolor sit amet
                                consectetur adipisicing elit. Quis atque excepturi cupiditate soluta nisi aperiam illum maxime dolorum. Impedit, quibusdam.</p>

                            <div class="blog-details__share mt-4 d-flex align-items-center flex-wrap">
                                <h5 class="social-share__title mb-0 me-sm-3 me-1 d-inline-block">Share This</h5>
                                <ul class="social-list">
                                    <li class="social-list__item"><a href="https://www.facebook.com" class="social-list__link flex-center"><i class="fab fa-facebook-f"></i></a> </li>
                                    <li class="social-list__item"><a href="https://www.twitter.com" class="social-list__link flex-center active"> <i class="fab fa-twitter"></i></a></li>
                                    <li class="social-list__item"><a href="https://www.linkedin.com" class="social-list__link flex-center"> <i class="fab fa-linkedin-in"></i></a></li>
                                    <li class="social-list__item"><a href="https://www.pinterest.com" class="social-list__link flex-center"> <i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <!-- ============================= Blog Details Sidebar Start ======================== -->
                    <section class="blog-sidebar-wrapper">
                        <div class="blog-sidebar">
                            <h5 class="blog-sidebar__title"> Latest Blog </h5>
                            <div class="latest-blog">
                                <div class="latest-blog__thumb">
                                    <a href="blog-details.html"> <img src="assets/images/thumbs/blog1.png" class="fit-image" alt=""></a>
                                </div>
                                <div class="latest-blog__content">
                                    <h6 class="latest-blog__title"><a href="blog-details.html">Lorem ipsum dolor sit amet.</a></h6>
                                    <span class="latest-blog__date fs-13">June 23 202</span>
                                </div>
                            </div>
                            <div class="latest-blog">
                                <div class="latest-blog__thumb">
                                    <a href="blog-details.html"> <img src="assets/images/thumbs/blog2.png" class="fit-image" alt=""></a>
                                </div>
                                <div class="latest-blog__content">
                                    <h6 class="latest-blog__title"><a href="blog-details.html">Lorem ipsum dolor sit amet.</a></h6>
                                    <span class="latest-blog__date fs-13">June 23 202</span>
                                </div>
                            </div>
                            <div class="latest-blog">
                                <div class="latest-blog__thumb">
                                    <a href="blog-details.html"> <img src="assets/images/thumbs/blog3.png" class="fit-image" alt=""></a>
                                </div>
                                <div class="latest-blog__content">
                                    <h6 class="latest-blog__title"><a href="blog-details.html">Lorem ipsum dolor sit amet.</a></h6>
                                    <span class="latest-blog__date fs-13">June 23 202</span>
                                </div>
                            </div>
                            <div class="latest-blog">
                                <div class="latest-blog__thumb">
                                    <a href="blog-details.html"> <img src="assets/images/thumbs/blog3.png" class="fit-image" alt=""></a>
                                </div>
                                <div class="latest-blog__content">
                                    <h6 class="latest-blog__title"><a href="blog-details.html">Lorem ipsum dolor sit amet.</a></h6>
                                    <span class="latest-blog__date fs-13">June 23 202</span>
                                </div>
                            </div>
                            <div class="latest-blog">
                                <div class="latest-blog__thumb">
                                    <a href="blog-details.html"> <img src="assets/images/thumbs/blog3.png" class="fit-image" alt=""></a>
                                </div>
                                <div class="latest-blog__content">
                                    <h6 class="latest-blog__title"><a href="blog-details.html">Lorem ipsum dolor sit amet.</a></h6>
                                    <span class="latest-blog__date fs-13">June 23 202</span>
                                </div>
                            </div>
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
