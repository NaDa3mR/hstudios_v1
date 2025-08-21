<!-- News & Insight Page Start -->
<div class="news-insight-page mb-130">
    <div class="container">
        <div class="row gy-5 justify-content-between mb-70">

            <!-- Blog Card 1 -->
           @foreach ($blogs as $blog)
           <div class="col-lg-6 wow animate fadeInDown" data-wow-delay="200ms" data-wow-duration="1500ms">
               <div class="blog-card2">
                    <div class="row align-items-center g-xl-4 g-lg-2 g-md-4 g-sm-3 g-4">
                        <div class="col-lg-6 col-md-5 col-sm-6">
                            <a href="{{ route('blog.showSingle', $blog->id) }}" class="blog-img">
                                <img src="{{ $blog->getFirstMediaUrl('blog_images') }}" alt="Blog Image"
                                >
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-7 col-sm-6">
                            <div class="blog-content-wrap">
                                <ul class="blog-meta">
                                    <li><a href="news-insight-grid.html">{{ $blog->sub_title }}</a></li>
                                    <li>
                                        <img src="{{ asset('website-assets/img/icons/arrow.svg') }}" alt="">
                                    </li>
                                    <li class="blog-date"><a href="news-insight-grid.html">{{$blog->created_at->format('F j, Y')}}</a></li>
                                </ul>
                                <h3><a href="news-insight-details.html">{{ $blog->title }}</a></h3>
                                <a href="{{ route('blog.showSingle', $blog->id) }}" class="primary-btn3 three transparent btn-hover">
                                    Read More
                                    <img src="{{ asset('website-assets/img/icons/btn-arrow.svg') }}" alt="">
                                    <span></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="pagination-area wow animate fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
            <div class="paginations-button">
                @if ($blogs->onFirstPage())
                    <span>Prev</span>
                @else
                    <a href="{{ $blogs->previousPageUrl() }}">Prev</a>
                @endif
            </div>

            <ul class="paginations">
                @for ($page = 1; $page <= $blogs->lastPage(); $page++)
                    <li class="page-item {{ $blogs->currentPage() == $page ? 'active' : '' }}">
                        <a href="{{ $blogs->url($page) }}">{{ str_pad($page, 2, '0', STR_PAD_LEFT) }}</a>
                    </li>
                @endfor
            </ul>

            <div class="paginations-button">
                @if ($blogs->hasMorePages())
                    <a href="{{ $blogs->nextPageUrl() }}">Next</a>
                @else
                    <span>Next</span>
                @endif
            </div>
        </div>



    </div>
</div>
<!-- News & Insight Page End -->
