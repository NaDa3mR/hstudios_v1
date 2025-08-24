<!doctype html>
@include('frontend.main.html')

<head>
    @include('frontend.main.meta')
</head>

<body>
    @include('frontend.main.topbar')
    @foreach ($pages as $page)
        @include('frontend.sections.pages.topbar')
        @include('frontend.sections.pages.content')
    @endforeach
    @include('frontend.main.footer')
    @include('frontend.main.scripts')
</body>

</html>
