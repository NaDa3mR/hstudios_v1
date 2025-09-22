<!doctype html>
@include('frontend.main.html')

<head>
    @include('frontend.main.meta')

    <style>
    .mx-md-5 {
        margin-right: 250px !important;
        margin-left: 250px !important;
        margin-bottom: 40px !important;
    }
    .text-center{
        margin-bottom: 10px !important;
    }
    </style>

</head>

<body>

    <!-- Section: Design Block -->
    <section class="text-center">
        <!-- Background image -->
        <div class="p-5 bg-image"
            style="
          background-image: url('{{ asset('website-assets/img/innerpages/team-page-banner-img.jpg') }}');
          height: 300px;
          ">
        </div>
        <!-- Background image -->

        <div class="card mx-4 mx-md-5 shadow-5-strong bg-body-tertiary"
            style="
          margin-top: -100px;
          backdrop-filter: blur(30px);
          background-color: #f8fbfe;
          ">
            <div class="card-body py-5 px-md-5">

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        {{-- <img src="{{ asset('website-assets/favicon.png') }}" alt="Logo" width="90" height="70"> --}}
                        <h2 class="fw-bold mb-5">Register Now</h2>
                        <form action="{{ route('client.register') }}" method="POST">
                            @csrf
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div data-mdb-input-init class="form-outline">
                                        <label class="form-label" for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control">
                                        @error('name')
                                            <p class="text-red-500 text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div data-mdb-input-init class="form-outline">
                                        <label class="form-label" for="email">email</label>
                                        <input type="email" name="email" id="email" class="form-control">
                                        @error('email')
                                            <p class="text-red-500 text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label" for="password">Password</label>
                                    <div data-mdb-input-init class="form-outline">
                                        <input type="password" name="password" id="password" class="form-control">
                                        @error('password')
                                            <p class="text-red-500 text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label" for="password">Confirm Password</label>
                                    <div data-mdb-input-init class="form-outline">
                                        <input type="password" name="password_confirmation" id="password" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div data-mdb-input-init class="form-outline">
                                        <label class="form-label" for="company_name">Company Name</label>
                                        <input type="text" name="company_name" id="company_name"
                                            class="form-control">
                                        @error('company_name')
                                            <p class="text-red-500 text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div data-mdb-input-init class="form-outline">
                                        <label class="form-label" for="company_field">Company Field</label>
                                        <input type="text" name="company_field" id="company_field"
                                            class="form-control">
                                        @error('company_field')
                                            <p class="text-red-500 text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="text-center">
                            <button type="submit" class="primary-btn3 btn-hover" style="background-color:#8b422e">
                                Register!
                                {{-- <svg width="10" height="10" viewBox="0 0 10 10"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1 9L9 1M9 1C7.22222 1.33333 3.33333 2 1 1M9 1C8.66667 2.66667 8 6.33333 9 9"
                                        stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                                <span></span> --}}
                            </button>
                        </div>
                            <p>
                                Already have an account?
                                <a href="{{ route('client.login') }}" class="hover:text-blue-500" >Login</a>
                                {{-- <svg width="10" height="20" viewBox="0 0 10 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1 9L9 1M9 1C7.22222 1.33333 3.33333 2 1 1M9 1C8.66667 2.66667 8 6.33333 9 9"
                                        stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                                <span></span> --}}
                            </p>

                            <!-- Submit button -->
                            {{-- <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-block mb-4" style="background-color: #8b422e; color: #f0f8ff;">
                Submit
              </button>

               <div class="text-center">
                <p>Already have an account?<a href="{{ route('client.login') }}" class="btn text-500 mx-1">
                    Login
                </a></p>
                <a href="{{ route('client.login') }}" class="btn text-500 mx-1">
                    Login
                </a>
            </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
<!-- Section: Design Block -->
