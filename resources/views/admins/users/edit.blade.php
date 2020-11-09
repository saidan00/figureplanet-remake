@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit user</h1>
  <a class="font-weight-bold" href="/admin/users/">&lt;&lt;Back</a>
</div>

<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col">
        <div class="card-body">
          <table class="table">
            <tr>
              <th>Email:</th>
              <td>{{ $user->email }}</td>
            </tr>
            <tr>
              <th>Name:</th>
              <td>{{ $user->first_name . ' ' .  $user->last_name }}</td>
            </tr>
            <tr>
              <th>Phone:</th>
              <td>{{ $user->phone }}</td>
            </tr>
            <tr>
              <th>Address:</th>
              <td>{{ $user->address }}</td>
            </tr>
          </table>
        </div>
      </div>
      <div class="col">
        <form name="edit-product" method="POST" action="/admin/users/update/{{ $user->id }}"
          enctype="multipart/form-data">
          @csrf

          <div class="row">
            <div class="form-group col-sm-6">
              <label class="col-form-label">Role</label>
              <select class="custom-select" name="role">
                @foreach ($roles as $item)
                <option value="{{ $item->name }}" {{ $user->role == $item->name ? 'selected' : '' }}>
                  {{ ucfirst($item->name) }}
                </option>
                @endforeach
              </select>
            </div>

            <div class="form-group col-sm-6">
              <label class="col-form-label">Active/Banned</label>
              <select class="custom-select" name="status">
                <option value="1" {{ $user->status ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$user->status ? 'selected' : '' }}>Banned</option>
              </select>
            </div>
          </div>

          <input type="submit" class="btn btn-primary pr-4 pl-4" value="Update">
        </form>

        @include('inc.flash')
      </div>
    </div>

  </div>
</div>

<script src="{{ asset('js/show-image.js') }}"></script>
@endsection
