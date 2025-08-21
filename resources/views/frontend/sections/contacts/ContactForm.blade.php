 <!-- Contact Page Start -->
    <div class="contact-page-top mb-80">
        <div class="container">
            {{-- <div class="row g-4"> --}}
                    <div class="single-contact">
                        <h4>Australia</h4>
                        <a href="https://www.google.com/maps">123 Innovation Road, Suite 101Tech City, State, ZIP CodeCountry</a>
                        <ul class="contact-list">
                            <li>
                                <div class="icon">
                                    <img src="assets/img/home1/icon/contact-call-icon.svg" alt="">
                                </div>
                                <div class="content">
                                    <span>Call 24/7 Hours</span>
                                    <h6><a href="tel:+997636844563">+99-763 684 4563 </a></h6>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <img src="assets/img/home1/icon/contact-mail-icon.svg" alt="">
                                </div>
                                <div class="content">
                                    <span>Send Us Mail</span>
                                    <h6><a href="https://demo.egenslab.com/cdn-cgi/l/email-protection#1871767e77587d60797568747d367b7775"><span class="__cf_email__" data-cfemail="462f28202906233e272b362a236825292b">[email&#160;protected]</span></a></h6>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        {{-- </div> --}}
    </div>
    <div class="contact-form-area mb-130">
        <div class="container">
            <div class="row justify-content-center">
                        <div class="col-xl-8 col-lg-10">
                            <div class="contact-form-wrap style-2">
                                <div class="section-title three text-center">
                        <h2>Collaborate with Us!</h2>
                            <p>We’re excited to hear from you! Whether you have a question about our services, want to discuss a new project.</p>
                        </div>
                        <svg class="divider" height="6" viewBox="0 0 696 6" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 2.5L0 0.113249V5.88675L5 3.5V2.5ZM691 3.5L696 5.88675V0.113249L691 2.5V3.5ZM4.5 3.5H691.5V2.5H4.5V3.5Z"/>
                        </svg>
                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="form-inner">
                                        <label>Full Name</label>
                                        <input type="text" placeholder="Mr. Daniel" name="name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inner">
                                        <label>Email</label>
                                        <input type="email" placeholder="info@example.com" name="email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inner">
                                        <label>Phone</label>
                                        <input type="text" placeholder="+99 087 *** ** ***" name="phone">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-inner">
                                        <label>Subject</label>
                                        <input type="text" placeholder="Request" name="subject">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-inner">
                                        <label>Message</label>
                                        <textarea placeholder="Write your enquiry..." name="message"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="primary-btn3 btn-hover">
                                Submit Now
                                <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 9L9 1M9 1C7.22222 1.33333 3.33333 2 1 1M9 1C8.66667 2.66667 8 6.33333 9 9" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                                <span></span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Page End -->

    <!-- Contact Map Section Start -->
    <div class="contact-map-section">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d862.8868416491646!2d31.369819!3d30.107147!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1458176c2fe37a6f%3A0x455d5754795dfc8!2sHossamX%20studios!5e0!3m2!1sar!2seg!4v1755523272823!5m2!1sar!2seg" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <!-- Contact Map Section End -->
