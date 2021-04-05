@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row mt-5 mb-5">
    @include('users.navigation')

    <div class="col-sm-6 col-md-8 col-lg-9">
      <div class="card card-body">
        <h2>Password</h2>

        @include('inc.flash')

        <hr>
        <form action="/user/updatepassword" method="POST">
          @csrf
          <div class="form-group">
            <label for="current_password">Current Password <span
                class="text-danger small font-weight-bold">*</span></label>
            <div class="bo4">
              <input type="password" name="current_password"
                class="sizefull s-text7 p-l-22 p-r-22 form-control form-control-lg @error('current_password') is-invalid @enderror"
                value="" placeholder="Password">
            </div>
            @error('current_password')
            <span class="text-danger small">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="new_password">New Password <span class="text-danger small font-weight-bold">*</span></label>
            <div class="bo4">
              <input type="password" name="new_password"
                class="sizefull s-text7 p-l-22 p-r-22 form-control form-control-lg @error('new_password') is-invalid @enderror"
                value="" placeholder="Password">
            </div>
            @error('new_password')
            <span class="text-danger small">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="password_confirmation">Confirm New Password <span
                class="text-danger small font-weight-bold">*</span></label>
            <div class="bo4">
              <input type="password" name="new_password_confirmation"
                class="sizefull s-text7 p-l-22 p-r-22 form-control form-control-lg" value=""
                placeholder="Repeat your password">
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 ml-auto">
              <input type="submit" value="Change" class="btn bg1 btn-block text-light hov1 bo-rad-23">
            </div>
          </div>
        </form>
      </div>
    </div>

  </div>
</div>
@endsection
