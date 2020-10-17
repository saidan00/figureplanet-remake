@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row mt-5 mb-5">
    @include('users.navigation')

    <div class="col-sm-6 col-md-8 col-lg-9 ">
      <div class="card card-body">
        <h2>Orders</h2>
        <hr>
        <table class="my-table">
          <tr>
            <th>Order Code</th>
            <th>Time</th>
            <th>Total</th>
            <th>Status</th>
          </tr>
          @foreach ($orders as $item)
          <tr>
            <td><a class="text-primary" href="/user/orders/{{ $item->id }}">{{ $item->id }}</a>
            </td>
            <td>{{ $item->created_at }}</td>
            <td>{{ number_format($item->total, 0) }}</td>
            <td>{{ $item->order_status->name }}</td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
