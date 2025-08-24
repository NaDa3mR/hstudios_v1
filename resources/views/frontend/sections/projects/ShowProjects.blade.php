 <!-- Case Study Page Start -->
 @php
    $images = [
        1 => 'website-assets/img/innerpages/case-study-img1.jpg',
        2 => 'website-assets/img/innerpages/case-study-img2.jpg',
        3 => 'website-assets/img/innerpages/case-study-img3.jpg',
        4 => 'website-assets/img/innerpages/case-study-img4.jpg',
        5 => 'website-assets/img/innerpages/case-study-img6.jpg',
    ];
@endphp


 <div class="case-study-page mb-130">
     <div class="container">
         <div class="row gy-5 justify-content-between mb-70">
            @foreach ($projects as $project)
            <div class="col-xl-4 col-md-6 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
                <div class="case-study-card2 three magnetic-item">
                    <a href="{{ route('projects.show', $project) }}" class="case-study-img">
                        {{-- <img src="{{  asset('website-assets/img/innerpages/case-study-img1.jpg')  }}" alt=""> --}}
                        <img src="{{ asset($images[$project->id] ?? 'website-assets/img/default.jpg') }}" alt="{{ $project->name }}">
                    </a>
                    <div class="case-study-content-wrap">
                        <div class="case-study-content">
                            {{-- <div class="case-study-logo">
                                <img src="assets/img/home4/case-study-logo1.png" alt="" class="light">
                                <img src="assets/img/home4/case-study-logo1-light.png" alt="" class="dark">
                            </div> --}}
                            <h4><a href="{{ route('projects.show', $project) }}">{{$project->name}}</a></h4>
                            <p>{{ $project->content }}</p>
                        </div>
                        <div class="deatails-btn">
                            <a href="{{ route('projects.show', $project) }}" class="primary-btn4 transparent">
                                <span class="icon">
                                    <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 9L9 1M9 1C7.22222 1.33333 3.33333 2 1 1M9 1C8.66667 2.66667 8 6.33333 9 9" stroke-width="1.5" stroke-linecap="round" />
                                    </svg>
                                </span>
                                <span class="content">Read Case Study</span>
                                <span class="icon two">
                                    <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 9L9 1M9 1C7.22222 1.33333 3.33333 2 1 1M9 1C8.66667 2.66667 8 6.33333 9 9" stroke-width="1.5" stroke-linecap="round" />
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- <div class="col-xl-4 col-md-6 wow animate fadeInDown" data-wow-delay="400ms" data-wow-duration="1500ms">
                <div class="case-study-card2 three magnetic-item">
                    <a href="case-study-details.html" class="case-study-img">
                        <img src="assets/img/innerpages/case-study-img2.jpg" alt="">
                    </a>
                    <div class="case-study-content-wrap">
                        <div class="case-study-content">
                            <div class="case-study-logo">
                                <img src="assets/img/home4/case-study-logo2.png" alt="" class="light">
                                <img src="assets/img/home4/case-study-logo2-light.png" alt="" class="dark">
                            </div>
                            <h4><a href="case-study-details.html">Crafting a Unique Visual Identity for DEF Tech.</a></h4>
                            <ul>
                                <li>
                                    <h6>
                                        <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                            <g mask="url(#mask0_1535_152744)">
                                                <path d="M1 10V0L9 5L1 10Z"/>
                                            </g>
                                        </svg>
                                        Organic Traffic
                                    </h6>
                                    <div class="counter-area">
                                        <h5 class="counter">600</h5>
                                        <span>%</span>
                                    </div>
                                </li>
                                <li>
                                    <h6>
                                        <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                            <g mask="url(#mask0_1535_152744)">
                                                <path d="M1 10V0L9 5L1 10Z"/>
                                            </g>
                                        </svg>
                                        Online Revenue
                                    </h6>
                                    <div class="counter-area">
                                        <h5 class="counter">9</h5>
                                        <span>M+</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="deatails-btn">
                            <a href="case-study-details.html" class="primary-btn4 transparent">
                                <span class="icon">
                                    <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 9L9 1M9 1C7.22222 1.33333 3.33333 2 1 1M9 1C8.66667 2.66667 8 6.33333 9 9" stroke-width="1.5" stroke-linecap="round" />
                                    </svg>
                                </span>
                                <span class="content">Read Case Study</span>
                                <span class="icon two">
                                    <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 9L9 1M9 1C7.22222 1.33333 3.33333 2 1 1M9 1C8.66667 2.66667 8 6.33333 9 9" stroke-width="1.5" stroke-linecap="round" />
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 wow animate fadeInDown" data-wow-delay="600ms" data-wow-duration="1500ms">
                <div class="case-study-card2 three magnetic-item">
                    <a href="case-study-details.html" class="case-study-img">
                        <img src="assets/img/innerpages/case-study-img3.jpg" alt="">
                    </a>
                    <div class="case-study-content-wrap">
                        <div class="case-study-content">
                            <div class="case-study-logo">
                                <img src="assets/img/innerpages/case-study-logo1.png" alt="" class="light">
                                <img src="assets/img/innerpages/case-study-logo1-light.png" alt="" class="dark">
                            </div>
                            <h4><a href="case-study-details.html">Success case on upgrading brand identity.</a></h4>
                            <ul>
                                <li>
                                    <h6>
                                        <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                            <g mask="url(#mask0_1535_152744)">
                                                <path d="M1 10V0L9 5L1 10Z"/>
                                            </g>
                                        </svg>
                                        Organic Traffic
                                    </h6>
                                    <div class="counter-area">
                                        <h5 class="counter">400</h5>
                                        <span>%</span>
                                    </div>
                                </li>
                                <li>
                                    <h6>
                                        <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                            <g mask="url(#mask0_1535_152744)">
                                                <path d="M1 10V0L9 5L1 10Z"/>
                                            </g>
                                        </svg>
                                        Online Revenue
                                    </h6>
                                    <div class="counter-area">
                                        <h5 class="counter">8</h5>
                                        <span>M+</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="deatails-btn">
                            <a href="case-study-details.html" class="primary-btn4 transparent">
                                <span class="icon">
                                    <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 9L9 1M9 1C7.22222 1.33333 3.33333 2 1 1M9 1C8.66667 2.66667 8 6.33333 9 9" stroke-width="1.5" stroke-linecap="round" />
                                    </svg>
                                </span>
                                <span class="content">Read Case Study</span>
                                <span class="icon two">
                                    <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 9L9 1M9 1C7.22222 1.33333 3.33333 2 1 1M9 1C8.66667 2.66667 8 6.33333 9 9" stroke-width="1.5" stroke-linecap="round" />
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 wow animate fadeInDown" data-wow-delay="800ms" data-wow-duration="1500ms">
                <div class="case-study-card2 three magnetic-item">
                    <a href="case-study-details.html" class="case-study-img">
                        <img src="assets/img/innerpages/case-study-img4.jpg" alt="">
                    </a>
                    <div class="case-study-content-wrap">
                        <div class="case-study-content">
                            <div class="case-study-logo">
                                <img src="assets/img/innerpages/case-study-logo2.png" alt="" class="light">
                                <img src="assets/img/innerpages/case-study-logo2-light.png" alt="" class="dark">
                            </div>
                            <h4><a href="case-study-details.html">Boosting Conversions with a Responsive Website.</a></h4>
                            <ul>
                                <li>
                                    <h6>
                                        <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                            <g mask="url(#mask0_1535_152744)">
                                                <path d="M1 10V0L9 5L1 10Z"/>
                                            </g>
                                        </svg>
                                        Organic Traffic
                                    </h6>
                                    <div class="counter-area">
                                        <h5 class="counter">700</h5>
                                        <span>%</span>
                                    </div>
                                </li>
                                <li>
                                    <h6>
                                        <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                            <g mask="url(#mask0_1535_152744)">
                                                <path d="M1 10V0L9 5L1 10Z"/>
                                            </g>
                                        </svg>
                                        Online Revenue
                                    </h6>
                                    <div class="counter-area">
                                        <h5 class="counter">12</h5>
                                        <span>M+</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="deatails-btn">
                            <a href="case-study-details.html" class="primary-btn4 transparent">
                                <span class="icon">
                                    <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 9L9 1M9 1C7.22222 1.33333 3.33333 2 1 1M9 1C8.66667 2.66667 8 6.33333 9 9" stroke-width="1.5" stroke-linecap="round" />
                                    </svg>
                                </span>
                                <span class="content">Read Case Study</span>
                                <span class="icon two">
                                    <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 9L9 1M9 1C7.22222 1.33333 3.33333 2 1 1M9 1C8.66667 2.66667 8 6.33333 9 9" stroke-width="1.5" stroke-linecap="round" />
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 wow animate fadeInDown" data-wow-delay="600ms" data-wow-duration="1500ms">
                <div class="case-study-card2 three magnetic-item">
                    <a href="case-study-details.html" class="case-study-img">
                        <img src="assets/img/innerpages/case-study-img5.jpg" alt="">
                    </a>
                    <div class="case-study-content-wrap">
                        <div class="case-study-content">
                            <div class="case-study-logo">
                                <img src="assets/img/innerpages/case-study-logo3.png" alt="" class="light">
                                <img src="assets/img/innerpages/case-study-logo3-light.png" alt="" class="dark">
                            </div>
                            <h4><a href="case-study-details.html">Crafting a Seamless Digital Presence for DEF Tech.</a></h4>
                            <ul>
                                <li>
                                    <h6>
                                        <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                            <g mask="url(#mask0_1535_152744)">
                                                <path d="M1 10V0L9 5L1 10Z"/>
                                            </g>
                                        </svg>
                                        Organic Traffic
                                    </h6>
                                    <div class="counter-area">
                                        <h5 class="counter">800</h5>
                                        <span>%</span>
                                    </div>
                                </li>
                                <li>
                                    <h6>
                                        <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                            <g mask="url(#mask0_1535_152744)">
                                                <path d="M1 10V0L9 5L1 10Z"/>
                                            </g>
                                        </svg>
                                        Online Revenue
                                    </h6>
                                    <div class="counter-area">
                                        <h5 class="counter">13</h5>
                                        <span>M+</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="deatails-btn">
                            <a href="case-study-details.html" class="primary-btn4 transparent">
                                <span class="icon">
                                    <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 9L9 1M9 1C7.22222 1.33333 3.33333 2 1 1M9 1C8.66667 2.66667 8 6.33333 9 9" stroke-width="1.5" stroke-linecap="round" />
                                    </svg>
                                </span>
                                <span class="content">Read Case Study</span>
                                <span class="icon two">
                                    <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 9L9 1M9 1C7.22222 1.33333 3.33333 2 1 1M9 1C8.66667 2.66667 8 6.33333 9 9" stroke-width="1.5" stroke-linecap="round" />
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 wow animate fadeInDown" data-wow-delay="400ms" data-wow-duration="1500ms">
                <div class="case-study-card2 three magnetic-item">
                    <a href="case-study-details.html" class="case-study-img">
                        <img src="assets/img/innerpages/case-study-img6.jpg" alt="">
                    </a>
                    <div class="case-study-content-wrap">
                        <div class="case-study-content">
                            <div class="case-study-logo">
                                <img src="assets/img/home4/case-study-logo1.png" alt="" class="light">
                                <img src="assets/img/home4/case-study-logo1-light.png" alt="" class="dark">
                            </div>
                            <h4><a href="case-study-details.html">Increasing Lead Generation Through Campaigns.</a></h4>
                            <ul>
                                <li>
                                    <h6>
                                        <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                            <g mask="url(#mask0_1535_152744)">
                                                <path d="M1 10V0L9 5L1 10Z"/>
                                            </g>
                                        </svg>
                                        Organic Traffic
                                    </h6>
                                    <div class="counter-area">
                                        <h5 class="counter">600</h5>
                                        <span>%</span>
                                    </div>
                                </li>
                                <li>
                                    <h6>
                                        <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                            <g mask="url(#mask0_1535_152744)">
                                                <path d="M1 10V0L9 5L1 10Z"/>
                                            </g>
                                        </svg>
                                        Online Revenue
                                    </h6>
                                    <div class="counter-area">
                                        <h5 class="counter">7</h5>
                                        <span>M+</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="deatails-btn">
                            <a href="case-study-details.html" class="primary-btn4 transparent">
                                <span class="icon">
                                    <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 9L9 1M9 1C7.22222 1.33333 3.33333 2 1 1M9 1C8.66667 2.66667 8 6.33333 9 9" stroke-width="1.5" stroke-linecap="round" />
                                    </svg>
                                </span>
                                <span class="content">Read Case Study</span>
                                <span class="icon two">
                                    <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 9L9 1M9 1C7.22222 1.33333 3.33333 2 1 1M9 1C8.66667 2.66667 8 6.33333 9 9" stroke-width="1.5" stroke-linecap="round" />
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>


        <div class="pagination-area wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
            <div class="paginations-button">
                @if ($projects->onFirstPage())
                    <span class="disabled">
                        <svg width="10" height="10" ...></svg> Prev
                    </span>
                @else
                    <a href="{{ $projects->previousPageUrl() }}">
                        <svg width="10" height="10" ...></svg> Prev
                    </a>
                @endif
            </div>

            <ul class="paginations">
                @foreach ($projects->getUrlRange(1, $projects->lastPage()) as $page => $url)
                    <li class="page-item {{ $page == $projects->currentPage() ? 'active' : '' }}">
                        <a href="{{ $url }}">{{ str_pad($page, 2, '0', STR_PAD_LEFT) }}</a>
                    </li>
                @endforeach
            </ul>

            <div class="paginations-button">
                @if ($projects->hasMorePages())
                    <a href="{{ $projects->nextPageUrl() }}">
                        Next <svg width="10" height="10" ...></svg>
                    </a>
                @else
                    <span class="disabled">
                        Next <svg width="10" height="10" ...></svg>
                    </span>
                @endif
            </div>
        </div>
        {{-- <div class="pagination-area wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
            <div class="paginations-button">
                <a href="#">
                    <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                        <g>
                            <path
                                d="M7.86133 9.28516C7.14704 7.49944 3.57561 5.71373 1.43276 4.99944C3.57561 4.28516 6.7899 3.21373 7.86133 0.713728" stroke-width="1.5" stroke-linecap="round" />
                        </g>
                    </svg>
                    Prev
                </a>
            </div>
            <ul class="paginations">
                <li class="page-item active">
                    <a href="#">01</a>
                </li>
                <li class="page-item">
                    <a href="#">02</a>
                </li>
                <li class="page-item">
                    <a href="#">03</a>
                </li>
                <li class="page-item">
                    <a href="#">04</a>
                </li>
            </ul>
            <div class="paginations-button">
                <a href="#">
                    Next
                    <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                        <g>
                            <path
                                d="M1.42969 9.28613C2.14397 7.50042 5.7154 5.7147 7.85826 5.00042C5.7154 4.28613 2.50112 3.21471 1.42969 0.714705" stroke-width="1.5" stroke-linecap="round" />
                        </g>
                    </svg>
                </a>
            </div>
        </div> --}}
    </div>
</div>
<!-- Case Study Page End -->
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
