<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

  <!-- Fonts -->
  {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
  {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

  <!-- Styles -->
  {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

  <!-- logo -->
  <link rel="icon" type="image/ico" href="{{ asset('/storage/media/logo.png') }}">

  <!-- link css -->
  <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('fonts/themify/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
  <link rel="stylesheet" href="{{ asset('fonts/elegant-font/html-css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/animate/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/animsition/css/animsition.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/select2/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/slick/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/lightbox2/css/lightbox.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/util.css') }}">
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  <!-- link js -->
  <script type="text/javascript" src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('vendor/animsition/js/animsition.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
  <script type="text/javascript" src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('vendor/select2/select2.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('vendor/slick/slick.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('vendor/countdowntime/countdowntime.js') }}"></script>
  <script type="text/javascript" src="{{ asset('vendor/lightbox2/js/lightbox.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('vendor/sweetalert/sweetalert.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/config.js') }}"></script>
</head>

<body class="animsition">
  @include('inc.navbar')

  {{-- @include('inc.messages') --}}
  @yield('content')

  <!-- Footer -->
  <footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
    <div class="flex-w p-b-90">
      <div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
        <h4 class="s-text12 p-b-30">
          GET IN TOUCH
        </h4>

        <div>
          <p class="s-text7 w-size27">
            Any questions? Let us know in store at 273 An Dương Vương, Ward 3, District 5, Hồ Chí Minh city or call us
            on (+84) 28 3835 4409
          </p>

          <div class="flex-m p-t-30">
            <a href="#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
            <a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
            <a href="#" class="fs-18 color1 p-r-20 fa fa-pinterest-p"></a>
            <a href="#" class="fs-18 color1 p-r-20 fa fa-snapchat-ghost"></a>
            <a href="#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
          </div>
        </div>
      </div>

      <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
        <h4 class="s-text12 p-b-30">
          Categories
        </h4>

        <ul>
          <li class="p-b-9">
            <a href="/products?category=Scale Figure" class="s-text7">
              Scale Figure
            </a>
          </li>

          <li class="p-b-9">
            <a href="/products?category=Nendoroid" class="s-text7">
              Nendoroid
            </a>
          </li>

          <li class="p-b-9">
            <a href="/products?category=Figma" class="s-text7">
              Figma
            </a>
          </li>

          <li class="p-b-9">
            <a href="/products?category=Others" class="s-text7">
              Others
            </a>
          </li>
        </ul>
      </div>

      <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
        <h4 class="s-text12 p-b-30">
          Links
        </h4>

        <ul>
          <li class="p-b-9">
            <a href="#" class="s-text7">
              Search
            </a>
          </li>

          <li class="p-b-9">
            <a href="#" class="s-text7">
              About Us
            </a>
          </li>

          <li class="p-b-9">
            <a href="#" class="s-text7">
              Contact Us
            </a>
          </li>

          <li class="p-b-9">
            <a href="#" class="s-text7">
              Returns
            </a>
          </li>
        </ul>
      </div>

      <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
        <h4 class="s-text12 p-b-30">
          Help
        </h4>

        <ul>
          <li class="p-b-9">
            <a href="#" class="s-text7">
              Track Order
            </a>
          </li>

          <li class="p-b-9">
            <a href="#" class="s-text7">
              Returns
            </a>
          </li>

          <li class="p-b-9">
            <a href="#" class="s-text7">
              Shipping
            </a>
          </li>

          <li class="p-b-9">
            <a href="#" class="s-text7">
              FAQs
            </a>
          </li>
        </ul>
      </div>

      <div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
        <h4 class="s-text12 p-b-30">
          Newsletter
        </h4>

        <form>
          <div class="effect1 w-size9">
            <input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@example.com">
            <span class="effect1-line"></span>
          </div>

          <div class="w-size2 p-t-20">
            <!-- Button -->
            <button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
              Subscribe
            </button>
          </div>

        </form>
      </div>
    </div>

    <div class="t-center p-l-15 p-r-15">
      <div class="t-center s-text8 p-t-20">
        Copyright © 2018 All rights reserved. | This template is made with <i class="fa fa-heart-o"
          aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
      </div>
    </div>
  </footer>

  <!-- Back to top -->
  <div class="btn-back-to-top bg0-hov" id="myBtn">
    <span class="symbol-btn-back-to-top">
      <i class="fa fa-angle-double-up" aria-hidden="true"></i>
    </span>
  </div>

  <!-- Container Selection1 -->
  <div id="dropDownSelect1"></div>
  <div id="dropDownSelect2"></div>

  <script type="text/javascript" src="{{ asset('js/slick-custom.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
