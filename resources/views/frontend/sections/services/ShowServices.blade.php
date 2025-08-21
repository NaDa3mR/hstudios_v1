<!-- Service Page Banner Start -->
<div class="service-page-banner-section mb-130">
    <div class="container">
        <div class="banner-img-wrap">
            <div class="banner-img">
                <img src="assets/img/innerpages/service-page-banner-img2.jpg" alt="">
            </div>
            <div class="counter-wrap">
                <div class="counter-area">
                    <div class="counter-content">
                        <div class="number">
                            <h2 class="counter">145</h2>
                            <span>+</span>
                        </div>
                        <p>Completed <br> Projects</p>
                    </div>
                </div>
                <div class="counter-area two">
                    <div class="counter-content">
                        <div class="number">
                            <h2 class="counter">98</h2>
                            <span>%</span>
                        </div>
                        <p>Client <br> Retention Rate</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service Page Banner End -->

<!-- Service2 Page Start -->
<div class="service2-page mb-130">
    <div class="container">
        <div class="row justify-content-center mb-70">
            <div class="col-lg-6">
                <div class="section-title2">
                    <div class="shape-and-title-area">
                        <svg width="88" height="64" viewBox="0 0 88 64" xmlns="http://www.w3.org/2000/svg">
                            <path d="M88 0V64H0L88 0Z"/>
                            <path d="M60 8L10 44V8H60Z"/>
                        </svg>
                        <h2>Our Goal, Our Achievements</h2>
                    </div>
                    <p>We believe in bespoke strategies, designed specifically for your business needs.</p>
                </div>
            </div>
        </div>
        <div class="row g-4">
            @foreach($services as $service)
            <div class="col-lg-4 col-md-6 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                <div class="service-card4 magnetic-item">
                    <div class="icon">
                        <svg width="80" height="80" viewBox="0 0 80 80" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M39.6207 77.7142C39.4779 77.7127 39.3376 77.6766 39.2118 77.6089L6.1861 59.888C6.04348 59.8114 5.92429 59.6977 5.8412 59.5588C5.75811 59.4199 5.71423 59.2611 5.71423 59.0993V22.0448C5.71423 21.8829 5.75811 21.7241 5.8412 21.5852C5.92429 21.4464 6.04348 21.3326 6.1861 21.2561L39.212 3.53492C39.3425 3.46519 39.4883 3.42871 39.6363 3.42871C39.7842 3.42871 39.93 3.46519 40.0605 3.53492L73.0862 21.2561C73.2288 21.3326 73.348 21.4464 73.4311 21.5852C73.5142 21.7241 73.5581 21.8829 73.5581 22.0448V59.0993C73.5581 59.2611 73.5142 59.4199 73.4311 59.5588C73.348 59.6977 73.2288 59.8114 73.0862 59.888L40.0603 77.6089C39.9253 77.6814 39.7738 77.7176 39.6207 77.7142ZM18.9305 40.572L39.6361 75.0814L60.3416 40.572L39.6361 6.06268L18.9305 40.572ZM61.8922 41.4671L42.0743 74.4969L71.7678 58.5639V41.4671H61.8922ZM7.5043 58.5639L37.198 74.4969L17.3801 41.4671H7.5043V58.5639ZM61.8922 39.677H71.7678V22.5802L42.0743 6.64714L61.8922 39.677ZM7.5043 39.677H17.3799L37.198 6.64714L7.5043 22.5802V39.677Z"/>
                        </svg>
                    </div>
                    <h4>
                        <a href="{{ route('service.show', $service->id) }}">
                            {{ $service->title }}
                        </a>
                    </h4>
                    <p>{{ Str::limit($service->details, 100) }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Service2 Page End -->

<!-- home3 Partner Section Start -->
<div class="partner-area three mb-130">
    <div class="container">
        <div class="partner-title-area wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
            <h6>Our Globally <span>20K+</span> Clients.</h6>
            <h6>Our Happy Cleints <span>90%+</span></h6>
        </div>
        <div class="partner-wrap">
            <div class="marquee light">
                <div class="marquee__group">
                    <a href="#"><img src="assets/img/home1/partner-01.png" alt=""></a>
                    <a href="#"><img src="assets/img/home1/partner-02.png" alt=""></a>
                    <a href="#"><img src="assets/img/home1/partner-03.png" alt=""></a>
                    <a href="#"><img src="assets/img/home1/partner-04.png" alt=""></a>
                    <a href="#"><img src="assets/img/home1/partner-05.png" alt=""></a>
                    <a href="#"><img src="assets/img/home1/partner-06.png" alt=""></a>
                </div>
                <div aria-hidden="true" class="marquee__group">
                    <a href="#"><img src="assets/img/home1/partner-01.png" alt=""></a>
                    <a href="#"><img src="assets/img/home1/partner-02.png" alt=""></a>
                    <a href="#"><img src="assets/img/home1/partner-03.png" alt=""></a>
                    <a href="#"><img src="assets/img/home1/partner-04.png" alt=""></a>
                    <a href="#"><img src="assets/img/home1/partner-05.png" alt=""></a>
                    <a href="#"><img src="assets/img/home1/partner-06.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- home3 Partner Section End -->
