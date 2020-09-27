<div class="col-sm-6 col-md-4 col-lg-3">
  <div class="card card-body mb-5">
    <h4 class="m-text14 p-b-7">
      User
    </h4>

    <ul>
      <li class="p-t-4">
        <a href="{{ route('user.profile') }}" class="s-text13 {{ $currentRoute == 'user.profile' ? 'active1' : '' }}">
          Profile
        </a>
      </li>
      <li class="p-t-4">
        <a href="{{ route('user.changepassword') }}" class="s-text13 {{ $currentRoute == 'user.changepassword' ? 'active1' : '' }}">
          Change password
        </a>
      </li>
      <li class="p-t-4">
        <a href="{{ route('user.orders') }}" class="s-text13 {{ $currentRoute == 'user.orders' ? 'active1' : '' }}">
          Orders
        </a>
      </li>
    </ul>
  </div>
</div>
