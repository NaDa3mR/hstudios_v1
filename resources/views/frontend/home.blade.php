<!doctype html>
@include('frontend.main.html')

<head>
    @include('frontend.main.meta')
    <style>
        .fixed-card {
            width: 320px;
            height: 384.03px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
    </style>
</head>

<body>
    
    @include('frontend.main.topbar')
    @include('frontend.sections.home.banner')
    @include('frontend.sections.home.feature')
    @include('frontend.sections.home.services')
    @include('frontend.sections.home.testmonial')

    @include('frontend.main.footer')
    @include('frontend.main.scripts')
</body>

</html>
