@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body mt-5 mb-5">
        <h2>Register</h2>
        <hr>
        <form action="{{ route('register') }}" method="POST">
          @csrf

          <div class="row">
            <div class="form-group col">
              <label for="first_name">First name <span class="text-danger small font-weight-bold">*</span></label>
              <div class="bo4">
                <input type="text" name="first_name"
                  class="sizefull s-text7 p-l-22 p-r-22 form-control form-control-lg @error('first_name') is-invalid @enderror"
                  value="{{ old('first_name') }}" placeholder="First name">
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
                  value="{{ old('last_name') }}" placeholder="Last name">
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
                value="{{ old('email') }}" placeholder="Email">
            </div>
            @error('email')
            <span class="text-danger small">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="password">Password <span class="text-danger small font-weight-bold">*</span></label>
            <div class="bo4">
              <input type="password" name="password"
                class="sizefull s-text7 p-l-22 p-r-22 form-control form-control-lg @error('password') is-invalid @enderror"
                value="" placeholder="Password">
            </div>
            @error('password')
            <span class="text-danger small">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="password_confirmation">Confirm Password <span
                class="text-danger small font-weight-bold">*</span></label>
            <div class="bo4">
              <input type="password" name="password_confirmation"
                class="sizefull s-text7 p-l-22 p-r-22 form-control form-control-lg" value=""
                placeholder="Repeat your password">
            </div>
          </div>

          <div class="form-group">
            <label for="gender">Gender <span class="text-danger small font-weight-bold">*</span></label>
            <div>
              <input type="radio" name="gender" value="male" {{ old('gender') == 'male' ? 'checked' : '' }}>
              <span class="small text-secondary">Male</span><br>
              <input type="radio" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}> <span
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
                value="{{ old('phone') }}" placeholder="Phone">
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
                value="{{ old('address') }}" placeholder="Address">
            </div>
            @error('address')
            <span class="text-danger small">{{ $message }}</span>
            @enderror
          </div>

          <div class="row">
            <div class="col mb-2">
              <input type="submit" value="Register" class="btn bg1 btn-block text-light hov1 bo-rad-23">
            </div>
            <div class="col">
            <a href="{{ route('login') }}" class="btn btn-light btn-block hov1 bo-rad-23">Have an
                account? Login</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
