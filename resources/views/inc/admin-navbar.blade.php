<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="sidebar-sticky pt-3">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ strpos($currentRoute, 'admin.dashboard') !== false ? 'active' : '' }}" href="#">
          <i class="fa fa-home" aria-hidden="true"></i>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ strpos($currentRoute, 'admin.orders') !== false ? 'active' : '' }}" href="/admin/orders">
          <i class="fa fa-file" aria-hidden="true"></i>
          Orders
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ strpos($currentRoute, 'admin.products') !== false ? 'active' : '' }}"
          href="/admin/products">
          <i class="fa fa-shopping-cart" aria-hidden="true"></i>
          Products
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ strpos($currentRoute, 'admin.users') !== false ? 'active' : '' }}" href="/admin/users">
          <i class="fa fa-users" aria-hidden="true"></i>
          Users
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ strpos($currentRoute, 'admin.reports') !== false ? 'active' : '' }}"
          href="/admin/reports">
          <i class="fa fa-bar-chart" aria-hidden="true"></i>
          Reports
        </a>
      </li>
    </ul>
  </div>
</nav>
