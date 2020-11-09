@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Users</h1>
</div>

<div class="mb-3">
  <span><a class="font-weight-bold" href="/admin/users/add">Add user</a></span>
</div>

<div class="table-responsive mb-5">
  <table class="table" id="users-table" data-page-length="100">
    <thead class="text-uppercase">
      <tr>
        <th scope="col">Email</th>
        <th scope="col">First name</th>
        <th scope="col">Last name</th>
        <th scope="col">Gender</th>
        <th scope="col">Phone</th>
        <th scope="col">Status</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $item)
      <tr>
        <td>{{ $item->email }}</td>
        <td>{{ $item->first_name }}</td>
        <td>{{ $item->last_name }}</td>
        <td>{{ $item->gender }}</td>
        <td>{{ $item->phone }}</td>
        <td>{{ $item->status ? 'Active' : 'Banned' }}</td>
        <td>
          <a href="/admin/users/edit/{{ $item->id }}" title="Edit user"><i class="fa fa-edit fa-lg text-dark"></i></a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<script src="{{ asset('js/filter-table.js') }}"></script>
@endsection
