@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Orders {{ $order->id }}</h1>
  <a class="font-weight-bold" href="/admin/orders/">&lt;&lt;Back</a>
</div>

<div class="table-responsive mb-5">
  <table class="table">
    <thead class="text-uppercase">
      <tr>
        <th scope="col">Product</th>
        <th scope="col">Price</th>
        <th scope="col">Quantity</th>
        <th scope="col">Total</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($order->order_details as $item)
      <tr>
        <td>{{ $item->product->name }}</td>
        <td>{{ number_format($item->price,0) }}</td>
        <td>{{ $item->quantity }}</td>
        <td>{{ number_format($item->total,0) }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
