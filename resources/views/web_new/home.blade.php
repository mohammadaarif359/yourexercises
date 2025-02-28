@extends('web_new.layouts.main')

@section('content')
  <!-- Slider -->
  <main class="main section banner banner-section">
    <section class="main-section banner banner-section">
      <div class="container banner-column mt-0">
        <!-- <img class="banner-image" src="https://i.ibb.co/vB5LTFG/Headphone.png" alt="banner"> -->
        <img class="banner-image" src="{{ asset('web_new/assets/img/hero2.png') }}" alt="banner" data-aos="fade-left" data-aos-duration="1000">
        <div class="banner-inner" data-aos="fade-right" data-aos-duration="1000">
          <h1 class="heading-xl cl-dblue">Experience one of the most advanced <span class="cl-lBlue-home">Home Exercise </span>prescription platform</h1>
          <p class="paragraph cl-dblue">
            Revolutionize patient care with our cutting-edge technology that prescribes personalized home exercise programs (HEP) instantly! 
            No more waiting, no more time spent on manual prescriptions—empower your patients to start their recovery immediately while you focus on what truly matters.
            Our advanced platform delivers tailored exercises at the touch of a button, saving you time and ensuring your patients get the best care, faster
          </p>
          <a class="ps-herobtn" href="{{ url('/book-a-demo') }}">
            <button class="ps-btn lg-btn primary-btn ps-herobtn">Book Demo</button>
          </a>
        </div>
      </div>
    </section>
  </main>

  <!-- Features -->
  <section class="features-section pt-3 pt-md-5 section features-section pt-3 pt-md-5" data-aos="fade-up" data-aos-duration="1000">
    <div class="container">
      <h2 class="paragraph-xxl cl-dblue"> Home Exercise Features</h2>
      <p class="paragraph"> Unlock a seamless experience with Your Exercises Platform. </p>
      <div class="row flex-wrap px-2">

        <div class="col-md-3 col-sm-6 col-6 feature">
          <h3 class="paragraph-xml cl-dblue mb-3 mt-2"><i class="fas fa-file-alt"></i> Paperless Patient Exercise Management</h3>
          <!--<p class="cl-gray paragraph-md px-2">
            Simplify your practice by digitizing patient records, ensuring seamless and eco-friendly management.
          </p>-->
        </div>

        <div class="col-md-3 col-sm-6 col-6 feature">
          <h3 class="paragraph-xml cl-dblue mb-3 mt-2"><i class="fas fa-chart-line"></i> Advanced Performance Dashboard</h3>
          <!--<p class="cl-gray paragraph-md px-2">
            Monitor key performance metrics and gain insights into patient progress with an intuitive dashboard.
          </p>-->
        </div>

        <div class="col-md-3 col-sm-6 col-6 feature">
          <h3 class="paragraph-xml cl-dblue mb-3 mt-2"><i class="fas fa-pencil-alt"></i> Custom Exercise Creation</h3>
          <!--<p class="cl-gray paragraph-md px-2">
            Build unique exercises that cater to the individual needs of your patients.
          </p>-->
        </div>

        <div class="col-md-3 col-sm-6 col-6 feature">
          <h3 class="paragraph-xml cl-dblue mb-3 mt-2"><i class="fas fa-bullhorn"></i> Boost Your Online Presence</h3>
          <!--<p class="cl-gray paragraph-md px-2">
            Strengthen your clinic’s online visibility with integrated tools designed for growth.
          </p>-->
        </div>

        <div class="col-md-3 col-sm-6 col-6 feature">
          <h3 class="paragraph-xml cl-dblue mb-3 mt-2"><i class="fas fa-link"></i> Connect with Your Existing Website</h3>
          <!--<p class="cl-gray paragraph-md px-2">
            Seamlessly integrate with your current website for a cohesive and professional experience.
          </p>-->
        </div>

        <div class="col-md-3 col-sm-6 col-6 feature">
          <h3 class="paragraph-xml cl-dblue mb-3 mt-2"><i class="fas fa-heartbeat"></i> Track Patient Health And Exercise Peformance</h3>
          <!--<p class="cl-gray paragraph-md px-2">
            Stay updated on your patients' health journeys with comprehensive progress tracking.
          </p>-->
        </div>

        <div class="col-md-3 col-sm-6 col-6 feature">
          <h3 class="paragraph-xml cl-dblue mb-3 mt-2"><i class="fas fa-comments"></i> Gather Realtime Form Patient</h3>
          <!--<p class="cl-gray paragraph-md px-2">
            Enhance your services by collecting and analyzing patient feedback effectively.
          </p>-->
        </div>

        <div class="col-md-3 col-sm-6 col-6 feature">
          <h3 class="paragraph-xml cl-dblue mb-3 mt-2"><i class="fas fa-lightbulb"></i> Automated Reminder To Patient </h3>
          <!--<p class="cl-gray paragraph-md px-2">
            Receive smart recommendations to improve patient care and streamline clinic operations.
          </p>-->
        </div>
        
        <div class="col-md-3 col-sm-6 col-6 feature">
          <h3 class="paragraph-xml cl-dblue mb-3 mt-2"><i class="fas fa-chart-line"></i> Get Automated Progression For Exercises According To Preset Needs By Therapist</h3>
          <!--<p class="cl-gray paragraph-md px-2">
            Receive smart recommendations to improve patient care and streamline clinic operations.
          </p>-->
        </div>

        <div class="col-md-3 col-sm-6 col-6 feature">
          <h3 class="paragraph-xml cl-dblue mb-3 mt-2"><i class="fas fa-list-check"></i> Choose Direct Preset Programs </h3>
          <!--<p class="cl-gray paragraph-md px-2">
            Receive smart recommendations to improve patient care and streamline clinic operations.
          </p>-->
        </div>

      </div>
    </div>
  </section>

  <!-- Testimonial -->
  <section class="section testimonial-section" data-aos="fade " data-aos-duration="1000">
    <div class="container">
      <blockquote class="m-0 cl-white">
        "Your Exercises  Family, you guys are really awesome. Keep the amazing new features coming."
        <footer>
          - Auto Solutions Best Practice Summit 2020
        </footer>
      </blockquote>
    </div>
  </section>

  <!-- Demo summary -->
  <div class="container">
    <div class="row pt-5" data-aos="flip-up" data-aos-duration="1000">
      <div class="col-md-6 text-center">
        <div class="swiper">
          <div class="swiper-wrapper">
            <div class="swiper-slide"><img alt="Take a peek at the future of (even smoother) clinic life." class="img-fluid"
              src="https://Jane.app/assets/online_appts_groups-7cd35dc16d39b8f09852430c34f6ce875cfe83939fbdfef1d2ef9af23aefc0ec.webp"></div>
            <div class="swiper-slide"><img alt="Take a peek at the future of (even smoother) clinic life." class="img-fluid"
              src="https://www.technologyally.com/wp-content/uploads/2024/02/ai-medical-diagnosis-apps.jpg"></div>
              <div class="swiper-slide"><img alt="Take a peek at the future of (even smoother) clinic life." class="img-fluid"
                  src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQc8CHr0vkihV7YY548vACgCrIyk3O-LtIVpw&s">
              </div>
            <div class="swiper-slide"><img alt="Take a peek at the future of (even smoother) clinic life." class="img-fluid"
              src="https://www.immediatecarewestmont.com/wp-content/uploads/2024/02/What_are_the_4_types_of_medical_imaging_3cc03c9085b74f2eb223663763d06420.png"></div>
          </div>
        
          <!-- Pagination -->
          <div class="swiper-pagination"></div>
        </div>

      </div>
      <div class="col-md-6 text-start">
        <h3 class="paragraph-lg cl-dblue">Take a peek at the future of your exercises.</h3>
        <p class="paragraph-md cl-dblue">We are always planning to improvise health industry and always look forward to turning industry to health-tech. 
          Future is diverse and easier with technology, and it can be revolutionary for next era:</p>
        <ul class="list-check">
          <li>Progress tracker for patients and Therapist with detailed performance, Statistic and will show how average similar demographic patient preform weekly basis</li>
          <li>AI Powered Progression and Data Management, Charting and synchronising according to EMS</li>
          <li>Marker-less Motion capturing system</li>
          <li>Integrated trick movement identifier</li>
          <li>Biofeedback making Exercise mind body synchronized</li>
          <li>Direct messaging and Email communicative methods</li>
          <li>Audio Instructions for patients with visual challenges</li>
          <li>Multi Languages approach</li>
          <li>Video Recording feature for patients</li>
          <li>Assigning progression according to patients needs</li> 
          <li>Technical and Clinical - Supervisor support</li>
          <li>Tele-health and rehab platform</li>
          <li>Introducing all new way to conduct Group exercise Session</li>
        </ul>
        <a class="ps-btn primary-btn sm-btn" href="{{ url('/book-a-demo') }}">Book a Demo</a>
      </div>
    </div>
  </div>

  <!-- Happer staff -->
  <section class="staff-section pt-5" data-aos="slide-up" data-aos-duration="1000">
    <div class="container ps-border-top">
      <h2 class="paragraph-xxl cl-dblue pt-4"> Staff &amp; Owners are happy. </h2>
      <p class="paragraph-h">Using Your exercises Platform easing the process of dispensing Home Exercises Prescription(HEP). 
        This lets staff and Owners to focus on current patents and can be helpful in creating, handing HEP with replacing futuristic HEP</p>
      <div class="row pt-3">
        <div class="col-sm-12 col-md-6 p-0">
          <div class="row">
            <div class="col-md-6 col-sm-6 col-6 feature">
              <img alt="Billing icon" height="160" src="{{ asset('web_new/assets/img/administrative.png') }}" class="img-fluid"
                width="150" />
              <h3 class="paragraph-xml cl-dblue mb-3 mt-2 text-uppercase">Administrative</h3>
            </div>
            <div class="col-md-6 col-sm-6 col-6 feature">
              <img alt="Billing icon" height="150" src="{{ asset('web_new/assets/img/calendar.png') }}" class="img-fluid" width="150" />
              <h3 class="paragraph-xml cl-dblue mb-3 mt-2 text-uppercase">Advance Analytics</h3>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 p-0">
          <div class="row">
            <div class="col-md-6 col-sm-6 col-6 feature">
              <img alt="Billing icon" height="150" src="{{ asset('web_new/assets/img/bill.png') }}" class="img-fluid" width="150" />
              <h3 class="paragraph-xml cl-dblue mb-3 mt-2 text-uppercase">Feedback</h3>
            </div>
            <div class="col-md-6 col-sm-6 col-6 feature">
              <img alt="Billing icon" height="150" src="{{ asset('web_new/assets/img/customer-service.png') }}" class="img-fluid"
                width="150" />
              <h3 class="paragraph-xml cl-dblue mb-3 mt-2 text-uppercase">Reminder</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Booking calender -->
  <div class="row-full row-band">
    <div class="container">
      <div class="row padding">
        <div class="col-sm-8 mx-auto">
          <img class="img-fluid"
            src="https://Jane.app/assets/laptop_online_booking-c5b2a57433908e05922d19478776b3b957227faa2acd07b8fa2ff6f418960f2d.webp"
            data-aos="zoom-in" data-aos-duration="1000">
        </div>
      </div>
    </div>
  </div>

  <!-- Business counter -->
  <section class="container staff-section pt-5 section"  data-aos="fade" data-aos-duration="1000">
    <h2 class="paragraph-xxl cl-dblue ">Your Exercises View </h2>
    <p class="paragraph">Your Exercises  can help with administrative tasks giving you more </p>
    <div class="counter-section flex-wrap py-0">
      <div class="counter-container">
        <div class="counter" data-target="100">0</div>
        <p class="cl-gray paragraph-xml">Physiotherapist Associate.</p>
      </div>
      <div class="counter-container">
        <div class="counter" data-target="1000">0</div>
        <p class="cl-gray paragraph-xml">Patient Profile Created.</p>
      </div>
      <div class="counter-container">
        <div class="counter" data-target="500">0</div>
        <p class="cl-gray paragraph-xml">Star Rating Feedback by patients</p>
      </div>
    </div>
  </section>

  <!-- Testimonials -->
  <div class="container my-5">
    <div class="row" data-aos="fade-right" data-aos-duration="1000">
      <div class="col-10 mx-auto">
          <!-- Static Testimonial Cards -->
          <div id="testimonial-0" class="testimonial-card active">
            <div class="testimonial-image">
              <img src="https://storage.googleapis.com/a1aa/image/OiCEtdmdirrhIJSeIAiOVmkUgi39fUzx1recrHH0HxCmrS8nA.jpg"
                alt="Testimonial Image">
            </div>
            <div class="testimonial-text">
              <i class="fas fa-quote-left text-primary"></i>
              <p>Since Covid, I transitioned to a practice that has no staff. The patient portal and automation take all of that
                stress away.</p>
              <p class="testimonial-author">Jason, Chiropractor</p>
            </div>
          </div>
        
          <div id="testimonial-1" class="testimonial-card">
            <div class="testimonial-image">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTFHOF1zISh_KPeE10EG7FE6k_L4bnSQX-IxQ&s"
                alt="Testimonial Image">
            </div>
            <div class="testimonial-text">
              <i class="fas fa-quote-left text-primary"></i>
              <p>The software has streamlined our operations and made it easier to manage patient records. It's a game-changer
                for our practice.</p>
              <p class="testimonial-author">Emily, Dentist</p>
            </div>
          </div>
        
          <div id="testimonial-2" class="testimonial-card">
            <div class="testimonial-image">
              <img src="data:image/jpeg;base64,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"
                alt="Testimonial Image">
            </div>
            <div class="testimonial-text">
              <i class="fas fa-quote-left text-primary"></i>
              <p>I love how intuitive and user-friendly the platform is. It has significantly reduced the administrative burden
                on our staff.</p>
              <p class="testimonial-author">Michael, General Practitioner</p>
            </div>
          </div>
        
            <!-- Testimonial Dots -->
            <div class="testimonial-dots mt-3">
              <span class="active" data-index="0"></span>
              <span data-index="1"></span>
              <span data-index="2"></span>
            </div>
            <!-- Navigation Buttons -->
            <div class="testimonial-navigation text-center">
              <button id="prev-btn"><i class="fas fa-arrow-left"></i></button>
              <button id="next-btn"><i class="fas fa-arrow-right"></i></button>
            </div>
          </div>
    </div>
  </div>

  <!-- Problem solving --> 
  <div class="container ps-eml ps-border-top">
    <div class="header2" data-aos="fade-down" data-aos-duration="1000">
      <h1 class="paragraph-xxl cl-dblue pt-4">A serious problem-solver. That’s Your Exercises .</h1>
      <p class="paragraph-h">Feel over burdened with traditional way of Home Exercises, Try Your Exercises Platform.</p>
    </div>
    <div class="row features" data-aos="fade-down" data-aos-duration="1000">
      <div class="col-md-4 feature-item">
        <h5 class="paragraph-xml cl-dblue text-uppercase">Being affordable.</h5>
        <p class="cl-gray paragraph-md">Your exercises pricing simple subscription– so it always fits your budget. 
          No hidden extra charges or programs are needed to prescribing Home Exercises.</p>
      </div>
      <div class="col-md-4 feature-item">
        <h5 class="paragraph-xml cl-dblue text-uppercase">Your exercises is founded by Physiotherapists and has included many professionals facing time crunches between each patients.</h5>
        <p class="cl-gray paragraph-md">Your Exercises Is founded professionals who face serious time crunches and feel difficult to deliver home exercises programs. Additionally, they want to be ethical and want to be compliant with standard of practice. 
          Therefore, this  intuitive design with simple and effortless workflow was created.
          Our team truly understands clinic management and its needs to have easy-to-use software.</p>
      </div>
      <div class="col-md-4 feature-item">
        <h5 class="paragraph-xml cl-dblue text-uppercase">Your exercises keeps your patients data localised and understands importance of privacy and encryptions.</h5>
        <p class="cl-gray paragraph-md">Your practice’s data is stored in encrypted form. This is essential to ensure your clinic is acting in accordance with local privacy legislation. 
          In fact, clinics Patients log in from your website with unified hyperlink buttons on your website.</p>
      </div>
      <div class="col-md-4 feature-item">
        <h5 class="paragraph-xml cl-dblue text-uppercase">Your our own device is your asset.</h5>
        <p class="cl-gray paragraph-md">Your exercises work effortlessly on tablets, smartphones, laptops and desktop computers of any OS: Android, Apple, or Microsoft.</p>
      </div>
      <div class="col-md-4 feature-item">
        <h5 class="paragraph-xml cl-dblue text-uppercase">Unlimited support and troubleshooting</h5>
        <p class="cl-gray paragraph-md">Cloud-based platform means there are no programs to install and no costly IT people to call. Our support team will help get you started and will be by your side whenever you need assistanc.</p>
      </div>
      <div class="col-md-4 feature-item">
        <h5 class="paragraph-xml cl-dblue text-uppercase">Your Exercises  works in clinics of all type and size.</h5>
        <p class="cl-gray paragraph-md">We are specifically created for interdisciplinary clinics – so just one program works perfectly for everyone from physicians to physios to chiros to Chiropodist/Podiatrist to Athletic Therapist to Osteopaths to counsellors and midwives.</p>
      </div>
      <div class="col-md-4 feature-item">
        <h5 class="paragraph-xml cl-dblue text-uppercase">Your exercises stands out and beats all industry standards.</h5>
        <p class="cl-gray paragraph-md">With your exercises, you can share HEP programs to all pr practitioners’ who are involved in patient care. Add video or photos to capture a patient’s condition. Book multiple appointments at once. Let your exercises automatically remind p[patients to avoid missing their part in rehab. 
          Eventually reducing gaps in program of care. And so much more.</p>
      </div>
      <div class="col-md-4 feature-item">
        <h5 class="paragraph-xml cl-dblue text-uppercase">A beautiful design, with simplicity in mind.</h5>
        <p class="cl-gray paragraph-md">Your exercises’ intuitive design ensures a smooth and enjoyable experience for you and your staff — that even your patients will love.</p>
      </div>
    </div>
    <div class="footer2 ps-border-top">
      <p>Your Exercises  is lovingly made and supported by a remote-first team. While home will always be <del>ca</del> North
        Vancouver, we’re <a href="#">spreading our wings and growing</a> across the country (and the world!).</p>
      <a href="#">Read Your Exercises Story</a>
    </div>
    <div class="text-center mb-5">
      <a href="{{ url('/features') }}" class="ps-btn md-btn primary-btn mb-1">See Your exercises features</a>
      <a href="{{ url('/book-a-demo') }}" class="ps-btn md-btn primary-btn mb-1">Book a demo</a>
      <a href="#" class="ps-btn md-btn primary-btn mb-1">Start using</a>
    </div>
  </div>
@endsection
@section('pagejs')
  <script>
    // testimonial - card  start
    const testimonials = document.querySelectorAll('.testimonial-card');
    const dots = document.querySelectorAll('.testimonial-dots span');
    let currentIndex = 0;
    const switchInterval = 5000; // 5 seconds

    // Event listeners for navigation buttons
    document.getElementById('prev-btn').addEventListener('click', () => {
      showTestimonial(currentIndex - 1);
    });
    
    document.getElementById('next-btn').addEventListener('click', () => {
      showTestimonial(currentIndex + 1);
    });
    
    // Event listeners for dot clicks
    dots.forEach(dot => {
      dot.addEventListener('click', () => {
        showTestimonial(Number(dot.getAttribute('data-index')));
      });
    });
    
    function showTestimonial(index) {
      // Reset index if out of bounds
      if (index < 0) index = testimonials.length - 1;
      if (index >= testimonials.length) index = 0;

      // Hide all testimonials and remove active class from dots
      testimonials.forEach(card => card.classList.remove('active'));
      dots.forEach(dot => dot.classList.remove('active'));

      // Show current testimonial and set active dot
      testimonials[index].classList.add('active');
      dots[index].classList.add('active');

      currentIndex = index;
    }

    // Auto-change testimonials every 5 seconds
    setInterval(() => {
      showTestimonial(currentIndex + 1);
    }, switchInterval);
  </script>
@endsection