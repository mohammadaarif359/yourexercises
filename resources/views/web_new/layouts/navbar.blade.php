{{--<header class="header" id="header">
    <nav class="navbar container-fluid px-4">
      <a href="{{ url('/') }}" class="brand">Your Exercises</a>
      <div class="burger" id="burger">
        <span class="burger-line"></span>
        <span class="burger-line"></span>
        <span class="burger-line"></span>
      </div>
      <div class="menu" id="menu">
        <ul class="menu-inner">
          <li class="menu-item"><a href="{{ url('/') }}" class="menu-link">Home</a></li>
          <li class="menu-item"><a href="{{ url('/features') }}" class="menu-link">Features</a></li>
          <li class="menu-item"><a href="{{ url('/about') }}" class="menu-link">About</a></li>
          <li class="menu-item"><a href="{{ url('/contact') }}" class="menu-link">Contact</a></li>
          <li class="menu-item"><a href="{{ url('/pricing') }}" class="menu-link">Pricing</a></li>
        </ul>
      </div>
      <div class="header-sidebtn">
        <a href="{{ url('/sign-in') }}"  class="ps-btn sm-btn primary-btn ps-header-btn">Sign in</a>
        <a href="{{ url('/book-a-demo') }}" class="ps-btn sm-btn primary-btn ps-header-btn">Book Demo</a>
      </div>
    </nav>
  </header>--}}
<header class="new-navbar">
  <nav class="navbar">
    <div class="logo">
      <a href="{{ url('/') }}">
        <img src="{{ asset('web_new/assets/img/your_exercises_logo.svg') }}" alt="your exercises logo">
      </a>  
    </div>
    <div class="menu-toggle">&#9776;</div>
    <ul class="nav-links">
      <li><a href="{{ url('/') }}">Home</a></li>
      <li class="ps-dropdown feature-dropdown">
        <a href="{{ url('/features') }}" class="nav-link ps-dropdown-toggle">Feature <i class="fas fa-chevron-down ml-2"></i></a>
        <ul class="ps-dropdown-menu row">
          <li class="col-sm-4 col-lg-3 ">
            <a href="{{ url('feature/dispensing-home-exercises-program-made-easy') }}" class="d-flex">
              <i class="fas fa-heartbeat"></i>
              <div>
                <h5>Dispensing Home Exercises Program made easy</h5>
                <p>Anyone Practitioner can book prescribe and dispense HEP in just a few clicks given how user-friendly your exercises look 
                  and feels — no matter their level of computer experience</p>
              </div>
            </a>
            <a href="{{ url('feature/charting-doumentation-make-ems-friendly') }}" class="d-flex">
              <i class="fas fa-chart-line"></i>
              <div>
                <h5>Chartings, Documentation and making EMS friendly</h5>
                <p>Seed up your patient charting with helpful features like Templates, Phrases and Smart Options & Narratives, 
                  Your Exercises own AI-powered Voice to Chart, and more
                </p>
              </div>
            </a>
            <a href="{{ url('feature/security-and-reliability') }}" class="d-flex">
              <i class="fas fa-recycle"></i>
              <div>
                <h5>Security and Reliability</h5>
                <p>Experience Peace of Mind with Unmatched Security and Reliability At Your Exercises, 
                  we prioritize your practice’s security and efficiency</p>
              </div>
            </a>
          </li>
          <li class="col-sm-4 col-lg-3 ">
            <a href="{{ url('feature/integrating-to-your-website-and-social-media') }}" class="d-flex">
              <i class="fas fa-bullhorn"></i>
              <div>
                <h5>Integrating to your website and social media</h5>
                <p>Your exercise helps you to connect your own website and boots on social media</p>
              </div>
            </a>

            <a href="{{ url('feature/personalized-home-page-and-other-patients-landing-pages') }}" class="d-flex">
              <i class="fas fa-desktop"></i>
              <div>
                <h5>Personalized Home Page and other patients landing pages</h5>
                <p>Our Personalized Home Page and customized patient landing pages are designed to help you showcase your unique brand, 
                  making your practice stand out and building stronger, more trusting relationships with your clients</p>
              </div>
            </a>

            <a href="{{ url('feature/simplifying-backend-usage-and-data-management') }}" class="d-flex">
              <i class="fas fa-database"></i>
              <div>
                <h5>Simplifying Backend usage and data management</h5>
                <p>At Yourexercises.com, we believe that the future of healthcare and fitness is rooted in smart data management and actionable insights</p>
              </div>
            </a>
          </li>
          <li class="col-sm-4 col-lg-3 ">
            <a href="{{ url('feature/reporting') }}" class="d-flex">
              <i class="fas fa-file-alt"></i>
              <div>
                <h5>Reporting</h5>
                <p>Everything you need to stay on top of your patients performance. Your practice’s data is automatically captured and presented in intuitive, 
                  actionable reports — removing the hassle of manual spreadsheets and minimizing errors</p>
              </div>
            </a>

            <a href="{{ url('feature/24-7-support') }}" class="d-flex">
              <i class="fas fa-comments"></i>
              <div>
                <h5>24*7 Support</h5>
                <p>We’ve kept on helping around the world round the clock. And we’re happy to help you too</p>
              </div>
            </a>

            <a href="{{ url('feature/automatic-notification-and-reminders') }}" class="d-flex">
              <i class="fas fa-lightbulb"></i>
              <div>
                <h5>Automatic notifications & reminders</h5>
                <p>Your exercise stays on top of patient communication for you by automatically sending gentle but smart reminders to your patients via email</p>
              </div>
            </a>
          </li>
          <span class="col-sm-12 header-feature-link">
            <a href="{{ url('features') }}">
              Feature Overview <i class="fas fa-long-arrow-right ml-2"></i>
            </a>
          </span>
        </ul>
      </li>

      <li class="ps-dropdown-mobile">
      <a href="{{ url('/features') }}" class="nav-link ps-dropdown-toggle-mobile">Feature <i class="fas fa-chevron-down"></i></a>
      <ul class="ps-dropdown-menu-mobile">
        <li class="col-12 p-0">
          <a href="{{ url('feature/dispensing-home-exercises-program-made-easy') }}" class="d-flex">
            <i class="fas fa-heartbeat"></i>
            <div>
              <h5>Dispensing Home Exercises Program made easy</h5>
              <p>Anyone Practitioner can book prescribe and dispense HEP in just a few clicks given how user-friendly your exercises look 
                and feels — no matter their level of computer experience</p>
            </div>
          </a>
          <a href="{{ url('feature/charting-doumentation-make-ems-friendly') }}" class="d-flex">
            <i class="fas fa-chart-line"></i>
            <div>
              <h5>Chartings, Documentation and making EMS friendly</h5>
              <p>Seed up your patient charting with helpful features like Templates, Phrases and Smart Options & Narratives, 
                Your Exercises own AI-powered Voice to Chart, and more
              </p>
            </div>
          </a>
          <a href="{{ url('feature/security-and-reliability') }}" class="d-flex">
            <i class="fas fa-recycle"></i>
            <div>
              <h5>Security and Reliability</h5>
              <p>Experience Peace of Mind with Unmatched Security and Reliability At Your Exercises, 
                we prioritize your practice’s security and efficiency</p>
            </div>
          </a>
        </li>
        <li class="col-12 p-0">
          <a href="{{ url('feature/integrating-to-your-website-and-social-media') }}" class="d-flex">
            <i class="fas fa-bullhorn"></i>
            <div>
              <h5>Integrating to your website and social media</h5>
              <p>Your exercise helps you to connect your own website and boots on social media</p>
            </div>
          </a>

          <a href="{{ url('feature/personalized-home-page-and-other-patients-landing-pages') }}" class="d-flex">
            <i class="fas fa-desktop"></i>
            <div>
              <h5>Personalized Home Page and other patients landing pages</h5>
              <p>Our Personalized Home Page and customized patient landing pages are designed to help you showcase your unique brand, 
                making your practice stand out and building stronger, more trusting relationships with your clients</p>
            </div>
          </a>

          <a href="{{ url('feature/simplifying-backend-usage-and-data-management') }}" class="d-flex">
            <i class="fas fa-database"></i>
            <div>
              <h5>Simplifying Backend usage and data management</h5>
              <p>At Yourexercises.com, we believe that the future of healthcare and fitness is rooted in smart data management and actionable insights</p>
            </div>
          </a>
        </li>
        <li class="col-12 p-0">
          <a href="{{ url('feature/reporting') }}" class="d-flex">
            <i class="fas fa-file-alt"></i>
            <div>
              <h5>Reporting</h5>
              <p>Everything you need to stay on top of your patients performance. Your practice’s data is automatically captured and presented in intuitive, 
                actionable reports — removing the hassle of manual spreadsheets and minimizing errors</p>
            </div>
          </a>

          <a href="{{ url('feature/24-7-support') }}" class="d-flex">
            <i class="fas fa-comments"></i>
            <div>
              <h5>24*7 Support</h5>
              <p>We’ve kept on helping around the world round the clock. And we’re happy to help you too</p>
            </div>
          </a>

          <a href="{{ url('feature/automatic-notification-and-reminders') }}" class="d-flex">
            <i class="fas fa-lightbulb"></i>
            <div>
              <h5>Automatic notifications & reminders</h5>
              <p>Your exercise stays on top of patient communication for you by automatically sending gentle but smart reminders to your patients via email</p>
            </div>
          </a>
        </li>
        <span class="col-sm-12 header-feature-link-mobile">
          <a href="{{ url('/features') }}">
            Feature Overview <i class="fas fa-long-arrow-right ml-3"></i>
          </a>
        </span>
      </ul>
      </li>
      <li><a href="{{ url('about') }}">About</a></li>
      <li><a href="#">Contact</a></li>
      <li><a href="{{ url('pricing') }}">Pricing</a></li>
      <li>
        <div class="header-sidebtn">
          <a href="{{ url('login') }}" class="ps-btn sm-btn primary-btn ps-header-btn">Sign in</a>
          <a href="{{ url('book-a-demo') }}" class="ps-btn sm-btn primary-btn ps-header-btn">Book Demo</a>
          @if(Auth::user())
          <a href="{{ url('logout') }}" class="ps-btn sm-btn primary-btn ps-header-btn"><i class="fas fa-sign-out-alt pt-1 px-1"></i></a>
          @endif
        </div>
      </li>
    </ul>
  </nav>
</header>

  
    