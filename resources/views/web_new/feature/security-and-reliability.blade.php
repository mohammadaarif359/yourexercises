@extends('web_new.layouts.main')

@section('content')    
    <div class="main-section ps-feature-set main-section ps-feature-set p-0">
        <section class="banner banner-section py-5">
            <div class="container banner-column mt-0 pt-5" data-aos="fade-up" data-aos-duration="1000">
                <img class="banner-image mt-0"
                    src="https://jane.app/assets/features/cover/booking-a9ffce67aa24079df27d7b691897d18bf9d6170418c76de49fa374b38480c2e3.png"
                    alt="banner">
                <div class="banner-inner ps-gap5">
                    <h1 class="heading-lg cl-lBlue">Security and Reliability</h1>
                    <p class="paragraph-hmd cl-dblue">
                        Experience Peace of Mind with Unmatched Security and Reliability At Your Exercises, we prioritize your practice’s security and efficiency. 
                        Our platform is designed to deliver a seamless, secure experience, giving you and your patients the confidence that sensitive information is always protected while streamlining your daily operations.
                    </p>
                    <button class="ps-btn sm-btn primary-btn">
                        Book Demo
                    </button>
                </div>
            </div>
        </section>

        <div class="container my-3">
            <div class="row pt-4 ps-fea-inside-list">
                <div class="col-md-4 text-center mb-5 mr-5" data-aos="fade-right" data-aos-duration="1000">
                    <img alt="Take a peek at the future of (even smoother) clinic life." class="img-fluid"
                        src="https://jane.app/assets/features/cover/janepayments-47a91655b28744ef9d858e407ad51d5f46dd6451c0123240a0abf91b80811a3c.png">
                </div>
                <div class="col-md-5 text-start mb-3">
                    <h3 class="paragraph-lg cl-dblue">Top-Tier Security for Total Peace of Mind</h3>
                    <p class="paragraph-md cl-dblue">Your Exercises has your security is our top priority. 
                        Our platform is designed to meet the highest standards of reliability, ensuring your data is always protected. 
                        With your exercises Single Sign-On (SSO), we minimize the risks of using the same username and password across multiple platforms, reducing the chances of breaches</p>
                    <ul>
                        <li>To protect your valuable data, your can add protection, we send a one-time code to your email during login. Plus, if your system supports multi-factor authentication, 
                            you can easily integrate it with SSO for an extra layer of security — making your access even safer</li>
                    </ul>
                </div>
            </div>
        
            <div class="row pt-4 ps-fea-inside-list">
                <div class="col-md-5 text-start mb-3" data-aos="fade-right" data-aos-duration="1000">
                    <h3 class="paragraph-lg cl-dblue">Seamless Workflow, No Interruptions</h3>
                    <p class="paragraph-md cl-dblue">We’re committed to keeping your experience smooth and efficient. 
                        That’s why we provide proactive notifications about any scheduled server maintenance</p>
                    <ul>
                        <li>You’ll receive timely updates about planned maintenance through notifications on our website and the HEP platform, so you’re always in the loop.
                            To minimize disruption, all maintenance is scheduled outside of peak hours, covering as many time zones as possible</li>
                    </ul>
                </div>
                <div class="col-md-4 text-center mb-5 mr-5" data-aos="fade-left" data-aos-duration="1000">
                    <img alt="Take a peek at the future of (even smoother) clinic life." class="img-fluid"
                        src="https://jane.app/assets/features/online-booking/respects-brand-6627807da9462b3a6b3e123afbf8495e658210974ffefdbe8fddb878d4df997d.webp">
                </div>
            </div>

            <div class="row pt-4 ps-fea-inside-list">
                <div class="col-md-4 text-center mb-5 mr-5" data-aos="fade-right" data-aos-duration="1000">
                    <img alt="Take a peek at the future of (even smoother) clinic life." class="img-fluid"
                        src="https://jane.app/assets/features/cover/janepayments-47a91655b28744ef9d858e407ad51d5f46dd6451c0123240a0abf91b80811a3c.png">
                </div>
                <div class="col-md-5 text-start mb-3" data-aos="fade-left" data-aos-duration="1000">
                    <h3 class="paragraph-lg cl-dblue">Instant Status Updates</h3>
                    <p class="paragraph-md cl-dblue">Stay informed with our real-time availability status, easily accessible at the bottom of every page on our website. 
                        Plus, you can sign up to receive instant email notifications for the latest updates</p>
                </div>
            </div>
        </div>
    </div>
@endsection        