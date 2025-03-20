@extends('web_new.layouts.main')

@section('content')    
    <div class="main-section ps-feature-set main-section ps-feature-set p-0">
        <section class="banner banner-section py-5">
            <div class="container banner-column mt-0 pt-5" data-aos="fade-up" data-aos-duration="1000">
                <img class="banner-image mt-0"
                    src="https://jane.app/assets/features/cover/booking-a9ffce67aa24079df27d7b691897d18bf9d6170418c76de49fa374b38480c2e3.png"
                    alt="banner">
                <div class="banner-inner ps-gap5">
                    <h1 class="heading-lg cl-lBlue">Automatic notifications & reminders</h1>
                    <p class="paragraph-hmd cl-dblue">
                        Your exercise stays on top of patient communication for you by automatically sending gentle but smart reminders to your patients via email
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
                    <h3 class="paragraph-lg cl-dblue">Automatic reminders</h3>
                    <p class="paragraph-md cl-dblue">At Yourexercises.com, we know that staying connected with your patients is crucial for their success and your practice's growth. Our Automatic Notifications & Reminders feature is designed to simplify your communication with patients,
                        reduce no-shows, and ensure that your patients stay on track with their health goals. With our easy-to-use system, you can send timely, personalized reminders and notifications that enhance your patient experience and improve your practice’s efficiency</p>
                    <ul>
                        <li>Instant notification via an automated email and giving patients the choice to opt in for email reminders during every interaction</li>
                        <li>Enable automatic exercise reminders, and reminders to fill out feedback for their exercise which will help patients to recover faster</li>
                        <li>Your Exercises sends an email reminder to patients with incomplete subjective questions on exercises so that you get precise and honest feedback which can help you to decide best treatment to escalade patient’s optimum outcome</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="container my-3" data-aos="fade-up" data-aos-duration="1000">
            <h3 class="heading-lg cl-lBlue">Why Automatic Notifications & Reminders Matter</h3>
            <p class="paragraph-hmd cl-dblue">
                In today’s fast-paced world, it’s easy for patients to forget appointments, exercise routines, or important health updates.
                With automatic reminders, you ensure that your patients never miss a critical step in their treatment plan. By providing proactive communication, you demonstrate your commitment to their care, helping to foster trust and increase patient satisfaction
            </p>
            <h4 class="paragraph-lg cl-dblue">Keep Patients Engaged and On-Track</h4>
            <p class="paragraph-md cl-dblue">
                Reminders are not just for Home Exercises and use feedback tools for best overall outcomes—they are also a fantastic way to keep your patients engaged in their treatment plans. 
                From daily exercise reminders to scheduled feedback of HEP, or even simple wellness tips, you can keep your patients informed and motivated. 
                These timely prompts help them stay focused on their health journey, leading to better outcomes and higher satisfaction
            </p>
            <h4 class="paragraph-lg cl-dblue">Increase Professionalism and Reliability</h4>
            <p class="paragraph-md cl-dblue">
                Sending automated notifications and reminders gives your practice a more organized and professional appearance. 
                Patients will appreciate the consistency and reliability of these reminders, reinforcing your commitment to providing the best care possible. 
                By ensuring your patients are always informed, you also boost your reputation as a reliable, trustworthy provider
            </p>
            <h4 class="paragraph-lg cl-dblue">Customize Notifications for Your Practice</h4>
            <p class="paragraph-md cl-dblue">
                *Coming Soon* Every practice is unique, and so are your patient needs. 
                Our <b>Automatic Notifications & Reminders</b> feature gives you the flexibility to tailor messages based on your practice’s specific needs. 
                You can set reminders for appointments, 
                exercise routines, upcoming check-ups, and more, with personalized messages that align with your brand and communication style. 
                Whether you're in healthcare, fitness, or physical therapy, this feature adapts to the needs of your practice
            </p>
            <h4 class="paragraph-lg cl-dblue">Save Time and Improve Efficiency</h4>
            <p class="paragraph-md cl-dblue">
                As a healthcare provider or fitness professional, your time is valuable. With Yourexercises.com, 
                you don’t have to worry about manually sending reminders or chasing down patients for Home Exercises Program. Our automated system handles the communication for you, 
                saving you time and ensuring that you never miss an opportunity to engage with your patients and remind their Home Exercises are still awaited.
                This allows you to focus more on what you do best—providing exceptional care
            </p>
            <h4 class="paragraph-lg cl-dblue">Reduce No-Shows and Late Cancellations</h4>
            <p class="paragraph-md cl-dblue">Coming soon* A common challenge for healthcare providers and fitness professionals is managing no-shows and last-minute cancellations. 
                We are about to integrate with your scheduling platforms so that with automatic reminders, you can reduce this issue significantly. 
                Whether it’s a treatment appointment, a scheduled workout session, or a follow-up consultation, 
                our system sends reminders to your patients via SMS, email, or push notifications, ensuring they are always prepared and on time
            </p>
            <hr/>
            <p class="paragraph-md cl-dblue">With <b>Automatic Notifications & Reminders from Yourexercises.com</b>, you can streamline your communication, 
                reduce no-shows, and ensure your patients are always on track. 
                This feature not only enhances the patient experience but also helps you run a more efficient, professional, and successful practice
            </p>
            <p class="paragraph-md cl-dblue">Start automating your reminders today, and see how simple, consistent communication can transform your practice and improve patient outcomes</p>
        </div>
    </div>
    @include('web_new.feature.partial.award')
@endsection