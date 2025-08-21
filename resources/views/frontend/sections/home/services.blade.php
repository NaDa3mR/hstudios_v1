<!-- home1 Service Section Start -->
<div class="home1-service-section mb-80">
    <div class="container">
        <div class="row mb-50 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
            <div class="col-lg-12">
                <div class="section-title white">
                    <span>Our Solution</span>
                    <h2>Smart Solution</h2>
                    <p>These services can be tailored to meet the specific needs of your clients.</p>
                </div>
            </div>
        </div>
        <div class="row gy-lg-5 gy-4">
            @foreach ( $services as $service )
            <div class="col-xl-3 col-lg-4 col-md-6 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                <div class="service-card magnetic-item fixed-card">
                    <h3><a href="service-details.html">{{$service->name}}</a></h3>
                    <ul>
                        <li><img src="{{ asset('website-assets/img/home1/icon/html-icon.svg') }}" alt=""></li>
                        <li><img src="{{ asset('website-assets/img/home1/icon/react-icon.svg') }}" alt=""></li>
                        <li><img src="{{ asset('website-assets/img/home1/icon/jquiry-icon.svg') }}" alt=""></li>
                        <li><img src="{{ asset('website-assets/img/home1/icon/javascript-icon.svg') }}" alt=""></li>
                    </ul>
                    <p>{{ Str::limit($service->details, 70) }}</p>
                    <a href="{{ route('service.show', $service->id) }}" class="learn-btn">
                        View Details
                        <svg width="9" height="9" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 8L8 1M8 1C6.44444 1.29167 3.04167 1.875 1 1M8 1C7.70833 2.45833 7.125 5.66667 8 8" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
            {{-- <div class="col-xl-3 col-lg-4 col-md-6 wow animate fadeInDown" data-wow-delay="400ms" data-wow-duration="1500ms">
                <div class="service-card magnetic-item">
                    <h3><a href="service-details.html">Design <br>Department</a></h3>
                    <ul>
                        <li><img src="assets/img/home1/icon/figma-icon.svg" alt=""></li>
                        <li><img src="assets/img/home1/icon/xd-icon.svg" alt=""></li>
                        <li><img src="assets/img/home1/icon/zepline-icon.svg" alt=""></li>
                    </ul>
                    <p>Our design team focuses on aesthetics and usability, ensuring your digital products.</p>
                    <a href="service-details.html" class="learn-btn">
                        View Details
                        <svg width="9" height="9" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 8L8 1M8 1C6.44444 1.29167 3.04167 1.875 1 1M8 1C7.70833 2.45833 7.125 5.66667 8 8" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 wow animate fadeInDown" data-wow-delay="600ms" data-wow-duration="1500ms">
                <div class="service-card magnetic-item">
                    <h3><a href="service-details.html">Cloud <br>Solutions</a></h3>
                    <ul>
                        <li><img src="assets/img/home1/icon/python-icon.svg" alt=""></li>
                        <li><img src="assets/img/home1/icon/node-js-icon.svg" alt=""></li>
                        <li><img src="assets/img/home1/icon/d3-js-icon.svg" alt=""></li>
                        <li><img src="assets/img/home1/icon/graphql-icon.svg" alt=""></li>
                    </ul>
                    <p>We offer scalable and secure cloud services that enable your business to operate.</p>
                    <a href="service-details.html" class="learn-btn">
                        View Details
                        <svg width="9" height="9" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 8L8 1M8 1C6.44444 1.29167 3.04167 1.875 1 1M8 1C7.70833 2.45833 7.125 5.66667 8 8" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 wow animate fadeInDown" data-wow-delay="800ms" data-wow-duration="1500ms">
                <div class="service-card magnetic-item">
                    <h3><a href="service-details.html">Data & <br>Analytics</a></h3>
                    <ul>
                        <li><img src="assets/img/home1/icon/python-icon.svg" alt=""></li>
                        <li><img src="assets/img/home1/icon/jquiry-icon.svg" alt=""></li>
                        <li><img src="assets/img/home1/icon/javascript-icon.svg" alt=""></li>
                    </ul>
                    <p>Our data & analytics services help you make informed decisions, optimize operations.</p>
                    <a href="service-details.html" class="learn-btn">
                        View Details
                        <svg width="9" height="9" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 8L8 1M8 1C6.44444 1.29167 3.04167 1.875 1 1M8 1C7.70833 2.45833 7.125 5.66667 8 8" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 wow animate fadeInDown" data-wow-delay="800ms" data-wow-duration="1500ms">
                <div class="service-card magnetic-item">
                    <h3><a href="service-details.html">AI & Machine <br>Learning</a></h3>
                    <ul>
                        <li><img src="assets/img/home1/icon/python-icon.svg" alt=""></li>
                        <li><img src="assets/img/home1/icon/jquiry-icon.svg" alt=""></li>
                        <li><img src="assets/img/home1/icon/javascript-icon.svg" alt=""></li>
                    </ul>
                    <p>We harness the power of AI and machine learning to unlock new opportunities for your business.</p>
                    <a href="service-details.html" class="learn-btn">
                        View Details
                        <svg width="9" height="9" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 8L8 1M8 1C6.44444 1.29167 3.04167 1.875 1 1M8 1C7.70833 2.45833 7.125 5.66667 8 8" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 wow animate fadeInDown" data-wow-delay="600ms" data-wow-duration="1500ms">
                <div class="service-card magnetic-item">
                    <h3><a href="service-details.html">E-commerce <br>Solutions</a></h3>
                    <ul>
                        <li><img src="assets/img/home1/icon/html-icon.svg" alt=""></li>
                        <li><img src="assets/img/home1/icon/javascript-icon.svg" alt=""></li>
                    </ul>
                    <p>We create powerful e-commerce platforms that drive sales & customer engagement.</p>
                    <a href="service-details.html" class="learn-btn">
                        View Details
                        <svg width="9" height="9" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 8L8 1M8 1C6.44444 1.29167 3.04167 1.875 1 1M8 1C7.70833 2.45833 7.125 5.66667 8 8" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 wow animate fadeInDown" data-wow-delay="400ms" data-wow-duration="1500ms">
                <div class="service-card magnetic-item">
                    <h3><a href="service-details.html">IoT <br>Development</a></h3>
                    <ul>
                        <li><img src="assets/img/home1/icon/node-js-icon.svg" alt=""></li>
                        <li><img src="assets/img/home1/icon/python-icon.svg" alt=""></li>
                        <li><img src="assets/img/home1/icon/graphql-icon.svg" alt=""></li>
                    </ul>
                    <p>We provide end-to-end product development services, from ideation to launch.</p>
                    <a href="service-details.html" class="learn-btn">
                        View Details
                        <svg width="9" height="9" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 8L8 1M8 1C6.44444 1.29167 3.04167 1.875 1 1M8 1C7.70833 2.45833 7.125 5.66667 8 8" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                <div class="service-card magnetic-item">
                    <h3><a href="service-details.html">Technical <br>Support</a></h3>
                    <ul>
                        <li><img src="assets/img/home1/icon/support-icon2.svg" alt=""></li>
                        <li><img src="assets/img/home1/icon/support-icon3.svg" alt=""></li>
                        <li><img src="assets/img/home1/icon/support-icon4.svg" alt=""></li>
                    </ul>
                    <p>Our team is always ready to assist with updates, performance optimization.</p>
                    <a href="service-details.html" class="learn-btn">
                        View Details
                        <svg width="9" height="9" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 8L8 1M8 1C6.44444 1.29167 3.04167 1.875 1 1M8 1C7.70833 2.45833 7.125 5.66667 8 8" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                    </a>
                </div>
            </div> --}}
        </div>
    </div>
</div>
<!-- home1 Service Section End -->
