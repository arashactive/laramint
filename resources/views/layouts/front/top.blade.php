<nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
    <a href="{{ route('home') }}" class="navbar-brand p-0">
        <!--<h1 class="m-0">ICET</h1>-->
         <img src="{{ URL::to('img/site-logo.png') }}" alt="Logo"> 
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav mx-auto py-0">
            <a href="{{ route('home') }}" class="nav-item nav-link">Home</a>
            <a href="{{ route('about') }}" class="nav-item nav-link">About Us</a>
<!--            <a href="{{ route('front.courses') }}" class="nav-item nav-link">Courses</a>
            <a href="{{ route('front.plans') }}" class="nav-item nav-link">Plans</a>-->
            <a href="{{ route('front.news') }}" class="nav-item nav-link">News</a>

            <a href="{{ route('gallery') }}" class="nav-item nav-link">Gallery</a>
            <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>
        </div>
        @if (Route::has('login'))
        @auth
        <a href="{{ route('dashboard') }}" class="btn rounded-pill py-2 px-4 ms-3 d-none d-lg-block">Dashboard</a>
        @else
        <a href="{{ route('login') }}" class="btn rounded-pill py-2 px-4 ms-3 d-none d-lg-block">Login</a>    
        @endauth
        
        @endif
    </div>
</nav>
