<!doctype html>
@include('frontend.main.html')

<head>
    @include('frontend.main.meta')
</head>

<body>
    @include('frontend.main.topbar')


    <div class="contact-form-area mb-130">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10">
                    <div class="contact-form-wrap style-2">
                        <div class="section-title three text-center">
                            <h2>Collaborate with Us!</h2>
                            <p>We’re excited to hear from you! Whether you have a question about our services, want to
                                discuss a new project.</p>
                        </div>
                        <svg class="divider" height="6" viewBox="0 0 696 6" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5 2.5L0 0.113249V5.88675L5 3.5V2.5ZM691 3.5L696 5.88675V0.113249L691 2.5V3.5ZM4.5 3.5H691.5V2.5H4.5V3.5Z" />
                        </svg>
                        <form action="{{ route('client.register') }}" method="POST">
                            @csrf
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="form-inner">
                                        <label>Full Name</label>
                                        <input type="text" placeholder="Mr. Daniel" name="name">
                                        @error('name')
                                            <p class="text-red-500 text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inner">
                                        <label>Email</label>
                                        <input type="email" placeholder="info@example.com" name="email">
                                        @error('email')
                                            <p class="text-red-500 text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inner">
                                        <label>Password</label>
                                        <input type="password" placeholder="password" name="password">
                                        @error('password')
                                            <p class="text-red-500 text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inner">
                                        <label>Confirm Password</label>
                                        <input type="password" placeholder="password" name="password_confirmation">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inner">
                                        <label>Company Name</label>
                                        <input type="text" placeholder="company name" name="company_name">
                                        @error('company_name')
                                            <p class="text-red-500 text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-inner">
                                        <label>Company Field</label>
                                        <input type="text" placeholder="company field" name="company_field">
                                        @error('company_field')
                                            <p class="text-red-500 text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="primary-btn3 btn-hover">
                                Submit Now
                                <svg width="10" height="10" viewBox="0 0 10 10"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1 9L9 1M9 1C7.22222 1.33333 3.33333 2 1 1M9 1C8.66667 2.66667 8 6.33333 9 9"
                                        stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                                <span></span>
                            </button>
                            <p class="primary-btn3 btn-hover">
                                Already have an account?
                                <a href="{{ route('client.login') }}" class="text-blue-500">Login</a>
                                <svg width="10" height="10" viewBox="0 0 10 10"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1 9L9 1M9 1C7.22222 1.33333 3.33333 2 1 1M9 1C8.66667 2.66667 8 6.33333 9 9"
                                        stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                                <span></span>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('frontend.main.footer')
    @include('frontend.main.scripts')
</body>

</html>
