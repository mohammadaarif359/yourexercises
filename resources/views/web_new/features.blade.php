@extends('web_new.layouts.main')
@section('content')
    <div class="main-section ">
        <div class="container">
            <div class="row ps-border-bottom mx-4">
                <div class="col-12 p-0">
                    <h1 class="heading-xl cl-lBlue fw-500">Features</h1>
                    <p class="paragraph cl-dblue">
                        See over run your practice with beautifully designed ways to work.
                    </p>
                </div>
            </div>

            <div class="row mt-3 feature-page">
                <div class="col-xs-12 col-sm-6 col-md-4" data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
                    <a href="{{ url('feature/dispensing-home-exercises-program-made-easy') }}">
                        <div class="card">
                            <div class="view overlay">
                                <img class="card-img-top" src="https://watermark.lovepik.com/photo/40007/3397.jpg_wh1200.jpg" alt="Card image cap">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">Dispensing Home Exercises Program made easy</h4>
                                <p class="card-text px-lext-lim">Anyone Practitioner can book prescribe and dispense HEP in just a few clicks given how user-friendly your exercises look and feels — no matter their level of computer experience</p>
                                <p class="ps-read-more-btn m-0">Read more</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4" data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
                    <div class="card mb-4">
                        <div class="card-img">
                            <img class="card-img-top" src="https://img.freepik.com/free-photo/medical-banner-with-doctor-wearing-equipment_23-2149611201.jpg" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Simplifying Backend usage and data management</h4>
                            <p class="card-text px-lext-lim">At Yourexercises.com, we believe that the future of healthcare and fitness is rooted in smart data management and actionable insights</p>
                            <a href="{{ url('/feature/simplifying-backend-usage-and-data-management') }}" class="ps-read-more-btn">Read more</a>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4" data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
                    <div class="card mb-4">
                        <div class="card-img">
                            <img class="card-img-top" src="https://img.freepik.com/free-photo/close-up-people-wearing-lab-coats_23-2149126948.jpg?semt=ais_hybrid" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Reporting</h4>
                            <p class="card-text px-lext-lim">Everything you need to stay on top of your patients performance. Your practice’s data is automatically captured and presented in intuitive, actionable reports — removing the hassle of manual spreadsheets and minimizing errors</p>
                            <a href="{{ url('/feature/reporting') }}" class="ps-read-more-btn">Read more</a>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4" data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
                    <div class="card">
                        <div class="card-img">
                            <img class="card-img-top" src="https://img.freepik.com/free-photo/hologram-feminine-silhouette-man-hand_23-2148755140.jpg?semt=ais_hybrid" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Integrating to your website and social media</h4>
                            <p class="card-text px-lext-lim">Your exercise helps you to connect your own website and boots on social media</p>
                            <a href="{{ url('/feature/integrating-to-your-website-and-social-media') }}" class="ps-read-more-btn">Read more</a>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4" data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
                    <div class="card mb-4">
                        <div class="card-img">
                            <img class="card-img-top" src="https://img.freepik.com/premium-photo/doctor-using-digital-tablet-against-digitally-generated-data-room_1134-23031.jpg?semt=ais_hybrid" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Personalized Home Page and other patients landing pages</h4>
                            <p class="card-text px-lext-lim">Our Personalized Home Page and customized patient landing pages are designed to help you showcase your unique brand, 
                                making your practice stand out and building stronger, more trusting relationships with your clients</p>
                            <a href="{{ url('/feature/personalized-home-page-and-other-patients-landing-pages') }}" class="ps-read-more-btn">Read more</a>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4" data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
                    <div class="card mb-4">
                        <div class="card-img">
                            <img class="card-img-top" src="https://img.freepik.com/free-photo/medical-banner-with-doctor-wearing-vr-glasses_23-2149611207.jpg?semt=ais_hybrid" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Chartings, Documentation and making EMS friendly</h4>
                            <p class="card-text px-lext-lim">Seed up your patient charting with helpful features like Templates, Phrases and Smart Options & Narratives, Your Exercises own AI-powered Voice to Chart, and more.</p>
                            <a href="{{ url('/feature/charting-doumentation-make-ems-friendly') }}" class="ps-read-more-btn">Read more</a>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4" data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
                    <div class="card mb-4">
                        <div class="card-img">
                            <img class="card-img-top" src="https://img.freepik.com/free-photo/medical-banner-with-doctor-wearing-vr-glasses_23-2149611207.jpg?semt=ais_hybrid" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Security and Reliability</h4>
                            <p class="card-text px-lext-lim">Experience Peace of Mind with Unmatched Security and Reliability At Your Exercises, we prioritize your practice’s security and efficiency</p>
                            <a href="{{ url('/feature/security-and-reliability') }}" class="ps-read-more-btn">Read more</a>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4" data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
                    <div class="card mb-4">
                        <div class="card-img">
                            <img class="card-img-top" src="https://img.freepik.com/free-photo/medical-banner-with-doctor-wearing-equipment_23-2149611201.jpg" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">24*7 Support</h4>
                            <p class="card-text px-lext-lim">We’ve kept on helping around the world round the clock. And we’re happy to help you too</p>
                            <a href="{{ url('feature/24-7-support') }}" class="ps-read-more-btn">Read more</a>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4" data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
                    <div class="card mb-4">
                        <div class="card-img">
                            <img class="card-img-top" src="https://img.freepik.com/free-photo/medical-banner-with-doctor-wearing-equipment_23-2149611201.jpg" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Automatic notifications & reminders</h4>
                            <p class="card-text px-lext-lim">Your exercise stays on top of patient communication for you by automatically sending gentle but smart reminders to your patients via email</p>
                            <a href="{{ url('/feature/automatic-notification-and-reminders') }}" class="ps-read-more-btn">Read more</a>
                        </div>
                    </div>
                </div>

                {{--<div class="col-xs-12 col-sm-6 col-md-4" data-aos="fade-up" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
                    <div class="wrapper card mb-4" style="height: 400px;">
                        <div class="card-loader card-loader--tabs"></div>
                        <div class="card-loader card-loader--tabs m-2" style="height: 30px;"></div>
                        <div class="card-loader card-loader--tabs m-2" style="height: 50px;"></div>
                        <div class="card-loader card-loader--tabs mb-2 ml-2 mt-4 mr-5" style="height: 30px;"></div>
                    </div>
                </div>--}}
            </div>
        </div>
    </div>
    <section class="testimonial-section mt-4" data-aos="fade" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
        <div class="container">
            <blockquote class="m-0 cl-white">
                "Your Exercises Family, you guys are really awesome. Keep the amazing new features coming."
                <footer>
                    - Auto Solutions Best Practice Summit 2020
                </footer>
            </blockquote>
        </div>
    </section>


    <div class="container my-5">
        <div class="row pt-5 align-items-center justify-content-center">
            <div class="col-md-4 text-start mb-3" data-aos="fade-right" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
                <h3 class="paragraph-lg cl-dblue">More than helpful software ðŸ’™ Join our Community!</h3>
                <p class="paragraph-md cl-dblue">As big as the world of health and wellness is, so is our community. Our
                    community is open to practitioners, clinic
                    owners, admin staff, students, and consultants in every industry. Join to ask questions, share
                    resources, and learn a
                    few new Your Exercises tips and tricks.</p>
                <a class="ps-btn primary-btn md-btn" href="book_a_demo">Learn More</a>
            </div>

            <div class="col-md-4 text-center mb-5" data-aos="fade-left" data-aos-duration="1000" data-aos-anchor-placement="top-bottom">
                <img alt="Take a peek at the future of (even smoother) clinic life." class="img-fluid"
                    src="https://jane.app/assets/features/cover/janepayments-47a91655b28744ef9d858e407ad51d5f46dd6451c0123240a0abf91b80811a3c.png">
            </div>
        </div>
    </div>
@endsection