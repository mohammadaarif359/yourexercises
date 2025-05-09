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
                            Welcome to <b>Yourexercises.com</b>, a modern platform built to revolutionize how physiotherapists prescribe and manage home exercises for their patients. Designed by two passionate physiotherapists who are not just business partners but life partners too, we bring you a unique blend of healthcare expertise and technological innovation. Our platform was created to make rehabilitation smarter, easier, and more efficient for both patients and healthcare providers.
                        </p>
                    </div>
                </div>
            </div>
            <div class="content-section" data-aos="fade-up" data-aos-duration="1000">
                <h2>
                    Our Story
                </h2>
                <p>
                    The journey behind Yourexercises.com is driven by a deep-rooted passion for <b>physiotherapy, sports, and technology</b>. The platform was envisioned by Jeet and Drashti, a husband and wife duo with diverse expertise in physiotherapy and sports, and a shared vision to combine health and tech in ways that make a real difference in patient recovery.
                </p>
                <p>
                    <b>Jeet</b>, a gold medalist physiotherapist who graduated in 2019, has always been passionate about both fitness and technology. A professional in <b>badminton</b> and <b>chess</b>, Jeet's love for sports helped shape his approach to physiotherapy and rehabilitation. But his early interest in technology led him to envision a future where <b>HealthTech</b> (or <b>PhysioTech</b>) could be used to enhance patient care. His goal was clear: to bring the latest technology to the world of physiotherapy and help people recover faster and more effectively.
                </p>
                <p>
                    <b>Drashti</b>, meaning “Vision,” is the perfect partner to bring this dream to life. A professional <b>table tennis</b> player for decades, she has always been dedicated to pushing her limits, whether on the court or in the field of physiotherapy. Graduating in 2020, Drashti’s commitment to solving real-world problems through physiotherapy has only grown stronger over time. She strongly believes that technology is essential to solving major concerns in healthcare. Her vision for <b>Yourexercises.com</b> was to create a platform where technology could have a huge impact by solving even the smallest challenges faced by both physiotherapists and patients.
                </p>    
                <p>
                    Together, Jeet and Drashti formed Yourexercises.com with the mission of creating a platform that makes exercise prescriptions easier, more engaging, and more effective for patients—all while empowering physiotherapists with the tools they need to provide better care.
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
        </div>-->

        <div class="core-values-section">
            <div class="sidebar">
                <h1>What We Offer</h1>
            </div>
            <div class="values-content">
                <div class="value-item">
                    <div class="d-flex gap-5">
                        <!--<div class="icon">ðŸ’¡</div>-->
                        <h2>Automated Reminders</h2>
                    </div>
                    <!--<p><strong>fresh. creative. resourceful.</strong></p>-->
                    <p>will never forget their exercises again. 
                        Our system sends timely reminders to ensure that patients stay on track with their rehabilitation programs</p>
                </div>
                <div class="value-item">
                    <div class="d-flex gap-5">
                        <h2>Linking Profiles with EMS</h2>
                    </div>
                    <p>Seamlessly connect patient profiles with your Electronic Medical System (EMS) for better management, 
                        data tracking, and integration with your clinic’s existing systems</p>
                </div>
                <div class="value-item">
                    <div class="d-flex gap-5">
                        <h2>Patient Access</h2>
                    </div>
                    <p>can log in to their personalized portal where they can track their progress, view their exercise routines, 
                        and communicate directly with their physiotherapist</p>
                </div>
                <div class="value-item mb-0">
                    <div class="d-flex gap-5">
                        <h2>Customizable Exercise Plans</h2>
                    </div>
                    <p>Whether it's a post-surgery recovery program or a sports injury rehabilitation plan, physiotherapists can easily design and 
                        customize exercise routines for each patient, ensuring that their treatment is tailored to their needs.</p>
                </div>
                <div class="value-item mb-0">
                    <div class="d-flex gap-5">
                        <h2>Increased Compliance and Engagement</h2>
                    </div>
                    <p>By making exercise routines easy to follow and ensuring constant communication, we help patients stay engaged 
                        and committed to their recovery journey</p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="content-section" data-aos="fade-up" data-aos-duration="1000">
                <h2>
                    Our Mission
                </h2>
                <p>
                Yourexercises.com, our mission is to create an innovative <b>HealthTech</b> solution that empowers physiotherapists to provide personalized care while enhancing patient compliance and results.
                We strive to bridge the gap between <b>technology</b> and <b>physiotherapy</b>, helping both patients and practitioners unlock the full potential of rehabilitation
                </p>
                <p>
                    We are passionate about <b>making a difference</b>, and our goal is simple: to offer a modern platform that delivers the tools needed to improve health outcomes in an accessible, efficient, and user-friendly way
                </p>

                <h2>
                    Why Choose Us?
                </h2>
                <p>
                    <strong>Expertise You Can Trust:</strong> Created by a team of experienced physiotherapists, our platform is built with a deep understanding of the challenges that clinicians and patients face every day
                </p>
                <p>
                    <strong>Smart and Innovative:</strong> We combine the latest advancements in technology with proven physiotherapy practices to create a platform that works for everyone.
                </p>
                <p>
                    <strong>Easy-to-Use:</strong> With a user-friendly interface, both physiotherapists and patients can navigate the platform with ease, making rehabilitation more efficient and less stressful.
                </p>
                <p>
                    <strong>Tailored to You:</strong> Whether you are a physiotherapist looking for a better way to manage your practice or a patient seeking a personalized rehabilitation plan, Yourexercises.com adapts to your needs
                </p>
            </div>

            <h2>Join Us in Shaping the Future of Physiotherapy</h2>
            <p>Thank you for choosing Yourexercises.com. Together, we can make rehabilitation smarter, easier, and more impactful. Whether you're a physiotherapist or a patient, we are here to help you every step of the way as we work toward a healthier, technology-driven future.</p>
            <p><strong>- Jeet & Drashti</strong><br/>
            Co-founders of Yourexercises.com<br/>
            Your trusted partners in health and technology innovation</p>
        </div>   

        <!--<div class="container ps-eml" data-aos="fade-up" data-aos-duration="1000">
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