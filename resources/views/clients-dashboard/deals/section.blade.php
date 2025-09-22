<!doctype html>
@include('clients-dashboard.main.html')

<head>
    @include('clients-dashboard.main.meta')

    <style>
        .mx-md-5 {
            margin-right: 450px !important;
            margin-left: 450px !important;
        }
        .text-center {
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
    <!-- Section: Deal Info -->
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
                        <h2 class="fw-bold mb-3">Deal Information</h2>

                        <!-- Deal Info -->
                        <div class="form-outline mb-4 mx-auto text-start" style="max-width: 600px;">
                            <label class="form-label fw-bold">Deal Title</label>
                            <p>{{ $deal->name ?? 'Sample Deal Title' }}</p>
                        </div>

                        <div class="form-outline mb-4 mx-auto text-start" style="max-width: 600px;">
                            <label class="form-label fw-bold">Description</label>
                            <p>{{ $deal->details ?? 'Short description about the deal goes here.' }}</p>
                        </div>

                        <div class="form-outline mb-4 mx-auto text-start" style="max-width: 600px;">
                            <label class="form-label fw-bold">Price</label>
                            <p>{{ $deal->price ?? '$1000' }}</p>
                        </div>

                        <div class="form-outline mb-4 mx-auto text-start" style="max-width: 600px;">
                            <label class="form-label fw-bold">Status</label>
                            <p>{{ $deal->status ?? 'Active' }}</p>
                        </div>

                        <!-- Buttons -->
                        <div class="text-center mt-4">
                            <a href="{{ route('deals.edit', $deal->id ?? 1) }}" class="primary-btn3 btn-hover" style="background-color:#8b422e; padding:10px 20px; color:#fff; border-radius:6px; text-decoration:none;">
                                Edit Deal
                            </a>
                            <a href="{{ route('deals.index') }}" class="btn btn-link mx-2">Back to Deals</a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
</body>
</html>
