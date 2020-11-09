@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Add user</h1>
  <a class="font-weight-bold" href="/admin/users/">&lt;&lt;Back to Users</a>
</div>

<div class="card">
  <div class="card-body mx-auto">
    <form action="{{ route('register') }}" method="POST">
      @csrf

      <div class="row">
        <div class="form-group col">
          <label for="first_name">First name <span class="text-danger small font-weight-bold">*</span></label>
          <div class="bo4">
            <input type="text" name="first_name"
              class="sizefull s-text7 p-l-22 p-r-22 form-control @error('first_name') is-invalid @enderror"
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
              class="sizefull s-text7 p-l-22 p-r-22 form-control @error('last_name') is-invalid @enderror"
              value="{{ old('last_name') }}" placeholder="Last name">
          </div>
          @error('email')
          <span class="text-danger small">{{ $message }}</span>
          @enderror
        </div>
      </div>

      <div class="form-group">
        <label>Role</label>
        <select class="custom-select" name="role">
          @foreach ($roles as $item)
          <option value="{{ $item->name }}">
            {{ ucfirst($item->name) }}
          </option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="email">Email <span class="text-danger small font-weight-bold">*</span></label>
        <div class="bo4">
          <input type="email" name="email"
            class="sizefull s-text7 p-l-22 p-r-22 form-control @error('email') is-invalid @enderror"
            value="{{ old('email') }}" placeholder="Email">
        </div>
        @error('last_name')
        <span class="text-danger small">{{ $message }}</span>
        @enderror
      </div>

      <div class="form-group">
        <label for="password">Password <span class="text-danger small font-weight-bold">*</span></label>
        <div class="bo4">
          <input type="password" name="password"
            class="sizefull s-text7 p-l-22 p-r-22 form-control @error('password') is-invalid @enderror" value=""
            placeholder="Password">
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
            class="sizefull s-text7 p-l-22 p-r-22 form-control @error('phone') is-invalid @enderror"
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
            class="sizefull s-text7 p-l-22 p-r-22 form-control @error('address') is-invalid @enderror"
            value="{{ old('address') }}" placeholder="Address">
        </div>
        @error('address')
        <span class="text-danger small">{{ $message }}</span>
        @enderror
      </div>

      <div class="form-group">
        <input type="submit" value="Submit" class="btn btn-primary">
      </div>
    </form>
  </div>
</div>

@endsection
