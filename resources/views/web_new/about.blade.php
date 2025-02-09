@extends('web_new.layouts.main')

@section('content')
    <div class="main-section ps-about">
        <div class="container">
            <div class="row ps-border-bottom mx-4" data-aos="fade" data-aos-duration="2000">
                <div class="col-12 p-0">
                    <h1 class="heading-xl cl-lBlue fw-500">About Us</h1>
                    <p class="paragraph cl-dblue">
                        See over run your practice with beautifully designed ways to work.
                    </p>
                </div>
            </div>
            <div class="header-section text-center mt-5">
                <div class="row">
                    <div class="col-sm-5 mb-3" data-aos="fade-right" data-aos-duration="1000">
                        <img alt="Company logo with CM letters in the center of an atom-like structure"
                            class="img-fluid rounded"
                            src="https://www.postdicom.com/images/blog-posts/social-media-images/medical-imaging-science-and-applications-social.jpg" />
                    </div>
                    <div class="col-sm-7 text-left mb-3" data-aos="fade-left" data-aos-duration="1000">
                        <h1 class="paragraph-xxl cl-dblue">
                            Our Brand Story &amp; Proposition
                        </h1>
                        <h2 class="paragraph-md cl-dblue">
                            How We Started
                        </h2>
                        <p class="cl-gray paragraph-md">
                        At Your Exercises, we are a team of passionate physiotherapists who have been dedicated to improving patient care since 2019. With extensive experience in the Canadian healthcare system, we saw firsthand the challenges both patients and healthcare practitioners face in delivering efficient, personalized care. This sparked our mission to bridge the gap between traditional physiotherapy and the future of healthcare technology.
                        </p>
                    </div>
                </div>
            </div>
            <div class="content-section" data-aos="fade-up" data-aos-duration="1000">
                <h2>
                    Our Story
                </h2>
                <p>
                    Driven by our belief that technology is the key to unlocking a new era in health and wellness, we set out to create a platform that streamlines the prescription and delivery of home exercise programs (HEP). Our vision is clear: to build a generational revolution in health-tech that empowers not only patients but also practitioners, administrators, and management teams. By embracing innovation, we are creating solutions that support a patient-centric approach, making it easier for everyone involved to deliver and receive optimal care.
                </p>
                <p>
                    At Your Exercises, we’re committed to being at the forefront of the next healthcare evolution. Our platform is designed to make the process smoother, more efficient, and more accessible for all, with the ultimate goal of improving outcomes for patients and creating a better experience for every stakeholder in the healthcare journey.
                </p>
                <p>
                    Join us as we shape the future of physiotherapy and health technology—where convenience meets expertise for the benefit of all.
                </p>
            </div>

            <!--<div class="left">
                <h2 style="margin-bottom: -8px;" class="cl-lBlue">Our Team Leadership</h2>
            </div>-->
        </div>

        <!--<div class="team-container data-aos="zoom" data-aos-duration="1500"">
            <div class="team-member">
                <img src="https://png.pngtree.com/png-vector/20230928/ourmid/pngtree-young-afro-professional-doctor-png-image_10148632.png"
                    alt="Arty Aramalyan">
                <h3>Arty Aramalyan</h3>
                <p>CTO</p>
            </div>
            <div class="team-member">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ5eTLGFc9O499Uhj1nLbuK5cCxtPkHaRpa1A&s"
                    alt="Natalia Shipovalova">
                <h3>Natalia Shipovalova</h3>
                <p>Marketing Manager</p>
            </div>
            <div class="team-member">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQE-n-Eb5PPHCiRyGR1vpCKxiucX1RsoZ0gEA&s"
                    alt="Kenneth Flery">
                <h3>Kenneth Flery</h3>
                <p>Construction Development Manager</p>
            </div>
        </div>

        <div class="core-values-section">
            <div class="sidebar">
                <h1>Core Values</h1>
            </div>
            <div class="values-content">
                <div class="value-item">
                    <div class="d-flex gap-5">
                        <div class="icon">ðŸ’¡</div>
                        <h2>innovative</h2>
                    </div>
                    <p><strong>fresh. creative. resourceful.</strong></p>
                    <p>Anticipate the needs of the industry, clients, and customers, and proactively implement
                        product/system
                        enhancements that best the competitor's features and clientâ€™s expectations.</p>
                </div>
                <div class="value-item">
                    <div class="d-flex gap-5">
                        <div class="icon">ðŸ¤</div>
                        <h2>collaborative</h2>
                    </div>
                    <p><strong>communicative. considerate. enthusiastic.</strong></p>
                    <p>Encourage myself, clients, and colleagues to work as a team, share ideas and never be afraid to
                        ask for
                        help. Consistently seek to help and support the team, the business, and our clients.</p>
                </div>
                <div class="value-item">
                    <div class="d-flex gap-5">
                        <div class="icon">ðŸ“‹</div>
                        <h2>accountable</h2>
                    </div>
                    <p><strong>honorable. ethical. trustworthy. reliable.</strong></p>
                    <p>Challenge myself to be aware of all the factors under my control that influence the business,
                        hold myself
                        responsible for my actions and ensure my work is always helpful and for the betterment of the
                        client,
                        the product, and my peers.</p>
                </div>
                <div class="value-item mb-0">
                    <div class="d-flex gap-5">
                        <div class="icon">ðŸ”Ž</div>
                        <h2>diligent</h2>
                    </div>
                    <p><strong>vigilant. productive. focused. thoughtful.</strong></p>
                    <p>Inspire myself and others to always look for ways to improve the system and processes, remedy
                        errors and
                        learn from mistakes.</p>
                </div>
            </div>
        </div>

        <div class="container ps-eml" data-aos="fade-up" data-aos-duration="1000">
            <div class="footer2 ">
                <p>Your Exercises is lovingly made and supported by a remote-first team. While home will always be <del>ca</del>
                    North
                    Vancouver, weâ€™re <a href="#">spreading our wings and growing</a> across the country (and the
                    world!).</p>
                <a href="#">Read Story</a>
            </div>
            <div class="text-center mb-5">
                <a href="{{ url('/features') }}" class="ps-btn md-btn primary-btn mb-1">See Your exercises features</a>
                <a href="{{ url('/book-a-demo') }}" class="ps-btn md-btn primary-btn mb-1">Book a demo</a>
                <a href="#" class="ps-btn md-btn primary-btn mb-1">Start using</a>
            </div>
        </div>-->
    </div>
@endsection