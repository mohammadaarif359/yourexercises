<header class="new-navbar">
    <nav class="navbar">
        <div class="logo">
        <a href="{{ url('/') }}">
            <img src="{{ asset('web_new/assets/img/your_exercises_logo.svg') }}" alt="your exercises logo">
        </a>
        </div>
        <div class="menu-toggle">&#9776;</div>
        <ul class="nav-links">
            @if(Auth::user())
                @if(Auth::user()->hasRole('doctor'))
                    <li><a href="{{ url('/doctor/profile') }}">Profile</a></li>
                @endif
                @if(Auth::user()->hasRole('patient'))
                    <li><a href="{{ url('/patient/profile') }}">Profile</a></li>
                    <li><a href="{{ url('/patient/plan') }}">Plans</a></li>
                @endif
            @endif    
            <li>
                <div class="header-sidebtn">
                    @if(!Auth::user())
                    <a href="{{ isset($doctor_page) && $doctor_page == 1 ? url('login?doctor_uuid='.$data['uuid']) : url('login')  }}" class="ps-btn sm-btn primary-btn ps-header-btn">Patient Login</a>
                    <a href="{{ url('admin/login') }}" class="ps-btn sm-btn primary-btn ps-header-btn">Doctor Login</a>
                    @else
                        <a href="{{ url('logout') }}" class="ps-btn sm-btn primary-btn ps-header-btn"><i class="fas fa-sign-out-alt pt-1 px-1"></i></a>
                    @endif
                </div>
            </li>
        </ul>
    </nav>
</header>