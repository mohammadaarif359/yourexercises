<header class="header" id="header">
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
  </header>