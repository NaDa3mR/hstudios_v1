<!doctype html>
@include('frontend.main.html')

<head>
    @include('frontend.main.meta')

    <style>
        .contact-form-wrap.style-2 {
            background-color: #9f6b5c;
            padding: 65px 85px 70px;

        }
        .contact-form-wrap.style-2 p{
            color: white;
        }
        .contact-form-wrap.style-2 label{
            color: black;
        }
        .contact-form-wrap.style-2 {
            background-color: #9f6b5c;
            padding: 65px 85px 70px;

        }

        .contact-page-top .single-contact .contact-list li .content span {
            color: white;
        }

        .contact-page-top .single-contact a {
            color: white;
        }
    </style>
</head>

<body>
    @include('frontend.main.topbar')
    @include('frontend.sections.contacts.breadcrumb')
    @include('frontend.sections.contacts.ContactForm')
    @include('frontend.main.footer')
    @include('frontend.main.scripts')
</body>

</html>
