@extends('web_new.layouts.main')

@section('content')
    <div class="main-section">
        <div class="container ">
            <div class="row mx-4" data-aos="fade" data-aos-duration="2000">
                <div class="col-12 p-0">
                    <h1 class="heading-xl cl-lBlue fw-500">Pricing</h1>
                    <p class="paragraph cl-dblue mb-4">
                        See over run your practice with beautifully designed ways to work.
                    </p>
                </div>
            </div>
        </div>

        <div class="container">

            <h2 class="paragraph-xxl cl-dblue mt-4">Choose plan</h2>

            <div class="ps-tabs my-4" data-aos="fade-left" data-aos-duration="1000">
                <!-- Tabs -->
                <div class="tabs-container">
                    <div class="tab active" onclick="showTab(0)">Pay Monthly</div>
                    <div class="tab" onclick="showTab(1)">Pay Yearly</div>
                </div>
                <!-- Tab Content -->
                <div class="tab-content active" id="content-0">
                    <div class="ps-pricing-set">
                        <div class="row">
                            <div class="col-md-4 mb-4" data-aos="fade-left" data-aos-duration="1000">
                                <div class="card ps-card">
                                    <div class="card-header paragraph-lg cl-dblue">
                                        Lite
                                    </div>
                                    <div class="card-body">
                                        <div class="price">
                                            <p>C</p> <span>$70.99</span>/Location per month
                                        </div>
                                        <h6>Get All Functions HEP Dispensing, Managing Platform</h6>
                                        <hr/>
                                        <p class="cl-gray paragraph-md mb-0">Plus C $9 / additional clinic</p>
                                        <h6>Scheduling:</h6>
                                        <ul class="list-unstyled">
                                            <li><i class="fas fa-check"></i> Book an online demo</li>
                                        </ul>
                                        <h6>Includes:</h6>
                                        <ul class="list-unstyled">
                                            <li><i class="fas fa-check"></i> Included 1 License for Clinic/Clinician </li>
                                        </ul>
                                        <button class="ps-btn sm-btn primary-btn">Sign up</button>
                                        <button class="ps-btn sm-btn outline-btn">Book a demo</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-4" data-aos="zoom-in" data-aos-duration="1000">
                                <div class="card ps-card">
                                    <div class="card-header paragraph-lg cl-dblue">
                                        Premium
                                    </div>
                                    <div class="card-body">
                                        <div class="price">
                                            <p>C</p> <span>$80.99</span>/Location per month
                                        </div>
                                        <h6>Scale your business and increase your efficiency</h6>
                                        <hr/>
                                        <p class="cl-gray paragraph-md mb-0">Plus C $0 / additional clinic</p>
                                        <ul class="list-unstyled">
                                            <li><i class="fas fa-check"></i> Get Multiple clinicians with common data storage under clinic</li>
                                        </ul>
                                        <h6>Scheduling:</h6>
                                        <ul class="list-unstyled">
                                            <li><i class="fas fa-check"></i> Book an online demo</li>
                                        </ul>
                                        <h6>Includes:</h6>
                                        <ul class="list-unstyled">
                                            <li><i class="fas fa-check"></i> Included up to 3 License for Clinic/ Clinician/ Assistant</li>
                                        </ul>
                                        <button class="ps-btn sm-btn primary-btn">Sign up</button>
                                        <button class="ps-btn sm-btn outline-btn">Book a demo</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-4" data-aos="fade-right" data-aos-duration="1000">
                                <div class="card ps-card">
                                    <div class="card-header paragraph-lg cl-dblue">
                                        Enterprise
                                    </div>
                                    <div class="card-body">
                                        <div class="price">
                                            <p>C</p> <span>$399.99</span>/Location per month
                                        </div>
                                        <h6>All the Flexibility you need to meet your custom requirements to scale productivity of HEP</h6>
                                        <hr/>
                                        <p class="cl-gray paragraph-md mb-0">For Clinics with Multiple location or 20+ Clinicians</p>
                                        <ul class="list-unstyled">
                                            <li><i class="fas fa-check"></i> Features of Premium</li>
                                        </ul>
                                        <h6>Scheduling:</h6>
                                        <ul class="list-unstyled">
                                            <li><i class="fas fa-check"></i> Book an online demo</li>
                                        </ul>
                                        <h6>Includes:</h6>
                                        <ul class="list-unstyled">
                                            <li><i class="fas fa-check"></i> Included Multiple License for Clinic/ Clinician/ Assistant hierarchy to manage Clinicians, Patients,</li>
                                        </ul>
                                        <button class="ps-btn sm-btn primary-btn">Sign up</button>
                                        <button class="ps-btn sm-btn outline-btn">Book a demo</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-content" id="content-1">
                    <div class="ps-pricing-set">
                        <div class="row">
                            <div class="col-md-4 mb-4" data-aos="fade-left" data-aos-duration="2000">
                                <div class="card ps-card">
                                    <div class="card-header paragraph-lg cl-dblue">
                                        Lite
                                    </div>
                                    <div class="card-body">
                                        <div class="price">
                                            <p>C</p> <span>$60.99</span>/Location 15% Discount <small style='color:#963b54;font-size:20px;'>($70.99)</small>
                                        </div>
                                        <h6>Get All Functions HEP Dispensing, Managing Platform</h6>
                                        <hr/>
                                        <p class="cl-gray paragraph-md mb-0">Plus C $29 per additional Clinician</p>
                                        <h6>Scheduling:</h6>
                                        <ul class="list-unstyled">
                                            <li><i class="fas fa-check"></i> Book an online demo</li>
                                        </ul>
                                        <h6>Includes:</h6>
                                        <ul class="list-unstyled">
                                            <li><i class="fas fa-check"></i> Included 1 License for Clinic/Clinician </li>
                                        </ul>
                                        <button class="ps-btn sm-btn primary-btn">Sign up</button>
                                        <button class="ps-btn sm-btn outline-btn">Book a demo</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-4" data-aos="zoom-in" data-aos-duration="2000">
                                <div class="card ps-card">
                                    <div class="card-header paragraph-lg cl-dblue">
                                        Premium
                                    </div>
                                    <div class="card-body">
                                        <div class="price">
                                            <p>C</p> <span>$69.99</span>/Location 15% Discount <small style='color:#963b54;font-size:20px;'>($80.99)</small>
                                        </div>
                                        <h6>Scale your business and increase your efficiency</h6>
                                        <hr/>
                                        <p class="cl-gray paragraph-md mb-0">Plus C $0 per additional Clinician</p>
                                        <ul class="list-unstyled">
                                            <li><i class="fas fa-check"></i> Get Multiple clinicians with common data storage under clinic</li>
                                        </ul>
                                        <h6>Scheduling:</h6>
                                        <ul class="list-unstyled">
                                            <li><i class="fas fa-check"></i> Book an online demo</li>
                                        </ul>
                                        <h6>Includes:</h6>
                                        <ul class="list-unstyled">
                                            <li><i class="fas fa-check"></i> Included up to 3 License for Clinic/ Clinician/ Assistant</li>
                                        </ul>
                                        <button class="ps-btn sm-btn primary-btn">Sign up</button>
                                        <button class="ps-btn sm-btn outline-btn">Book a demo</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-4" data-aos="fade-right" data-aos-duration="2000">
                                <div class="card ps-card">
                                    <div class="card-header paragraph-lg cl-dblue">
                                        Enterprise
                                    </div>
                                    <div class="card-body">
                                        <div class="price">
                                            <p>C</p> <span>$0.00</span>/Get a Free Quote
                                        </div>
                                        <h6>All the Flexibility you need to meet your custom requirements to scale productivity of HEP</h6>
                                        <hr/>
                                        <p class="cl-gray paragraph-md mb-0">For Clinics with Multiple location or 20+ Clinicians</p>
                                        <ul class="list-unstyled">
                                            <li><i class="fas fa-check"></i> Features of Premium</li>
                                        </ul>
                                        <h6>Scheduling:</h6>
                                        <ul class="list-unstyled">
                                            <li><i class="fas fa-check"></i> Book an online demo</li>
                                        </ul>
                                        <h6>Includes:</h6>
                                        <ul class="list-unstyled">
                                            <li><i class="fas fa-check"></i> Included Multiple License for Clinic/ Clinician/ Assistant hierarchy to manage Clinicians, Patients,</li>
                                        </ul>
                                        <button class="ps-btn sm-btn primary-btn">Sign up</button>
                                        <button class="ps-btn sm-btn outline-btn">Book a demo</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="ps-accordion" data-aos="fade-right" data-aos-duration="1000">
                <div class="accordion-item">
                    <button class="accordion-header" aria-expanded="false">
                        Charting, Forms, & Surveys
                        <span class="accordion-arrow"></span>
                    </button>
                    <div class="accordion-content px-0">
                        <div class="ps-accord-comp">
                            <div class="row pb-1">
                                <div class="col-6 paragraph-md cl-dblue "></div>
                                <div class="col-2 text-center pb-2  paragraph-md cl-dblue fw-600">Balance</div>
                                <div class="col-2 text-center pb-2  paragraph-md cl-dblue fw-600">Practice</div>
                                <div class="col-2 text-center pb-2  paragraph-md cl-dblue fw-600">Thrive</div>
                            </div>
                            <div>
                                <div class="row table-row">
                                    <div class="col-6 paragraph-md cl-dblue ">Custom Branded Booking Site</div>
                                    <div class="col-2 text-center"><i class="fas fa-times cross-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                </div>
                                <div class="row table-row">
                                    <div class="col-6 paragraph-md cl-dblue ">Custom Settings For Online Booking</div>
                                    <div class="col-2 text-center"><i class="fas fa-times cross-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                </div>
                                <div class="row table-row">
                                    <div class="col-6 paragraph-md cl-dblue ">Real-Time Availability For Online Booking
                                    </div>
                                    <div class="col-2 text-center"><i class="fas fa-times cross-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                </div>
                                <div class="row table-row">
                                    <div class="col-6 paragraph-md cl-dblue ">Secure Client Portal</div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                </div>
                                <div class="row table-row">
                                    <div class="col-6 paragraph-md cl-dblue ">Email Confirmation</div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                </div>
                                <div class="row table-row">
                                    <div class="col-6 paragraph-md cl-dblue ">Unlimited Email Reminders</div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                </div>
                                <div class="row table-row">
                                    <div class="col-6 paragraph-md cl-dblue ">Unlimited Locations</div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                </div>
                                <div class="row table-row">
                                    <div class="col-6 paragraph-md cl-dblue ">Unlimited SMS Reminders</div>
                                    <div class="col-2 text-center"><i class="fas fa-times cross-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                </div>
                                <div class="row table-row">
                                    <div class="col-6 paragraph-md cl-dblue ">Unlimited Appointments</div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                </div>
                                <div class="row table-row">
                                    <div class="col-6 paragraph-md cl-dblue ">Unlimited Practitioners</div>
                                    <div class="col-2 text-center"><i class="fas fa-times cross-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <button class="accordion-header" aria-expanded="false">
                        Booking
                        <span class="accordion-arrow"></span>
                    </button>
                    <div class="accordion-content px-0">
                        <div class="ps-accord-comp">
                            <div class="row pb-1">
                                <div class="col-6 paragraph-md cl-dblue "></div>
                                <div class="col-2 text-center pb-2  paragraph-md cl-dblue fw-600">Balance</div>
                                <div class="col-2 text-center pb-2  paragraph-md cl-dblue fw-600">Practice</div>
                                <div class="col-2 text-center pb-2  paragraph-md cl-dblue fw-600">Thrive</div>
                            </div>
                            <div>
                                <div class="row table-row">
                                    <div class="col-6 paragraph-md cl-dblue ">Custom Branded Booking Site</div>
                                    <div class="col-2 text-center"><i class="fas fa-times cross-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                </div>
                                <div class="row table-row">
                                    <div class="col-6 paragraph-md cl-dblue ">Custom Settings For Online Booking</div>
                                    <div class="col-2 text-center"><i class="fas fa-times cross-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                </div>
                                <div class="row table-row">
                                    <div class="col-6 paragraph-md cl-dblue ">Real-Time Availability For Online Booking
                                    </div>
                                    <div class="col-2 text-center"><i class="fas fa-times cross-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                </div>
                                <div class="row table-row">
                                    <div class="col-6 paragraph-md cl-dblue ">Secure Client Portal</div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                </div>
                                <div class="row table-row">
                                    <div class="col-6 paragraph-md cl-dblue ">Email Confirmation</div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                </div>
                                <div class="row table-row">
                                    <div class="col-6 paragraph-md cl-dblue ">Unlimited Email Reminders</div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                </div>
                                <div class="row table-row">
                                    <div class="col-6 paragraph-md cl-dblue ">Unlimited Locations</div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                </div>
                                <div class="row table-row">
                                    <div class="col-6 paragraph-md cl-dblue ">Unlimited SMS Reminders</div>
                                    <div class="col-2 text-center"><i class="fas fa-times cross-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                </div>
                                <div class="row table-row">
                                    <div class="col-6 paragraph-md cl-dblue ">Unlimited Appointments</div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                </div>
                                <div class="row table-row">
                                    <div class="col-6 paragraph-md cl-dblue ">Unlimited Practitioners</div>
                                    <div class="col-2 text-center"><i class="fas fa-times cross-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <button class="accordion-header" aria-expanded="false">
                        Scheduling
                        <span class="accordion-arrow"></span>
                    </button>
                    <div class="accordion-content px-0">
                        <div class="ps-accord-comp">
                            <div class="row pb-1">
                                <div class="col-6 paragraph-md cl-dblue "></div>
                                <div class="col-2 text-center pb-2  paragraph-md cl-dblue fw-600">Balance</div>
                                <div class="col-2 text-center pb-2  paragraph-md cl-dblue fw-600">Practice</div>
                                <div class="col-2 text-center pb-2  paragraph-md cl-dblue fw-600">Thrive</div>
                            </div>
                            <div>
                                <div class="row table-row">
                                    <div class="col-6 paragraph-md cl-dblue ">Custom Branded Booking Site</div>
                                    <div class="col-2 text-center"><i class="fas fa-times cross-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                </div>
                                <div class="row table-row">
                                    <div class="col-6 paragraph-md cl-dblue ">Custom Settings For Online Booking</div>
                                    <div class="col-2 text-center"><i class="fas fa-times cross-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                </div>
                                <div class="row table-row">
                                    <div class="col-6 paragraph-md cl-dblue ">Real-Time Availability For Online Booking
                                    </div>
                                    <div class="col-2 text-center"><i class="fas fa-times cross-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                </div>
                                <div class="row table-row">
                                    <div class="col-6 paragraph-md cl-dblue ">Secure Client Portal</div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                </div>
                                <div class="row table-row">
                                    <div class="col-6 paragraph-md cl-dblue ">Email Confirmation</div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                </div>
                                <div class="row table-row">
                                    <div class="col-6 paragraph-md cl-dblue ">Unlimited Email Reminders</div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                </div>
                                <div class="row table-row">
                                    <div class="col-6 paragraph-md cl-dblue ">Unlimited Locations</div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                </div>
                                <div class="row table-row">
                                    <div class="col-6 paragraph-md cl-dblue ">Unlimited SMS Reminders</div>
                                    <div class="col-2 text-center"><i class="fas fa-times cross-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                </div>
                                <div class="row table-row">
                                    <div class="col-6 paragraph-md cl-dblue ">Unlimited Appointments</div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                </div>
                                <div class="row table-row">
                                    <div class="col-6 paragraph-md cl-dblue ">Unlimited Practitioners</div>
                                    <div class="col-2 text-center"><i class="fas fa-times cross-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                    <div class="col-2 text-center"><i class="fas fa-check check-icon"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <p class="paragraph mt-5 text-center"> Any more questions? We’d love to hear from you.</p>
            <div class="col-12 text-center mb-4"> <a href="#" class="ps-btn sm-btn primary-btn ps-header-btn">Contact
                    Us</a></div>
        </div>
    </div>
@endsection   
@section('pagejs')
    <script>
        // accrordion start
        document.querySelectorAll('.accordion-header').forEach((header) => {
            header.addEventListener('click', () => {
                const expanded = header.getAttribute('aria-expanded') === 'true';
                header.setAttribute('aria-expanded', !expanded);

                const content = header.nextElementSibling;
                if (!expanded) {
                    content.style.maxHeight = content.scrollHeight + 18 + 'px';
                } else {
                    content.style.maxHeight = null;
                }
            });
        });

        function showTab(index) {
            // Remove 'active' class from all tabs and content
            document.querySelectorAll('.tab').forEach(tab => tab.classList.remove('active'));
            document.querySelectorAll('.tab-content').forEach(content => content.classList.remove('active'));

            // Add 'active' class to selected tab and corresponding content
            document.querySelectorAll('.tab')[index].classList.add('active');
            document.getElementById('content-' + index).classList.add('active');
        }
    </script>
@endsection