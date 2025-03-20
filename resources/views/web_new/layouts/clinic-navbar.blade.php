<header class="new-navbar">
    <nav class="navbar">
        <div class="logo">
        <a href="{{ url('/') }}">
            <img src="{{ asset('web_new/assets/img/your_exercises_logo.svg') }}" alt="your exercises logo">
        </a>
        </div>
        <div class="menu-toggle">&#9776;</div>
        <ul class="nav-links">
            <li>
                <div class="header-sidebtn">
                    <a href="{{ url('login') }}" class="ps-btn sm-btn primary-btn ps-header-btn">Login in</a>
                    <a href="{{ url('admin.login') }}" class="ps-btn sm-btn primary-btn ps-header-btn">Doctor Login</a>
                    @if(Auth::user())
                        <a href="{{ url('logout') }}" class="ps-btn sm-btn primary-btn ps-header-btn"><i class="fas fa-sign-out-alt pt-1 px-1"></i></a>
                    @endif
                </div>
            </li>
        </ul>
    </nav>
</header>