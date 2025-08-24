<!-- Team Page Start -->
<div class="team-page-content-banner style-3 mb-130">
    <div class="container">
        <div class="banner-wrapper">
            <div class="row gy-4 justify-content-between">
                <div class="col-xl-3 col-lg-4">
                    <h2>Team Philosophy.</h2>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="banner-content">
                        <span>“ We believe in bespoke strategies, designed specifically for your business needs.”</span>
                        <p>We are a close-knit team of digital enthusiasts with a passion for helping brands succeed.
                            Every team member plays a unique role in bringing fresh ideas, innovative strategies, and
                            exceptional results to our clients."</p>
                        <a href="{{ route('career.showAll') }}" class="primary-btn3 two three btn-hover">
                            Join Our Team
                            <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 9L9 1M9 1C7.22222 1.33333 3.33333 2 1 1M9 1C8.66667 2.66667 8 6.33333 9 9"
                                    stroke-width="1.5" stroke-linecap="round"></path>
                            </svg>
                            <span></span>
                        </a>
                    </div>
                </div>
            </div>
            <svg class="vector" width="464" height="232" viewBox="0 0 464 232" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M116 0.5C179.789 0.5 231.5 52.2113 231.5 116C231.5 179.789 179.789 231.5 116 231.5C52.2113 231.5 0.5 179.789 0.5 116C0.5 52.2113 52.2113 0.5 116 0.5ZM232.5 231.499V116V0.501059C296.059 0.770439 347.5 52.3781 347.5 116C347.5 179.622 296.059 231.23 232.5 231.499ZM348.5 0.501059C412.059 0.770439 463.5 52.3781 463.5 116C463.5 179.622 412.059 231.23 348.5 231.499V116V0.501059Z" />
            </svg>
        </div>
        {{-- <div class="team-page-counter-area">
                <div class="row g-4">
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-counter">
                            <div class="number">
                                <h2 class="counter">50</h2>
                                <span>+</span>
                            </div>
                            <span>Professional <br>Expert</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-counter two">
                            <div class="number">
                                <h2 class="counter">145</h2>
                                <span>+</span>
                            </div>
                            <span>Completed <br>Projects</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-counter three">
                            <div class="number">
                                <h2 class="counter">98</h2>
                                <span>%</span>
                            </div>
                            <span>Client <br>Retention Rate</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-counter four">
                            <div class="number">
                                <h2 class="counter">5</h2>
                                <span>+</span>
                            </div>
                            <span>Client <br>Retention Rate</span>
                        </div>
                    </div>
                </div>
            </div> --}}
    </div>
</div>

<div class="team3-card-section mb-130">
    <div class="container">
        <div class="row justify-content-end mb-60 wow animate fadeInDown" data-wow-delay="200ms"
            data-wow-duration="1500ms">
            <div class="col-lg-10 d-flex align-items-lg-end justify-content-between flex-wrap gap-3">
                <div class="section-title three">
                    <h2>We’ve <br> Dynamic Team</h2>
                    <p>To provide most expensive work for our clients in the world-wide.</p>
                </div>
                <a href="career.html" class="primary-btn3 three btn-hover">
                    Join Our Team
                    <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 9L9 1M9 1C7.22222 1.33333 3.33333 2 1 1M9 1C8.66667 2.66667 8 6.33333 9 9"
                            stroke-width="1.5" stroke-linecap="round"></path>
                    </svg>
                    <span></span>
                </a>
            </div>
        </div>
        <div class="row gy-5">
            @foreach ($employees as $employee)
                <div class="col-xl-3 col-lg-4 col-sm-6 wow animate fadeInDown" data-wow-delay="200ms"
                    data-wow-duration="1500ms">
                    <div class="team-card2 two magnetic-item">
                        <div class="team-img">
                            <img src="{{ $employee->getFirstMediaUrl('employee_images') }}" alt="Employee Image">
                            <ul class="social-list">
                                @if ($employee->github)
                                    <li><a href="{{ $employee->github }}"><i class="bx bxl-github"></i></a></li>
                                @endif

                                @if ($employee->linkedin)
                                    <li><a href="{{ $employee->linkedin }}"><i class="bx bxl-linkedin"></i></a></li>
                                @endif

                                @if ($employee->behance)
                                    <li><a href="{{ $employee->behance }}"><i class="bx bxl-behance"></i></a></li>
                                @endif
                            </ul>
                        </div>
                        <div class="team-content">
                            <h5>{{ $employee->name }}</h5>
                            <span>{{ $employee->job }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- <div class="col-xl-3 col-lg-4 col-sm-6 wow animate fadeInDown" data-wow-delay="400ms" data-wow-duration="1500ms">
                    <div class="team-card2 two magnetic-item">
                        <div class="team-img">
                            <a href="team-details.html"><img src="{{ asset('website-assets/img/home4/team-img4.png') }}" alt=""></a>
                            <ul class="social-list">
                                <li><a href="https://www.facebook.com/"><i class="bx bxl-facebook"></i></a></li>
                                <li><a href="https://www.linkedin.com/"><i class="bx bxl-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <div class="team-content">
                            <h5><a href="team-details.html">Mrs. Emily Sophia</a></h5>
                            <span>Sr. Product Designer</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 wow animate fadeInDown" data-wow-delay="600ms" data-wow-duration="1500ms">
                    <div class="team-card2 two magnetic-item">
                        <div class="team-img">
                            <a href="team-details.html"><img src="{{ asset('website-assets/img/innerpages/team-img7.png') }}" alt=""></a>
                            <ul class="social-list">
                                <li><a href="https://www.facebook.com/"><i class="bx bxl-facebook"></i></a></li>
                                <li><a href="https://www.linkedin.com/"><i class="bx bxl-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <div class="team-content">
                            <h5><a href="team-details.html">Ava Sophia</a></h5>
                            <span>Head of Marketing</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 wow animate fadeInDown" data-wow-delay="800ms" data-wow-duration="1500ms">
                    <div class="team-card2 two magnetic-item">
                        <div class="team-img">
                            <a href="team-details.html"><img src="{{ asset('website-assets/img/innerpages/team-img2.png') }}" alt=""></a>
                            <ul class="social-list">
                                <li><a href="https://www.facebook.com/"><i class="bx bxl-facebook"></i></a></li>
                                <li><a href="https://www.linkedin.com/"><i class="bx bxl-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <div class="team-content">
                            <h5><a href="team-details.html">Benjamin Lucas</a></h5>
                            <span>Sr. Software Engineer</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 wow animate fadeInDown" data-wow-delay="800ms" data-wow-duration="1500ms">
                    <div class="team-card2 two magnetic-item">
                        <div class="team-img">
                            <a href="team-details.html"><img src="{{ asset('website-assets/img/innerpages/team-img8.png') }}" alt=""></a>
                            <ul class="social-list">
                                <li><a href="https://www.facebook.com/"><i class="bx bxl-facebook"></i></a></li>
                                <li><a href="https://www.linkedin.com/"><i class="bx bxl-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <div class="team-content">
                            <h5><a href="team-details.html">Robert Jhonson</a></h5>
                            <span>Sr. WordPress Developer</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 wow animate fadeInDown" data-wow-delay="600ms" data-wow-duration="1500ms">
                    <div class="team-card2 two magnetic-item">
                        <div class="team-img">
                            <a href="team-details.html"><img src="{{ asset('website-assets/img/innerpages/team-img11.png') }}" alt=""></a>
                            <ul class="social-list">
                                <li><a href="https://www.facebook.com/"><i class="bx bxl-facebook"></i></a></li>
                                <li><a href="https://www.linkedin.com/"><i class="bx bxl-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <div class="team-content">
                            <h5><a href="team-details.html">Alexander Benjamin</a></h5>
                            <span>Sr. Software Engineer</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 wow animate fadeInDown" data-wow-delay="400ms" data-wow-duration="1500ms">
                    <div class="team-card2 two magnetic-item">
                        <div class="team-img">
                            <a href="team-details.html"><img src="{{ asset('website-assets/img/innerpages/team-img5.png') }}" alt=""></a>
                            <ul class="social-list">
                                <li><a href="https://www.facebook.com/"><i class="bx bxl-facebook"></i></a></li>
                                <li><a href="https://www.linkedin.com/"><i class="bx bxl-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <div class="team-content">
                            <h5><a href="team-details.html">Lucy Zoe</a></h5>
                            <span>Developer</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <div class="team-card2 two magnetic-item">
                        <div class="team-img">
                            <a href="team-details.html"><img src="{{ asset('website-assets/img/innerpages/team-img9.png') }}" alt=""></a>
                            <ul class="social-list">
                                <li><a href="https://www.facebook.com/"><i class="bx bxl-facebook"></i></a></li>
                                <li><a href="https://www.linkedin.com/"><i class="bx bxl-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <div class="team-content">
                            <h5><a href="team-details.html">Oliver Liam</a></h5>
                            <span>Developer</span>
                        </div>
                    </div>
                </div> --}}
        </div>
    </div>
</div>

<div class="partner-area three four mb-130">
    <div class="container">
        <div class="partner-title-area wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
            <h6>Our Globally <span>20K+</span> Clients.</h6>
            <h6>Our Happy Cleints <span>90%+</span></h6>
        </div>
        <div class="partner-wrap">
            <div class="marquee light">
                <div class="marquee__group">
                    <a href="#"><img src="{{ asset('website-assets/img/home1/partner-01.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('website-assets/img/home1/partner-02.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('website-assets/img/home1/partner-03.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('website-assets/img/home1/partner-04.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('website-assets/img/home1/partner-05.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('website-assets/img/home1/partner-06.png') }}" alt=""></a>
                </div>
                <div aria-hidden="true" class="marquee__group">
                    <a href="#"><img src="{{ asset('website-assets/img/home1/partner-01.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('website-assets/img/home1/partner-02.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('website-assets/img/home1/partner-03.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('website-assets/img/home1/partner-04.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('website-assets/img/home1/partner-05.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('website-assets/img/home1/partner-06.png') }}" alt=""></a>
                </div>
            </div>
            <div class="marquee dark">
                <div class="marquee__group">
                    <a href="#"><img src="{{ asset('website-assets/img/home1/partner-light-01.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('website-assets/img/home1/partner-light-02.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('website-assets/img/home1/partner-light-03.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('website-assets/img/home1/partner-light-04.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('website-assets/img/home1/partner-light-05.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('website-assets/img/home1/partner-light-06.png') }}" alt=""></a>
                </div>
                <div aria-hidden="true" class="marquee__group">
                    <a href="#"><img src="{{ asset('website-assets/img/home1/partner-light-01.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('website-assets/img/home1/partner-light-02.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('website-assets/img/home1/partner-light-03.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('website-assets/img/home1/partner-light-04.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('website-assets/img/home1/partner-light-05.png') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('website-assets/img/home1/partner-light-06.png') }}" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="team-page-gallery-section mb-130">
    <div class="container">
        <div class="row g-2">
            <div class="col-lg-3 wow animate fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                <div class="section-title three white">
                    <h2>Candid Frame</h2>
                    <p>“ We believe in bespoke strategies, designed specifically for your business needs.”</p>
                </div>
            </div>
            <div class="col-lg-5 col-md-6 d-flex align-items-md-end">
                <div class="row g-2">
                    <div class="col-md-12 col-sm-6 d-flex justify-content-md-end">
                        <a data-fancybox="gallery-01" href="{{ asset('website-assets/img/innerpages/team-page-gallery-img1-big.jpg') }}">
                            <img src="{{ asset('website-assets/img/innerpages/team-page-gallery-img1.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="col-md-12 col-sm-6 d-flex justify-content-md-end">
                        <a data-fancybox="gallery-01" href="{{ asset('website-assets/img/innerpages/team-page-gallery-img2-big.jpg') }}">
                            <img src="{{ asset('website-assets/img/innerpages/team-page-gallery-img2.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="col-md-12 col-sm-6 d-flex align-items-center justify-content-md-end gap-5">
                        <svg width="80" height="60" viewBox="0 0 80 60" xmlns="http://www.w3.org/2000/svg">
                            <path d="M80 0.90918V59.091H0L80 0.90918Z" />
                            <path d="M54.5454 8.18164L9.09082 40.9089V8.18164H54.5454Z" />
                        </svg>
                        <a data-fancybox="gallery-01" href="{{ asset('website-assets/img/innerpages/team-page-gallery-img3-big.jpg') }}">
                            <img src="{{ asset('website-assets/img/innerpages/team-page-gallery-img3.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="col-md-12 col-sm-6 d-md-none d-block">
                        <a data-fancybox="gallery-01" href="{{ asset('website-assets/img/innerpages/team-page-gallery-img5-big.jpg') }}">
                            <img src="{{ asset('website-assets/img/innerpages/team-page-gallery-img5.jpg') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="row g-2">
                    <div class="col-md-12 col-sm-6 d-flex align-items-md-end gap-2">
                        <a data-fancybox="gallery-01" href="{{ asset('website-assets/img/innerpages/team-page-gallery-img4-big.jpg') }}">
                            <img src="{{ asset('website-assets/img/innerpages/team-page-gallery-img4.jpg') }}" alt="">
                        </a>
                        <a class="d-md-block d-none" data-fancybox="gallery-01"
                            href="{{ asset('website-assets/img/innerpages/team-page-gallery-img5-big.jpg') }}">
                            <img src="{{ asset('website-assets/img/innerpages/team-page-gallery-img5.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="col-md-12 col-sm-6">
                        <a data-fancybox="gallery-01" href="{{ asset('website-assets/img/innerpages/team-page-gallery-img6-big.jpg') }}">
                            <img src="{{ asset('website-assets/img/innerpages/team-page-gallery-img6.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="col-lg-12">
                        <div class="content">
                            <h6>“ Candid or fun time has increased work flow to indivudual or Team-up, So let’s cheer up
                                every moment ”</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <img src="{{ asset('website-assets/img/innerpages/team-page-gallery-section-bg.png') }}" alt="" class="shape">
</div>

<div class="team-join-section mb-130">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-md-10">
                <div class="team-join-wrap">
                    <div class="section-title three text-center wow animate fadeInDown" data-wow-delay="200ms"
                        data-wow-duration="1500ms">
                        <h2>Join Our Team!</h2>
                        <p>We’re always on the lookout for passionate, creative, and talented individuals to join our
                            dynamic team.</p>
                    </div>
                    <svg width="6" height="170" viewBox="0 0 6 170" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M3.5 5L5.88675 0H0.113249L2.5 5H3.5ZM3 170L5.88675 165H0.113249L3 170ZM2.5 4.5V165.5H3.5V4.5H2.5Z" />
                        <path d="M3 90V115" stroke="url(#paint0_linear_6965_68)" stroke-width="2"
                            stroke-linecap="round" />
                        <defs>
                            <linearGradient id="paint0_linear_6965_68" x1="3" y1="110" x2="3"
                                y2="90.5" gradientUnits="userSpaceOnUse">
                                <stop offset="0" stop-color="#5956E9" />
                                <stop offset="1" stop-color="#EEEEEE" />
                            </linearGradient>
                        </defs>
                    </svg>
                    <div class="btn-area wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <a href="{{ route('career.showAll') }}" class="primary-btn3 three btn-hover">
                            Join Our Team
                            <svg width="10" height="10" viewBox="0 0 10 10"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 9L9 1M9 1C7.22222 1.33333 3.33333 2 1 1M9 1C8.66667 2.66667 8 6.33333 9 9"
                                    stroke-width="1.5" stroke-linecap="round"></path>
                            </svg>
                            <span></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team Page End -->

<!-- home3 Scroll Text Section Start -->
<div class="home3-scroll-text-area">
    <div class="scroll-text">
        <a href="{{ route('contact.create') }}">
            Contact
            <svg width="33" height="33" viewBox="0 0 33 33" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 31L30 3M30 3C23.7778 4.16667 10.1667 6.5 2 3M30 3C28.8333 8.83333 26.5 21.6667 30 31"
                    stroke-width="4" stroke-linecap="round" />
            </svg>
        </a>
        <svg width="50" height="50" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M24.1624 12.3939L25 13.6783L25.8376 12.3939L31.633 3.50696L31.3462 14.3464L31.307 15.8289L32.6961 15.3096L42.4498 11.6632L36.083 20.3473L35.2536 21.4786L36.5936 21.8938L46.6206 25L36.5936 28.1062L35.2536 28.5214L36.083 29.6527L42.4498 38.3368L32.6961 34.6904L31.307 34.1711L31.3462 35.6536L31.633 46.493L25.8376 37.6061L25 36.3217L24.1624 37.6061L18.367 46.493L18.6538 35.6536L18.693 34.1703L17.3035 34.6906L7.56551 38.3368L13.9176 29.6518L14.7448 28.5208L13.4064 28.1062L3.37938 25L13.4064 21.8938L14.7448 21.4791L13.9176 20.3482L7.56551 11.6632L17.3035 15.3094L18.693 15.8297L18.6538 14.3464L18.367 3.50697L24.1624 12.3939Z"
                stroke-width="2" />
        </svg>
        <a href="{{ route('contact.create') }}">
            Contact
            <svg width="33" height="33" viewBox="0 0 33 33" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 31L30 3M30 3C23.7778 4.16667 10.1667 6.5 2 3M30 3C28.8333 8.83333 26.5 21.6667 30 31"
                    stroke-width="4" stroke-linecap="round" />
            </svg>
        </a>
        <svg width="50" height="50" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M24.1624 12.3939L25 13.6783L25.8376 12.3939L31.633 3.50696L31.3462 14.3464L31.307 15.8289L32.6961 15.3096L42.4498 11.6632L36.083 20.3473L35.2536 21.4786L36.5936 21.8938L46.6206 25L36.5936 28.1062L35.2536 28.5214L36.083 29.6527L42.4498 38.3368L32.6961 34.6904L31.307 34.1711L31.3462 35.6536L31.633 46.493L25.8376 37.6061L25 36.3217L24.1624 37.6061L18.367 46.493L18.6538 35.6536L18.693 34.1703L17.3035 34.6906L7.56551 38.3368L13.9176 29.6518L14.7448 28.5208L13.4064 28.1062L3.37938 25L13.4064 21.8938L14.7448 21.4791L13.9176 20.3482L7.56551 11.6632L17.3035 15.3094L18.693 15.8297L18.6538 14.3464L18.367 3.50697L24.1624 12.3939Z"
                stroke-width="2" />
        </svg>
        <a href="{{ route('contact.create') }}">
            Contact
            <svg width="33" height="33" viewBox="0 0 33 33" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 31L30 3M30 3C23.7778 4.16667 10.1667 6.5 2 3M30 3C28.8333 8.83333 26.5 21.6667 30 31"
                    stroke-width="4" stroke-linecap="round" />
            </svg>
        </a>
        <svg width="50" height="50" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M24.1624 12.3939L25 13.6783L25.8376 12.3939L31.633 3.50696L31.3462 14.3464L31.307 15.8289L32.6961 15.3096L42.4498 11.6632L36.083 20.3473L35.2536 21.4786L36.5936 21.8938L46.6206 25L36.5936 28.1062L35.2536 28.5214L36.083 29.6527L42.4498 38.3368L32.6961 34.6904L31.307 34.1711L31.3462 35.6536L31.633 46.493L25.8376 37.6061L25 36.3217L24.1624 37.6061L18.367 46.493L18.6538 35.6536L18.693 34.1703L17.3035 34.6906L7.56551 38.3368L13.9176 29.6518L14.7448 28.5208L13.4064 28.1062L3.37938 25L13.4064 21.8938L14.7448 21.4791L13.9176 20.3482L7.56551 11.6632L17.3035 15.3094L18.693 15.8297L18.6538 14.3464L18.367 3.50697L24.1624 12.3939Z"
                stroke-width="2" />
        </svg>
        <a href="{{ route('contact.create') }}">
            Contact
            <svg width="33" height="33" viewBox="0 0 33 33" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 31L30 3M30 3C23.7778 4.16667 10.1667 6.5 2 3M30 3C28.8333 8.83333 26.5 21.6667 30 31"
                    stroke-width="4" stroke-linecap="round" />
            </svg>
        </a>
        <svg width="50" height="50" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M24.1624 12.3939L25 13.6783L25.8376 12.3939L31.633 3.50696L31.3462 14.3464L31.307 15.8289L32.6961 15.3096L42.4498 11.6632L36.083 20.3473L35.2536 21.4786L36.5936 21.8938L46.6206 25L36.5936 28.1062L35.2536 28.5214L36.083 29.6527L42.4498 38.3368L32.6961 34.6904L31.307 34.1711L31.3462 35.6536L31.633 46.493L25.8376 37.6061L25 36.3217L24.1624 37.6061L18.367 46.493L18.6538 35.6536L18.693 34.1703L17.3035 34.6906L7.56551 38.3368L13.9176 29.6518L14.7448 28.5208L13.4064 28.1062L3.37938 25L13.4064 21.8938L14.7448 21.4791L13.9176 20.3482L7.56551 11.6632L17.3035 15.3094L18.693 15.8297L18.6538 14.3464L18.367 3.50697L24.1624 12.3939Z"
                stroke-width="2" />
        </svg>
    </div>
    <div aria-hidden="true" class="scroll-text">
        <a href="{{ route('contact.create') }}">
            Contact
            <svg width="33" height="33" viewBox="0 0 33 33" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 31L30 3M30 3C23.7778 4.16667 10.1667 6.5 2 3M30 3C28.8333 8.83333 26.5 21.6667 30 31"
                    stroke-width="4" stroke-linecap="round" />
            </svg>
        </a>
        <svg width="50" height="50" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M24.1624 12.3939L25 13.6783L25.8376 12.3939L31.633 3.50696L31.3462 14.3464L31.307 15.8289L32.6961 15.3096L42.4498 11.6632L36.083 20.3473L35.2536 21.4786L36.5936 21.8938L46.6206 25L36.5936 28.1062L35.2536 28.5214L36.083 29.6527L42.4498 38.3368L32.6961 34.6904L31.307 34.1711L31.3462 35.6536L31.633 46.493L25.8376 37.6061L25 36.3217L24.1624 37.6061L18.367 46.493L18.6538 35.6536L18.693 34.1703L17.3035 34.6906L7.56551 38.3368L13.9176 29.6518L14.7448 28.5208L13.4064 28.1062L3.37938 25L13.4064 21.8938L14.7448 21.4791L13.9176 20.3482L7.56551 11.6632L17.3035 15.3094L18.693 15.8297L18.6538 14.3464L18.367 3.50697L24.1624 12.3939Z"
                stroke-width="2" />
        </svg>
        <a href="{{ route('contact.create') }}">
            Contact
            <svg width="33" height="33" viewBox="0 0 33 33" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 31L30 3M30 3C23.7778 4.16667 10.1667 6.5 2 3M30 3C28.8333 8.83333 26.5 21.6667 30 31"
                    stroke-width="4" stroke-linecap="round" />
            </svg>
        </a>
        <svg width="50" height="50" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M24.1624 12.3939L25 13.6783L25.8376 12.3939L31.633 3.50696L31.3462 14.3464L31.307 15.8289L32.6961 15.3096L42.4498 11.6632L36.083 20.3473L35.2536 21.4786L36.5936 21.8938L46.6206 25L36.5936 28.1062L35.2536 28.5214L36.083 29.6527L42.4498 38.3368L32.6961 34.6904L31.307 34.1711L31.3462 35.6536L31.633 46.493L25.8376 37.6061L25 36.3217L24.1624 37.6061L18.367 46.493L18.6538 35.6536L18.693 34.1703L17.3035 34.6906L7.56551 38.3368L13.9176 29.6518L14.7448 28.5208L13.4064 28.1062L3.37938 25L13.4064 21.8938L14.7448 21.4791L13.9176 20.3482L7.56551 11.6632L17.3035 15.3094L18.693 15.8297L18.6538 14.3464L18.367 3.50697L24.1624 12.3939Z"
                stroke-width="2" />
        </svg>
        <a href="{{ route('contact.create') }}">
            Contact
            <svg width="33" height="33" viewBox="0 0 33 33" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 31L30 3M30 3C23.7778 4.16667 10.1667 6.5 2 3M30 3C28.8333 8.83333 26.5 21.6667 30 31"
                    stroke-width="4" stroke-linecap="round" />
            </svg>
        </a>
        <svg width="50" height="50" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M24.1624 12.3939L25 13.6783L25.8376 12.3939L31.633 3.50696L31.3462 14.3464L31.307 15.8289L32.6961 15.3096L42.4498 11.6632L36.083 20.3473L35.2536 21.4786L36.5936 21.8938L46.6206 25L36.5936 28.1062L35.2536 28.5214L36.083 29.6527L42.4498 38.3368L32.6961 34.6904L31.307 34.1711L31.3462 35.6536L31.633 46.493L25.8376 37.6061L25 36.3217L24.1624 37.6061L18.367 46.493L18.6538 35.6536L18.693 34.1703L17.3035 34.6906L7.56551 38.3368L13.9176 29.6518L14.7448 28.5208L13.4064 28.1062L3.37938 25L13.4064 21.8938L14.7448 21.4791L13.9176 20.3482L7.56551 11.6632L17.3035 15.3094L18.693 15.8297L18.6538 14.3464L18.367 3.50697L24.1624 12.3939Z"
                stroke-width="2" />
        </svg>
        <a href="{{ route('contact.create') }}">
            Contact
            <svg width="33" height="33" viewBox="0 0 33 33" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 31L30 3M30 3C23.7778 4.16667 10.1667 6.5 2 3M30 3C28.8333 8.83333 26.5 21.6667 30 31"
                    stroke-width="4" stroke-linecap="round" />
            </svg>
        </a>
        <svg width="50" height="50" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M24.1624 12.3939L25 13.6783L25.8376 12.3939L31.633 3.50696L31.3462 14.3464L31.307 15.8289L32.6961 15.3096L42.4498 11.6632L36.083 20.3473L35.2536 21.4786L36.5936 21.8938L46.6206 25L36.5936 28.1062L35.2536 28.5214L36.083 29.6527L42.4498 38.3368L32.6961 34.6904L31.307 34.1711L31.3462 35.6536L31.633 46.493L25.8376 37.6061L25 36.3217L24.1624 37.6061L18.367 46.493L18.6538 35.6536L18.693 34.1703L17.3035 34.6906L7.56551 38.3368L13.9176 29.6518L14.7448 28.5208L13.4064 28.1062L3.37938 25L13.4064 21.8938L14.7448 21.4791L13.9176 20.3482L7.56551 11.6632L17.3035 15.3094L18.693 15.8297L18.6538 14.3464L18.367 3.50697L24.1624 12.3939Z"
                stroke-width="2" />
        </svg>
    </div>
</div>
<!-- home3 Scroll Text Section End -->
