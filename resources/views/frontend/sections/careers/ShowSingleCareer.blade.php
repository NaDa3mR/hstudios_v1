<!doctype html>
@include('frontend.main.html')

<head>
    @include('frontend.main.meta')
</head>

<body>
    @include('frontend.main.topbar')



    <!-- Breadcrumb Section Start -->
    <div class="breadcrumb-section mb-130">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="banner-content">
                        <h1>Hiring of <br> {{ $career->title }}</h1>
                        <ul class="breadcrumb-list">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li>
                                <svg width="25" height="6" viewBox="0 0 25 6" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5 2.5L0 0.113249V5.88675L5 3.5V2.5ZM20 3.5L25 5.88675V0.113249L20 2.5V3.5ZM4.5 3.5H20.5V2.5H4.5V3.5Z" />
                                </svg>
                                Career Details
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Modal -->
    <div class="modal fade job-form-modal" id="exampleModal{{ $career->id }}" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">Apply to the position of
                        {{ $career->title }}</h2>
                </div>
                <button type="button" class="modal-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-lg"></i>
                </button>
                <div class="modal-body">
                    <form action="{{ route('application.storeNew') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="single-info mb-50">
                            <h4 class="info-title">Personal Info</h4>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="form-inner">
                                        <label>First Name</label>
                                        <input type="text" name="first_name" placeholder="Mr. Daniel Scoot"
                                            aria-autocomplete="list" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inner">
                                        <label>Last Name</label>
                                        <input type="text" name="last_name" placeholder="Mr. Daniel Scoot"
                                            aria-autocomplete="list" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inner">
                                        <label>Your Email*</label>
                                        <input type="email" name="email" placeholder="info@example.com" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inner">
                                        <label>Phone Number</label>
                                        <input type="text" name="phone" placeholder="+20- 5566 **** ****" required>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-info mb-50">
                            <h5 class="info-title">Career Info</h5>
                            <div class="row g-4">
                                {{-- <div class="col-md-6">
                                    <div class="form-inner">
                                        <label for="career_id">Career</label>
                                        <select name="career_id" id="career_id" class="form-select" required>
                                            <option value="" disabled selected>Select career</option>
                                            @foreach ($careers as $career)
                                                <option value="{{ $career->id }}">{{ $career->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}
                                <input id="id" type="hidden" name="career_id" class="form-control"
                                    value="{{ $career->id }}">
                                <div class="col-md-6">
                                    <div class="form-inner">
                                        <label>Career</label>
                                        <input type="text" value="{{ $career->title }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inner">
                                        <label for="country">Country</label>
                                        <select name="country" id="country" class="form-select" required>
                                            <option value="" disabled selected>Select country</option>
                                            <option value="Egypt">Egypt</option>
                                            <option value="United States">United States</option>
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="Canada">Canada</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inner">
                                        <label>City</label>
                                        <select name="city" id="city" class="form-select" required>
                                            <option value="" disabled selected>Select city</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inner">
                                        <label>LinkedIn</label>
                                        <input type="text" name="linkedin" id="linkedin" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inner">
                                        <label>GitHub</label>
                                        <input type="text" name="github" id="github">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inner">
                                        <label>Behance</label>
                                        <input type="text" name="behance" id="behance">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single-info mb-50">
                            <h5 class="info-title">Key Documents</h5>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-inner mb-25">
                                        <label>Upload Your CV*</label>
                                        <div class="file-upload-area">
                                            <div class="icon">
                                                <img src="{{ asset('website-assets/img/innerpages/icon/pdf-icon.svg') }}"
                                                    alt="">
                                            </div>
                                            <input type="file" name="cv" accept=".pdf,.doc,.docx"
                                                class="custom-upload">
                                            <div class="check-icon">
                                                <i class="bi bi-check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-inner mb-25">
                                        <label>Upload Your image*</label>
                                        <div class="file-upload-area">
                                            {{-- <div class="icon">
                                                <img src="{{ asset('website-assets/img/innerpages/icon/pdf-icon.svg') }}" alt="">
                                            </div> --}}
                                            <input type="file" name="image" id="image" accept="image/*"
                                                class="custom-upload">
                                            <div class="check-icon">
                                                <i class="bi bi-check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-inner">
                            <button class="primary-btn3 three btn-hover" type="submit">
                                Apply Position
                                <svg width="10" height="10" viewBox="0 0 10 10"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1 9L9 1M9 1C7.22222 1.33333 3.33333 2 1 1M9 1C8.66667 2.66667 8 6.33333 9 9"
                                        stroke-width="1.5" stroke-linecap="round"></path>
                                </svg>
                                <span></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Career Details Page Start -->
    <div class="career-details-page mb-130">
        <div class="container">
            <div class="row gy-5 justify-content-between">
                <div class="col-xl-6 col-lg-7">
                    <div class="career-details-content">
                        <h4>Job Overview</h4>
                        <span class="line-break"></span>
                        <p>We are looking for a talented and passionate {{ $career->title }} to join our team at Hossam
                            X Studios. As a {{ $career->title }}, you will collaborate with our clients, developers, and
                            marketing team to create intuitive, beautiful, and user-centered digital experiences.</p>
                        <span class="line-break"></span>
                        <p>{{ $career->details }}</p>
                        <span class="line-break"></span>
                        <p>If you are driven by a passion for create, a user-first mindset, and the ability to solve
                            complex challenges creatively, we want you to join our growing team!</p>
                        <span class="line-break"></span>
                        <span class="line-break"></span>
                        {{-- <h4>Key Responsibilities</h4>
                        <span class="line-break"></span> --}}
                        {{-- <ul>
                            <li><span>Research & Strategy:</span> Conduct user research, interviews, and analysis to understand user needs, motivations, and pain points.</li>
                            <li><span>User-Centered Design:</span> Create wireframes, storyboards, user flows, process flows, and site maps based on user needs and project goals.</li>
                            <li><span>Prototyping & Interaction:</span> Develop prototypes and mockups to visualize and test design concepts and interactions before finalizing designs.</li>
                            <li><span>Collaborate with Developers:</span> Work closely with front-end developers to ensure design feasibility and consistency across all digital platforms.</li>
                            <li><span>Usability Testing:</span> Plan and conduct usability testing sessions, and iterate designs based on user feedback and analytics.</li>
                            <li><span>Client Presentations:</span> Present design concepts, user flows, and interactive prototypes to clients and stakeholders.</li>
                        </ul> --}}
                        <span class="line-break"></span>
                        <span class="line-break"></span>
                        <span class="line-break"></span>
                        <h4>Details</h4>
                        <span class="line-break"></span>
                        <ul>
                            <li><span>Experience:</span> {{ $career->experience_level }}</li>
                            <li><span>Type of job:</span> {{ $career->type }}</li>
                            <li><span>Salary Min:</span> {{ $career->min_salary }}</li>
                            <li><span>Salary Max:</span> {{ $career->max_salary }}</li>
                            <li><span>Currency:</span> {{ $career->currency }}</li>
                        </ul>
                        <span class="line-break"></span>
                        <span class="line-break"></span>
                        <span class="line-break"></span>
                        <h4>Why Join Us?</h4>
                        <span class="line-break"></span>
                        <ul>
                            <li>Generous vacation and paid time off.</li>
                            <li>Work with industries topper & grow-up yourself gradually.</li>
                            <li>Learning and development opportunities.</li>
                            <li>Remote and flexible work options.</li>
                        </ul>
                        <span class="line-break"></span>
                        <span class="line-break"></span>
                        <span class="line-break"></span>
                        <h4>How to Apply</h4>
                        <span class="line-break"></span>
                        <p>Ready to take the next step? Send your resume and portfolio (if applicable) to <a
                                href="https://demo.egenslab.com/cdn-cgi/l/email-protection#b8d1d6ded7f8ddc0d9d5c8d4dd96dbd7d5"><span
                                    class="__cf_email__"
                                    data-cfemail="274e49414867425f464a574b420944484a">[email&#160;protected]</span></a>.
                            Make sure to include a cover letter explaining why you’d be a great fit for the role and our
                            team."</p>
                        <div class="job-apply-area">
                            <div class="vector-area">
                                <img src="{{ asset('website-assets/img/innerpages/job-apply-area-circle-vector.svg') }}"
                                    alt="" class="circle">
                                <img src="{{ asset('website-assets/img/innerpages/job-apply-area-vector.png') }}"
                                    alt="" class="vector">
                            </div>
                            <div class="contact-area">
                                <svg width="38" height="42" viewBox="0 0 38 42" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 41L37 1M37 1C37 1 19.3353 1 10.9 1M37 1V26.2222"
                                        stroke="url(#paint0_linear_4004_2307)" stroke-width="1.5"
                                        stroke-linecap="round" />
                                    <defs>
                                        <linearGradient id="paint0_linear_4004_2307" x1="19" y1="1"
                                            x2="1" y2="42.5" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#1C1A1E" />
                                            <stop offset="1" stop-color="#C1E8CF" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                                <div class="contact">
                                    <span>Apply by Email</span>
                                    <a
                                        href="https://demo.egenslab.com/cdn-cgi/l/email-protection#244d4a424b64415c45495448414349454d480a474b49"><span
                                            class="__cf_email__"
                                            data-cfemail="9bf2f5fdf4dbfee3faf6ebf7fefcf6faf2f7b5f8f4f6">[email&#160;protected]</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="career-details-sidebar">
                        <h4>Ready to grow your career with us?</h4>
                        <a href="#" class="primary-btn3 three btn-hover" data-bs-toggle="modal"
                            data-bs-target="#exampleModal{{ $career->id }}">
                            Apply Position
                            <svg width="10" height="10" viewBox="0 0 10 10"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 9L9 1M9 1C7.22222 1.33333 3.33333 2 1 1M9 1C8.66667 2.66667 8 6.33333 9 9"
                                    stroke-width="1.5" stroke-linecap="round"></path>
                            </svg>
                            <span></span>
                        </a>
                        <p>We’re ready to meet with you & opptimistic you will doing great well!</p>
                        {{-- <div class="form-inner2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="contactCheck22">
                                <label class="form-check-label" for="contactCheck22">
                                    By applying, you will agree our <span>privacy-policy & terms conditions.</span>.
                                </label>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Career Details Page End -->

    @include('frontend.main.footer')
    @include('frontend.main.scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const citiesByCountry = {
                "Egypt": ["Cairo", "Alexandria", "Giza", "Luxor", "Aswan", "Port Said"],
                "United States": ["New York", "Los Angeles", "Chicago", "Houston", "Miami"],
                "United Kingdom": ["London", "Manchester", "Birmingham", "Liverpool", "Glasgow"],
                "Canada": ["Toronto", "Vancouver", "Montreal", "Calgary", "Ottawa"]
            };

            // For each country select on the page
            document.querySelectorAll("select[name='country']").forEach(function(countrySelect) {
                // try to find the corresponding city select within the same form/modal
                const container = countrySelect.closest('form') || countrySelect.closest('.modal') ||
                    document;
                const citySelect = container.querySelector("select[name='city']");
                if (!citySelect) return;

                // populate initial city if country already selected (edit modal)
                if (countrySelect.value && citiesByCountry[countrySelect.value]) {
                    citySelect.innerHTML = '<option value="" disabled>Select city</option>';
                    citiesByCountry[countrySelect.value].forEach(function(city) {
                        const opt = document.createElement('option');
                        opt.value = city;
                        opt.textContent = city;
                        // try to preserve existing value if present (edit modal)
                        if (citySelect.dataset.current === city || citySelect.value === city) opt
                            .selected = true;
                        citySelect.appendChild(opt);
                    });
                }

                countrySelect.addEventListener("change", function() {
                    const selectedCountry = this.value;
                    citySelect.innerHTML =
                        '<option value="" disabled selected>Select city</option>';

                    if (selectedCountry && citiesByCountry[selectedCountry]) {
                        citiesByCountry[selectedCountry].forEach(function(city) {
                            const option = document.createElement("option");
                            option.value = city;
                            option.textContent = city;
                            citySelect.appendChild(option);
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>
