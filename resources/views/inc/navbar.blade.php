<!-- Header -->
<header class="header1">
  <!-- Header desktop -->
  <div class="container-menu-header">
    <div class="topbar"></div>
    <div class="wrap_header">
      <!-- Logo -->
      <a href="{{ url('/') }}" class="logo">
        <img src="{{ asset('/storage/media/logo.png') }}" alt="IMG-LOGO">
      </a>

      <!-- Menu -->
      <div class="wrap_menu">
        <nav class="menu">
          <ul class="main_menu">
            <li>
              <a href="/">Home</a>
            </li>

            <li>
              <a href="/products">Shop</a>
            </li>

            <li>
              <a href="/about">About</a>
            </li>

            <li>
              <a href="/contact">Contact</a>
            </li>
          </ul>
        </nav>
      </div>

      <!-- Header Icon -->
      <div class="header-icons">
        @auth
      <a href="/user/profile" class="header-wrapicon1 dis-block">Welcome {{ Auth::user()->first_name }}</a>
        <span class="linedivide1"></span>
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button id="btn-logout" type="submit" href="/logout" class="header-wrapicon1 dis-block">Logout</button>
        </form>
        @endauth
        @guest
        <a href="/login" class="header-wrapicon1 dis-block">
          <img src="{{ asset('/storage/media/icon-header-01.png') }}" class="header-icon1" alt="ICON">
        </a>
        @endguest

        <span class="linedivide1"></span>

        <div class="header-wrapicon2">
          <a href="/cart">
            <img src="{{ asset('/storage/media/icon-header-02.png') }}" class="header-icon1 js-show-header-dropdown"
              alt="ICON">
          </a>
          <span class="header-icons-noti">
            7
          </span>

        </div>
      </div>
    </div>
  </div>
</header>
