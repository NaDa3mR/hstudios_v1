<!doctype html>
@include('frontend.main.html')

<head>
    @include('frontend.main.meta')
    <style>
        @media (min-width: 992px) and (max-width: 1199px) {
            .blog-card2 .blog-img img {
                min-height: 320px;
                -o-object-fit: cover;
                object-fit: cover;
            }
        }

        .blog-card2 .blog-img img {
            border-radius: 20px;
            transition: all 0.5s ease-out;
            width: 100%;
            height: 450px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    @include('frontend.main.topbar')
    @include('frontend.sections.blogs.breadcrumb')
    @include('frontend.sections.blogs.ShowBlogs')
    @include('frontend.main.footer')
    @include('frontend.main.scripts')
</body>

</html>
