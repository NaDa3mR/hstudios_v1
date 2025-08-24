<!doctype html>
@include('frontend.main.html')

<head>
    @include('frontend.main.meta')
</head>

<body>
    @include('frontend.main.topbar')
    
    @include('frontend.sections.projects.breadcrumb')
    @include('frontend.sections.projects.ShowProjects')
    @include('frontend.main.footer')
    @include('frontend.main.scripts')
</body>

</html>
