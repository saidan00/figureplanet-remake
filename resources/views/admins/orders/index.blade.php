@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Orders</h1>
</div>

<div class="mb-3">
  Date:
  <input type="date" id="from-date" placeholder="from">
  <input type="date" id="to-date" placeholder="to">
  <input type="button" id="refresh-date" value="Refresh">
</div>

<div class="table-responsive mb-5">
  <table class="table" id="orders-table" data-page-length="100">
    <thead class="text-uppercase">
      <tr>
        <th scope="col">Order Code</th>
        <th scope="col">Time</th>
        <th scope="col">Items</th>
        <th scope="col">Total</th>
        <th scope="col">Email</th>
        <th scope="col">Status</th>
        <th scope="col">Info</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($orders as $item)

      <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->created_at->format('d/m/Y - H:i') }}</td>
        <td>{{ $item->items_count }}</td>
        <td>{{ number_format($item->total, 0) }}</td>
        <td>{{ $item->user->email }}</td>
        <td class="{{ $item->statusClassName }} font-weight-bold">{{ $item->order_status->name }}</td>
        <td>
          <a href="/admin/orders/{{ $item->id }}"><i class="fa fa-info-circle fa-lg text-dark"></i></a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<script src="{{ asset('js/filter-table.js') }}"></script>
@endsection
