<header class="header" id="header">
    <nav class="navbar container-fluid px-4">
    <a href="/" class="brand">Brand</a>
    <div class="burger" id="burger">
        <span class="burger-line"></span>
        <span class="burger-line"></span>
        <span class="burger-line"></span>
    </div>
    <div class="menu" id="menu">
        <ul class="menu-inner">
        <li class="menu-item"><a href="{{ url('/') }}" class="menu-link">Home</a></li>
        <li class="menu-item"><a href="{{ url('/features') }}" class="menu-link">Feature</a></li>
        <li class="menu-item"><a href="{{ url('/about') }}" class="menu-link">About</a></li>
        <li class="menu-item"><a href="{{ url('/contact') }}" class="menu-link">Contact</a></li>
        <li class="menu-item"><a href="{{ url('/pricing') }}" class="menu-link">Pricing</a></li>
        </ul>
    </div>
    <a href="#" class="ps-btn sm-btn primary-btn ps-header-btn">Book Demo</a>
    </nav>
</header>