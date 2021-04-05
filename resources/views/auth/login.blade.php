@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-6 mx-auto">

      <div class="card card-body mt-5 mb-5">
        @if (Session::has('flash'))
        <div class="alert alert-danger">{{ Session::get('flash') }}</div>
        @endif
        <h2>Login</h2>
        <hr>
        <form action="{{ route('login') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="email">Email <span class="text-danger font-weight-bold">*</span></label>
            <div class="bo4">
              <input type="email" name="email"
                class="sizefull s-text7 p-l-22 p-r-22 form-control form-control-lg @error('email') is-invalid @enderror; ?>"
                value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>
            </div>
            @error('email')
            <span class="text-danger small">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="password">Password <span class="text-danger font-weight-bold">*</span></label>
            <div class="bo4">
              <input type="password" name="password"
                class="sizefull s-text7 p-l-22 p-r-22 form-control form-control-lg @error('password') is-invalid @enderror"
                name="password" required autocomplete="current-password" placeholder="Password">
            </div>
            @error('password')
            <span class="text-danger small">{{ $message }}</span>
            @enderror
          </div>

          <div class="row">
            <div class="col">
              <input type="submit" value="Login" class="btn bg1 btn-block text-light hov1 bo-rad-23">
            </div>
            <div class="col">
              <a href="/register" class="btn btn-light btn-block hov1 bo-rad-23">No account?
                Register</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
