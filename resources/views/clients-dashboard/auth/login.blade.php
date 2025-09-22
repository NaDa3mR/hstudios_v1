<!doctype html>
@include('frontend.main.html')

<head>
    @include('frontend.main.meta')

    <style>
        .mx-md-5 {
        margin-right: 450px !important;
        margin-left: 450px !important;
    }
    .text-center{
        margin-bottom: 10px !important;
    }
    .mb-5 {
    margin-bottom: 23px !important;
}
.mb-4 {
    margin-bottom: 14px !important;
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
          background-color: #f0f8ff;
          ">
            <div class="card-body py-5 px-md-5">

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="fw-bold mb-3">Sign Up</h2>
                        <form action="{{ route('client.login') }}" method="POST">
                            @csrf
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row">
                                <div class="form-outline mb-4 mx-auto" style="max-width: 600px;">
                                    <label  for="email">Email</label>
                                    <input type="email" id="email" class="form-control" name="email"/>
                                  </div>

                                  <div class="form-outline mb-4 mx-auto" style="max-width: 600px;">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" id="password" class="form-control" name="password"/>
                                  </div>


                                {{-- <div data-mdb-input-init class="form-outline mb-6">
                                    <input type="email" id="email" class="form-control" />
                                    <label class="form-label" for="email">Email</label>
                                  </div>
                                  <div data-mdb-input-init class="form-outline mb-6">
                                    <input type="password" id="password" class="form-control" />
                                    <label class="form-label" for="password">Password</label>
                                  </div> --}}

                            </div>
                            <div class="text-center">
                            <button type="submit" class="primary-btn3 btn-hover" style="background-color:#8b422e">
                                Submit Now
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
                                Don't have an account?
                                <a href="{{ route('client.register') }}" class="hover:text-blue-500" >Register</a>
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
