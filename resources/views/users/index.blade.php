@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row mt-5 mb-5">
    @include('users.navigation')

    <div class="col-sm-6 col-md-8 col-lg-9">
      <div class="card card-body">
        <h2>Profile</h2>

        @include('inc.flash')

        <hr>
        <form action="/user/update" method="POST">
          @csrf

          <div class="row">
            <div class="form-group col">
              <label for="first_name">First name <span class="text-danger small font-weight-bold">*</span></label>
              <div class="bo4">
                <input type="text" name="first_name"
                  class="sizefull s-text7 p-l-22 p-r-22 form-control form-control-lg @error('first_name') is-invalid @enderror"
                  value="{{ $user->first_name }}" placeholder="First name">
              </div>
              @error('first_name')
              <span class="text-danger small">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group col">
              <label for="last_name">Last name <span class="text-danger small font-weight-bold">*</span></label>
              <div class="bo4">
                <input type="text" name="last_name"
                  class="sizefull s-text7 p-l-22 p-r-22 form-control form-control-lg @error('last_name') is-invalid @enderror"
                  value="{{ $user->last_name }}" placeholder="Last name">
              </div>
              @error('last_name')
              <span class="text-danger small">{{ $message }}</span>
              @enderror
            </div>
          </div>

          <div class="form-group">
            <label for="email">Email <span class="text-danger small font-weight-bold">*</span></label>
            <div class="bo4">
              <input type="email" name="email"
                class="sizefull s-text7 p-l-22 p-r-22 form-control form-control-lg @error('email') is-invalid @enderror"
                value="{{ $user->email }}" placeholder="Email" disabled>
            </div>
            @error('email')
            <span class="text-danger small">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="gender">Gender <span class="text-danger small font-weight-bold">*</span></label>
            <div>
              <input type="radio" name="gender" value="male" {{ $user->gender == 'male' ? 'checked' : '' }}>
              <span class="small text-secondary">Male</span><br>
              <input type="radio" name="gender" value="female" {{ $user->gender == 'female' ? 'checked' : '' }}> <span
                class="small text-secondary">Female</span>
            </div>
            @error('gender')
            <span class="text-danger small">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="phone">Phone <span class="text-danger small font-weight-bold">*</span></label>
            <div class="bo4">
              <input type="text" name="phone"
                class="sizefull s-text7 p-l-22 p-r-22 form-control form-control-lg @error('phone') is-invalid @enderror"
                value="{{ $user->phone }}" placeholder="Phone">
            </div>
            @error('phone')
            <span class="text-danger small">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="address">Address <span class="text-danger small font-weight-bold">*</span></label>
            <div class="bo4">
              <input type="text" name="address"
                class="sizefull s-text7 p-l-22 p-r-22 form-control form-control-lg @error('address') is-invalid @enderror"
                value="{{ $user->address }}" placeholder="Address">
            </div>
            @error('address')
            <span class="text-danger small">{{ $message }}</span>
            @enderror
          </div>

          <div class="row">
            <div class="col-md-4 ml-auto">
              <input type="submit" value="Update" class="btn bg1 btn-block text-light hov1 bo-rad-23">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
