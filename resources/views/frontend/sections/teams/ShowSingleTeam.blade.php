<!doctype html>
@include('frontend.main.html')

<head>
    @include('frontend.main.meta')
</head>

<body>
    @include('frontend.main.topbar')


    <!-- Service Details Page Start -->
    <div class="service-details-page mb-130">
        <div class="container">
            <div class="details-content-wrap mb-130">
                <div class="post-thumb mb-70">
                    <div class="swiper service-details-post-slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="{{ asset('website-assets/img/innerpages/service-details-thumb-img1.jpg') }}"
                                    alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('website-assets/img/innerpages/service-details-thumb-img2.jpg') }}"
                                    alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ asset('website-assets/img/innerpages/service-details-thumb-img3.jpg') }}"
                                    alt="">
                            </div>
                        </div>
                    </div>
                    <div class="slider-btn-grp">
                        <div class="slider-btn post-slider-prev">
                            <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <path
                                        d="M11.002 13.0005C10.002 10.5005 5.00195 8.00049 2.00195 7.00049C5.00195 6.00049 9.50195 4.50049 11.002 1.00049"
                                        stroke-width="1.5" stroke-linecap="round" />
                                </g>
                            </svg>
                        </div>
                        <div class="slider-btn post-slider-next">
                            <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <path
                                        d="M2.99805 13.0005C3.99805 10.5005 8.99805 8.00049 11.998 7.00049C8.99805 6.00049 4.49805 4.50049 2.99805 1.00049"
                                        stroke-width="1.5" stroke-linecap="round" />
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-10">
                        <div class="post-title-and-tag">
                            <h2>{{ $service->name }}</h2>
                            <svg class="divider-line" width="873" height="6" viewBox="0 0 873 6"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5 2.5L0 0.113249V5.88675L5 3.5V2.5ZM867.5 3.5L872.5 5.88675V0.113249L867.5 2.5V3.5ZM4.5 3.5H868V2.5H4.5V3.5Z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="row gy-4 justify-content-between mb-70">
                    <div class="col-xl-5 col-lg-6">
                        <h2>{{ $service->title }}</h2>
                        <span class="line-break"></span>
                        <p>{{ $service->details }}</p>
                        {{-- <span class="line-break"></span>
                    <p>This milestone is a testament to the hard work, creativity, and dedication of our incredible team and the unwavering support from our clients and partners. We are grateful for the trust placed in us and the collaborative efforts that have fueled our success.</p> --}}
                    </div>
                </div>
                <div class="img-grp">
                    <div class="row g-4">
                        <div class="col-lg-4 col-md-5">
                            <img src="{{ asset('website-assets/img/innerpages/news-insight-details-img1.jpg') }}"
                                alt="">
                        </div>
                        <div class="col-lg-8 col-md-7">
                            <img src="{{ asset('website-assets/img/innerpages/news-insight-details-img2.jpg') }}"
                                alt="">
                        </div>
                    </div>
                </div>
                <span class="line-break"></span>
                <span class="line-break"></span>
                <span class="line-break"></span>
                <h2>Why Choose Us?</h2>
                <span class="line-break"></span>
                <p class="fixed-width">Present measurable results achieved after the project launch. This section should
                    be data-driven to show the impact of your work, such as:</p>
                <span class="line-break"></span>
                <span class="line-break"></span>
                <div class="row g-4">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-service two">
                            <h5><span>1.</span> Expert Team</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-service">
                            <h5><span>2.</span> Tailored Solutions</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-service three">
                            <h5><span>3.</span> SEO Optimize Focused</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-service">
                            <h5><span>4.</span> Ongoing Support</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-service">
                            <h5><span>5.</span> ROI on digital ad spend</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-service four">
                            <h5><span>6.</span> Target Client Satisfaction</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-service">
                            <h5><span>7.</span> On-time Delivery</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 d-flex align-items-center justify-content-sm-center">
                        <a href="{{ route('contact.create') }}" class="contact-btn">
                            Start The Journey
                            <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 9L9 1M9 1C7.22222 1.33333 3.33333 2 1 1M9 1C8.66667 2.66667 8 6.33333 9 9"
                                    stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </a>
                    </div>
                </div>
                <span class="line-break"></span>
                <span class="line-break"></span>
                <span class="line-break"></span>
                <div class="img-grp">
                    <div class="row g-4">
                        <div class="col-lg-8 col-md-7">
                            <img src="{{ asset('website-assets/img/innerpages/service-details-img1.jpg') }}"
                                alt="">
                        </div>
                        <div class="col-lg-4 col-md-5">
                            <img src="{{ asset('website-assets/img/innerpages/service-details-img2.jpg') }}"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="details-pagination two">

                        {{-- Previous Service --}}
                        @if ($previous)
                            <div class="single-pagination">
                                <a class="pagination-btn" href="{{ route('service.show', $previous->id) }}">
                                    <img src="{{ asset('website-assets/img/innerpages/details-pagination-btn-bg1.png') }}"
                                        alt="">
                                    <div class="btn-content">
                                        <svg width="7" height="14" viewBox="0 0 8 13"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0 6.50008L8 0L2.90909 6.50008L8 13L0 6.50008Z"></path>
                                        </svg>
                                        Prev
                                    </div>
                                </a>
                                <div class="content">
                                    <h6>
                                        <a href="{{ route('service.show', $previous->id) }}">
                                            {{ $previous->title }}
                                        </a>
                                    </h6>
                                </div>
                            </div>
                        @endif

                        {{-- Next Service --}}
                        @if ($next)
                            <div class="single-pagination two text-end">
                                <div class="content">
                                    <h6>
                                        <a href="{{ route('service.show', $next->id) }}">
                                            {{ $next->title }}
                                        </a>
                                    </h6>
                                </div>
                                <a class="pagination-btn" href="{{ route('service.show', $next->id) }}">
                                    <img src="{{ asset('website-assets/img/innerpages/details-pagination-btn-bg2.png') }}"
                                        alt="">
                                    <div class="btn-content">
                                        Next
                                        <svg width="7" height="14" viewBox="0 0 8 13"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 6.50008L0 0L5.09091 6.50008L0 13L8 6.50008Z"></path>
                                        </svg>
                                    </div>
                                </a>
                            </div>
                        @endif

                        <svg class="divider-line" width="6" height="88" viewBox="0 0 6 88"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M3.5 5L5.88675 0H0.113249L2.5 5H3.5ZM2.5 83L0.113249 88H5.88675L3.5 83H2.5ZM2.5 4.5V83.5H3.5V4.5H2.5Z" />
                        </svg>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Service Details Page End -->
    @include('frontend.main.footer')
</body>

</html>
