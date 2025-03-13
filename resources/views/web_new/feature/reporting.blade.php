@extends('web_new.layouts.main')

@section('content')    
    <div class="main-section ps-feature-set main-section ps-feature-set p-0">
        <section class="banner banner-section py-5">
            <div class="container banner-column mt-0 pt-5" data-aos="fade-up" data-aos-duration="1000">
                <img class="banner-image mt-0"
                    src="https://jane.app/assets/features/cover/booking-a9ffce67aa24079df27d7b691897d18bf9d6170418c76de49fa374b38480c2e3.png"
                    alt="banner">
                <div class="banner-inner ps-gap5">
                    <h1 class="heading-lg cl-lBlue">Reporting</h1>
                    <p class="paragraph-hmd cl-dblue">
                        Everything you need to stay on top of your patients performance. 
                        Your practice’s data is automatically captured and presented in intuitive, 
                        actionable reports — removing the hassle of manual spreadsheets and minimizing errors
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
                    <h3 class="paragraph-lg cl-dblue">Make decisions based on data</h3>
                    <p class="paragraph-md cl-dblue">You don’t need to be a data analyst to understand patients needs — 
                        Your exercises reports are structured in a way that’s helpful for making clinical judgments</p>
                    <ul>
                        <li>Access day, weekly, monthly subjective data filled by pateints after completing HEP along with HEP counts, ratings and reviews, and more</li>
                        <li>Keep an eye on patient trends such as pain indications, reduced movement,
                            or other complains and prompting them to book an session to review HEPs. This patients can be marked and exported for marketing communication</li>
                        <li>Stay on top of tasks that require your attention, like collecting objective data, 
                            and managing revisit for review session, reviewing progression, setting up for re-assessment</li>
                    </ul>
                </div>
            </div>
        
            <div class="row pt-4 ps-fea-inside-list">
                <div class="col-md-5 text-start mb-3" data-aos="fade-right" data-aos-duration="1000">
                    <h3 class="paragraph-lg cl-dblue">Find data in seconds</h3>
                    <p class="paragraph-md cl-dblue">Intuitive filters and search options let you find into patients data and find needworthy quickly</p>
                    <ul>
                        <li>Click on patient profiles, exercises, and other specifics for an in-depth insight into your data</li> 
                        <li>Filter Reports by location, discipline, staff members, date range, and more</li>
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
                    <h3 class="paragraph-lg cl-dblue">Easily export & share information</h3>
                    <p class="paragraph-md cl-dblue">While your exercises keeps all your data secure and easily accessible, sharing or utilizing data is made simple with easy exports</p>
                    <ul>
                        <li>Print selected reports, or save them as PDFs</li>
                        <li>Export datasets in Excel or CSV formats to study trends of patents outcome since treatment</li>
                        <li>Data can be used for Clinical Notes and Records</li>
                        <li>Your Business logo and essential details like your name, address, and contact information are conveniently included in all printed reports and will be promptly visible on patients portal</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection        