  <!-- Header -->
  <header class="header1">
    <!-- Header desktop -->
    <div class="container-menu-header">
      <div class="topbar"></div>
      <div class="wrap_header">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="logo">
            {{ config('app.name', 'Laravel') }}
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
      </div>
    </div>
  </header>
