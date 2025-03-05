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
      <img src="{{ asset('web_new/assets/img/your_exercises_logo.svg') }}" alt="your exercises logo">
    </div>
    <div class="menu-toggle">&#9776;</div>
    <ul class="nav-links">
      <li><a href="{{ url('/') }}">Home</a></li>
      <li class="ps-dropdown feature-dropdown">
        <a href="{{ url('/features') }}" class="nav-link ps-dropdown-toggle">Feature <i class="fas fa-chevron-down ml-2"></i></a>
        <ul class="ps-dropdown-menu row">
          <li class="col-sm-4 col-lg-3 ">
            <a href="{{ url('feature/deatils') }}" class="d-flex">
              <i class="fas fa-file-alt"></i>
              <div>
                <h5>Paperless Patient Management</h5>
                <p>Simplify your practice by digitizing patient records, Simplify your practice by digitizing patient
                  records</p>
              </div>
            </a>
            <a href="{{ url('feature/deatils') }}" class="d-flex">
              <i class="fas fa-chart-line"></i>
              <div>
                <h5>Advanced Performance Dashboard</h5>
                <p>Monitor key performance metrics and gain insights into patient progress with an intuitive dashboard.
                </p>
              </div>
            </a>
            <a href="{{ url('feature/deatils') }}" class="d-flex">
              <i class="fas fa-pencil-alt"></i>
              <div>
                <h5>Custom Exercise Creation</h5>
                <p>Build unique exercises that cater to the individual needs of your patients.</p>
              </div>
            </a>
          </li>
          <li class="col-sm-4 col-lg-3 ">
            <a href="{{ url('feature/deatils') }}" class="d-flex">
              <i class="fas fa-bullhorn"></i>
              <div>
                <h5>Boost Your Online Presence</h5>
                <p>Strengthen your clinic’s online visibility with integrated tools designed for growth.</p>
              </div>
            </a>

            <a href="{{ url('feature/deatils') }}" class="d-flex">
              <i class="fas fa-link"></i>
              <div>
                <h5>Connect with Your Existing Website</h5>
                <p>Seamlessly integrate with your current website for a cohesive and professional experience.</p>
              </div>
            </a>

            <a href="{{ url('feature/deatils') }}" class="d-flex">
              <i class="fas fa-heartbeat"></i>
              <div>
                <h5>Track Patient Health Progress</h5>
                <p>Stay updated on your patients' health journeys with comprehensive progress tracking.</p>
              </div>
            </a>
          </li>
          <li class="col-sm-4 col-lg-3 ">
            <a href="{{ url('feature/deatils') }}" class="d-flex">
              <i class="fas fa-heartbeat"></i>
              <div>
                <h5>Track Patient Health Progress</h5>
                <p>Stay updated on your patients' health journeys with comprehensive progress tracking.</p>
              </div>
            </a>

            <a href="{{ url('feature/deatils') }}" class="d-flex">
              <i class="fas fa-comments"></i>
              <div>
                <h5>Gather Feedback on Your Treatment</h5>
                <p>Enhance your services by collecting and analyzing patient feedback effectively.</p>
              </div>
            </a>

            <a href="{{ url('feature/deatils') }}" class="d-flex">
              <i class="fas fa-lightbulb"></i>
              <div>
                <h5>Get Automated Suggestions</h5>
                <p>Receive smart recommendations to improve patient care and streamline clinic operations.</p>
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
          <a href="{{ url('feature/deatils') }}" class="d-flex">
            <i class="fas fa-file-alt"></i>
            <div>
              <h5>Paperless Patient Management</h5>
              <p>Simplify your practice by digitizing patient records, Simplify your practice by digitizing patient
                records</p>
            </div>
          </a>
          <a href="{{ url('feature/deatils') }}" class="d-flex">
            <i class="fas fa-chart-line"></i>
            <div>
              <h5>Advanced Performance Dashboard</h5>
              <p>Monitor key performance metrics and gain insights into patient progress with an intuitive dashboard.
              </p>
            </div>
          </a>
          <a href="{{ url('feature/deatils') }}" class="d-flex">
            <i class="fas fa-pencil-alt"></i>
            <div>
              <h5>Custom Exercise Creation</h5>
              <p>Build unique exercises that cater to the individual needs of your patients.</p>
            </div>
          </a>
        </li>
        <li class="col-12 p-0">
          <a href="{{ url('feature/deatils') }}" class="d-flex">
            <i class="fas fa-bullhorn"></i>
            <div>
              <h5>Boost Your Online Presence</h5>
              <p>Strengthen your clinic’s online visibility with integrated tools designed for growth.</p>
            </div>
          </a>
        
          <a href="{{ url('feature/deatils') }}" class="d-flex">
            <i class="fas fa-link"></i>
            <div>
              <h5>Connect with Your Existing Website</h5>
              <p>Seamlessly integrate with your current website for a cohesive and professional experience.</p>
            </div>
          </a>
        
          <a href="{{ url('feature/deatils') }}" class="d-flex">
            <i class="fas fa-heartbeat"></i>
            <div>
              <h5>Track Patient Health Progress</h5>
              <p>Stay updated on your patients' health journeys with comprehensive progress tracking.</p>
            </div>
          </a>
        </li>
        <li class="col-12 p-0">
          <a href="{{ url('feature/deatils') }}" class="d-flex">
            <i class="fas fa-heartbeat"></i>
            <div>
              <h5>Track Patient Health Progress</h5>
              <p>Stay updated on your patients' health journeys with comprehensive progress tracking.</p>
            </div>
          </a>
        
          <a href="{{ url('feature/deatils') }}" class="d-flex">
            <i class="fas fa-comments"></i>
            <div>
              <h5>Gather Feedback on Your Treatment</h5>
              <p>Enhance your services by collecting and analyzing patient feedback effectively.</p>
            </div>
          </a>
        
          <a href="{{ url('feature/deatils') }}" class="d-flex">
            <i class="fas fa-lightbulb"></i>
            <div>
              <h5>Get Automated Suggestions</h5>
              <p>Receive smart recommendations to improve patient care and streamline clinic operations.</p>
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

  
    