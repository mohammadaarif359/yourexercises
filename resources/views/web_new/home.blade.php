@extends('web_new.layouts.main')

@section('content')
    <!-- Main Section -->
    <main class="main">
      <section class="main-section banner banner-section">
        <div class="container banner-column mt-0">
          <!-- <img class="banner-image" src="https://i.ibb.co/vB5LTFG/Headphone.png" alt="banner"> -->
          <img class="banner-image" src="{{ asset('web_new/assets/img/hero2.png') }}" alt="banner">
          <div class="banner-inner">
            <h1 class="heading-xl cl-dblue">Experience <span class="cl-lBlue">Exercise Like Never</span> Before</h1>
            <p class="paragraph cl-dblue">
              Enjoy award-winning stereo beats with wireless listening freedom and sleek,
              streamlined with premium padded and delivering first-rate playback.
            </p>
            <button class="ps-btn lg-btn primary-btn ps-herobtn">
              Book Demo
            </button>
          </div>
        </div>
      </section>
    </main>

    <section class="features-section pt-5">
   <div class="container">
    <h2 class="paragraph-xxl cl-dblue"> Everyone’s day just got easier </h2>
    <p class="paragraph">  Jane offers online booking, charting, scheduling, secure video, and invoicing on one secure, beautifully designed system. </p>
      <div class="row flex-wrap">

      <div class="col-md-3 col-sm-6 col-6 feature">
        <h3 class="paragraph-xl cl-dblue my-3"><i class="fas fa-file-alt"></i> Paperless Patient Management</h3>
        <p class="cl-gray paragraph-lg px-2">
          Simplify your practice by digitizing patient records, ensuring seamless and eco-friendly management.
        </p>
      </div>
      
      <div class="col-md-3 col-sm-6 col-6 feature">
        <h3 class="paragraph-xl cl-dblue my-3"><i class="fas fa-chart-line"></i> Advanced Performance Dashboard</h3>
        <p class="cl-gray paragraph-lg px-2">
          Monitor key performance metrics and gain insights into patient progress with an intuitive dashboard.
        </p>
      </div>
      
      <div class="col-md-3 col-sm-6 col-6 feature">
        <h3 class="paragraph-xl cl-dblue my-3"><i class="fas fa-pencil-alt"></i> Custom Exercise Creation</h3>
        <p class="cl-gray paragraph-lg px-2">
          Build unique exercises that cater to the individual needs of your patients.
        </p>
      </div>
      
      <div class="col-md-3 col-sm-6 col-6 feature">
        <h3 class="paragraph-xl cl-dblue my-3"><i class="fas fa-bullhorn"></i> Boost Your Online Presence</h3>
        <p class="cl-gray paragraph-lg px-2">
          Strengthen your clinic’s online visibility with integrated tools designed for growth.
        </p>
      </div>
      
      <div class="col-md-3 col-sm-6 col-6 feature">
        <h3 class="paragraph-xl cl-dblue my-3"><i class="fas fa-link"></i> Connect with Your Existing Website</h3>
        <p class="cl-gray paragraph-lg px-2">
          Seamlessly integrate with your current website for a cohesive and professional experience.
        </p>
      </div>
      
      <div class="col-md-3 col-sm-6 col-6 feature">
        <h3 class="paragraph-xl cl-dblue my-3"><i class="fas fa-heartbeat"></i> Track Patient Health Progress</h3>
        <p class="cl-gray paragraph-lg px-2">
          Stay updated on your patients' health journeys with comprehensive progress tracking.
        </p>
      </div>
      
      <div class="col-md-3 col-sm-6 col-6 feature">
        <h3 class="paragraph-xl cl-dblue my-3"><i class="fas fa-comments"></i> Gather Feedback on Your Treatment</h3>
        <p class="cl-gray paragraph-lg px-2">
          Enhance your services by collecting and analyzing patient feedback effectively.
        </p>
      </div>
      
      <div class="col-md-3 col-sm-6 col-6 feature">
        <h3 class="paragraph-xl cl-dblue my-3"><i class="fas fa-lightbulb"></i> Get Automated Suggestions</h3>
        <p class="cl-gray paragraph-lg px-2">
          Receive smart recommendations to improve patient care and streamline clinic operations.
        </p>
      </div>

      </div>
   </div>
  </section>
  
  <section class="testimonial-section">
   <div class="container">
    <blockquote class="m-0 cl-white">
     "Jane Family, you guys are really awesome. Keep the amazing new features coming."
     <footer>
      - Auto Solutions Best Practice Summit 2020
     </footer>
    </blockquote>
   </div>
  </section>

  <div class="container">
    <div class="row pt-5">
        <div class="col-md-6 text-center">
        <img alt="Take a peek at the future of (even smoother) clinic life." class="img-fluid"
            src="https://jane.app/assets/online_appts_groups-7cd35dc16d39b8f09852430c34f6ce875cfe83939fbdfef1d2ef9af23aefc0ec.webp">
        </div>
        <div class="col-md-6 text-start">
        <h3 class="paragraph-xl cl-dblue">Take a peek at the future of (even smoother)
            clinic&nbsp;life.</h3>
        <p class="paragraph-lg cl-dblue">We’re always dreaming up new ways to help you out. Our team loves to share what we’re
            working on, like:</p>
        <ul class="list-check">
            <li>Treatment Add-Ons</li>
            <li>AI-powered Charting</li>
            <li>Secure Clinic Messaging</li>
            <li>Supervisor Support</li>
            <li>Integrated eFax</li>
            <li>ePrescription Services</li>
            <li>Improved 1:1 and Group Telehealth experiences, and much more!</li>
        </ul>
        <a class="ps-btn primary-btn md-btn" href="/book_a_demo">Book a Demo</a>
        </div>
    </div>
  </div>

  <section class="staff-section pt-5 ">
   <div class="container ps-border-top">
    <h2 class="paragraph-xxl cl-dblue pt-4"> Staff &amp; Owners are happy. </h2>
    <p class="paragraph-h">Jane can help with administrative tasks giving you more time back in your day. Plus, because Jane is online, there is no need for inconvenient updates. </p>
      <div class="row pt-3">
        <div class="col-sm-12 col-md-6 p-0">
          <div class="row">
            <div class="col-md-6 col-sm-6 col-6 feature">
              <img alt="Billing icon" height="150" src="{{ asset('web_new/assets/img/customer-service.png') }}" class="img-fluid" width="150" />
              <h3 class="paragraph-xl cl-dblue my-3 text-uppercase"> ONLINE BOOKING </h3>
              <p class="cl-gray paragraph-lg px-2 ">Jane’s most talked-about feature, developed to be incredibly easy for
                patients to book and manage their visits.</p>
            </div>
            <div class="col-md-6 col-sm-6 col-6 feature">
              <img alt="Billing icon" height="150" src="{{ asset('web_new/assets/img/calendar.png') }}" class="img-fluid" width="150" />
              <h3 class="paragraph-xl cl-dblue my-3 text-uppercase">Schedule</h3>
              <p class="cl-gray paragraph-lg px-2">Enjoy a well-organized day. Jane's scheduling helps you manage your time,
                letting you focus on what really matters —
                your patients or clients.</p>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-6 p-0">
          <div class="row">
            <div class="col-md-6 col-sm-6 col-6 feature">
              <img alt="Billing icon" height="150" src="{{ asset('web_new/assets/img/bill.png') }}" class="img-fluid" width="150" />
              <h3 class="paragraph-xl cl-dblue my-3 text-uppercase">Billing</h3>
              <p class="cl-gray paragraph-lg px-2">Bill your visits and accept payments in just a couple of clicks, and have
                Jane do all the math for you – even if you're
                billing insurers.</p>
            </div>
            <div class="col-md-6 col-sm-6 col-6 feature">
              <img alt="Billing icon" height="150" src="{{ asset('web_new/assets/img/customer-service.png') }}" class="img-fluid" width="150" />
              <h3 class="paragraph-xl cl-dblue my-3 text-uppercase">Chart</h3>
              <p class="cl-gray paragraph-lg px-2">We've helped hundreds of clinics switch to Jane. Our team can import
                scanned chart notes, patient lists, and guide you
                in customizing chart templates.</p>
            </div>
          </div>
        </div>
      </div>
   </div>
  </section>

  <div class="row-full row-band">
    <div class="container">
      <div class="row padding">
        <div class="col-sm-8 mx-auto">
            <img class="img-fluid" src="https://jane.app/assets/laptop_online_booking-c5b2a57433908e05922d19478776b3b957227faa2acd07b8fa2ff6f418960f2d.webp">
        </div>
      </div>
    </div>
  </div>

  <section class="container staff-section pt-5">
    <h2 class="paragraph-xxl cl-dblue ">Clinic Master View </h2>
    <p class="paragraph">Jane can help with administrative tasks giving you more  </p>
    <div class="counter-section py-0">
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

  <div class="container my-5">
    <div class="testimonial-card col-10 mx-auto">
      <div class="testimonial-image">
        <img id="testimonial-img" alt="A doctor on a video call displayed on a laptop screen" class="img-fluid"
          height="150"
          src="https://storage.googleapis.com/a1aa/image/OiCEtdmdirrhIJSeIAiOVmkUgi39fUzx1recrHH0HxCmrS8nA.jpg"
          width="150" />
      </div>
      <div class="testimonial-text">
        <div class="testimonial-quote">
          <i class="fas fa-quote-left"></i>
        </div>
        <p id="testimonial-text-cg" class="div-min-height m-0 cl-dblue">
          Since Covid, I transitioned to a practice that has no staff. At first, I was worried if I could handle running a
          busy office with no staff. The ease of use, the patient portal and the automation take all of that stress away.
        </p>
        <p class="testimonial-author m-0" id="testimonial-author">
          Jason, <span class="testimonial-author-role">Chiropractor</span>
        </p>
        <div class="testimonial-navigation">
          <div class="testimonial-dots">
            <span class="active"></span>
            <span></span>
            <span></span>
          </div>
          <div class="testimonial-navigation">
            <button id="prev-btn" class="mr-2">
              <i class="fas fa-arrow-left"></i>
            </button>
            <button id="next-btn">
              <i class="fas fa-arrow-right"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container ps-eml ps-border-top">
    <div class="header2">
      <h1>A serious problem-solver. That’s Jane.</h1>
      <p>See the difference the right software can make in your clinic.</p>
    </div>
    <div class="row features">
      <div class="col-md-4 feature-item">
        <h5>Being affordable matters to Jane.</h5>
        <p>Jane’s pricing is based on the number of practitioners in your clinic – so it always fits your budget. No extra
          programs are needed to run your clinic.</p>
      </div>
      <div class="col-md-4 feature-item">
        <h5>There’s a powerhouse team behind Jane.</h5>
        <p>Jane was created by people who operate multiple clinics and people who specialize in simple, intuitive design.
          Our team truly understands clinic management and easy-to-use software.</p>
      </div>
      <div class="col-md-4 feature-item">
        <h5>Jane stores your clinic’s medical data in country.</h5>
        <p>Your practice’s data is stored in one of our regional data centers (USA, Canada, United Kingdom, Australia).
          This is essential to ensure your clinic is acting in accordance with local privacy legislation.</p>
      </div>
      <div class="col-md-4 feature-item">
        <h5>Bring your own device.</h5>
        <p>Jane works great on tablets, smartphones, laptops and desktop computers of any flavor: Android, Apple, or
          Microsoft.</p>
      </div>
      <div class="col-md-4 feature-item">
        <h5>Jane offers unlimited support.</h5>
        <p>Cloud-based software means there are no programs to install and no costly IT people to call. Jane will help get
          you started and will be by your side whenever you need assistance.</p>
      </div>
      <div class="col-md-4 feature-item">
        <h5>Jane works in clinics of every type and size.</h5>
        <p>Jane was specifically created for interdisciplinary clinics – so just one program works perfectly for everyone
          from physios and massage therapists to counsellors and midwives.</p>
      </div>
      <div class="col-md-4 feature-item">
        <h5>No one has features like Jane.</h5>
        <p>With Jane, chart privately or share with the whole clinic. Add video or photos to capture a patient’s
          condition. Book multiple appointments at once. Let Jane automatically schedule to avoid awkward gaps in
          practitioners’ schedules. And so much more.</p>
      </div>
      <div class="col-md-4 feature-item">
        <h5>A beautiful design, with simplicity in mind.</h5>
        <p>Jane’s intuitive design ensures a smooth and enjoyable experience for you and your staff — that even your
          patients will love.</p>
      </div>
    </div>
    <div class="footer2 ps-border-top">
      <p >Jane is lovingly made and supported by a remote-first team. While home will always be <del>ca</del> North
        Vancouver, we’re <a href="#">spreading our wings and growing</a> across the country (and the world!).</p>
      <a href="#">Read Jane's Story</a>
    </div>
    <div class="text-center mb-5">
      <a href="#" class="ps-btn md-btn primary-btn">See Jane's features</a>
      <a href="#" class="ps-btn md-btn primary-btn">Book a demo</a>
      <a href="#" class="ps-btn md-btn primary-btn">Start using Jane</a>
    </div>
  </div>
@endsection