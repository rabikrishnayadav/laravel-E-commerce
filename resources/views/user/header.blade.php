<!-- ***** Preloader Start ***** -->
<div id="preloader">
  <div class="jumper">
    <div></div>
    <div></div>
    <div></div>
  </div>
</div>
<!-- ***** Preloader End ***** -->
<header class="">
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="{{url('/')}}"><h2>Sixteen <em>Clothing</em></h2></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{url('/')}}">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('product-page')}}">Our Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('about-page')}}">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('contact-page')}}">Contact Us</a>
          </li>
          <li class="nav-item">
            @if (Route::has('login'))
            @auth
            <x-app-layout></x-app-layout>
            @else
            <li><a class="nav-link" href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a></li>
            @if (Route::has('register'))
            <li><a class="nav-link" href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a></li>
            @endif
            @endauth
            @endif
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>