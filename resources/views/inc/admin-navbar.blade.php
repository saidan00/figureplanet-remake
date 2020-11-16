<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="sidebar-sticky pt-3">
    <ul class="nav flex-column">
      {{-- <li class="nav-item">
        <a class="nav-link {{ strpos($currentRoute, 'admin.dashboard') !== false ? 'active' : '' }}" href="#">
          <i class="fa fa-home" aria-hidden="true"></i>
          Dashboard
        </a>
      </li> --}}
      @hasanyrole('manager|admin')
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
      @role('admin')
      <li class="nav-item">
        <a class="nav-link {{ strpos($currentRoute, 'admin.users') !== false ? 'active' : '' }}" href="/admin/users">
          <i class="fa fa-users" aria-hidden="true"></i>
          Users
        </a>
      </li>
      @endrole
    </ul>
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>Reports</span>
    </h6>
    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        <a class="nav-link {{ strpos($currentRoute, 'RevenueCustomer') !== false ? 'active' : '' }}"
          href="/admin/reports/revenue/customer">
          <i class="fa fa-file-text-o" aria-hidden="true"></i>
          Customer
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ strpos($currentRoute, 'RevenueProduct') !== false ? 'active' : '' }}"
          href="/admin/reports/revenue/product">
          <i class="fa fa-file-text-o" aria-hidden="true"></i>
          Product
        </a>
      </li>
      @endhasanyrole
    </ul>
  </div>
</nav>
