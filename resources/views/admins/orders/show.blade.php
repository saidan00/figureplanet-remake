@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Orders {{ $order->id }}</h1>
  <a class="font-weight-bold" href="/admin/orders/">&lt;&lt;Back to Orders</a>
</div>

<div class="card">
  <div class="row">
    <div class="col-4">
      <div class="card-body">
        <table class="table">
          <tr>
            <th>Customer: </th>
            <td>{{ $order->user->first_name . ' ' . $order->user->last_name}}</td>
          </tr>
          <tr>
            <th>Email: </th>
            <td>{{ $order->user->email}}</td>
          </tr>
          <tr>
            <th>Phone: </th>
            <td>{{ $order->phone }}</td>
          </tr>
          <tr>
            <th>Address: </th>
            <td>{{ $order->address }}</td>
          </tr>
          <tr>
            <th>Payment method: </th>
            <td>{{ $order->payment_method->name }}</td>
          </tr>
        </table>
      </div>
    </div>

    <div class="col-4">
      <div class="card-body">
        <table class="table">
          <tr>
            <th>Subtotal: </th>
            <td>{{ number_format($order->subtotal, 0) }} VND</td>
          </tr>
          <tr>
            <th>Shipping fee: </th>
            <td>{{ number_format($order->shipping_fee, 0) }} VND</td>
          </tr>
          <tr>
            <th>Total: </th>
            <td>{{ number_format($order->total, 0) }} VND</td>
          </tr>
          <tr>
            <th>Status: </th>
            <td class="{{ $order->statusClassName }} font-weight-bold">{{ $order->order_status->name }}</td>
          </tr>
          <tr>
            @if ($order->order_status->name != 'Canceled')
            <td>
              <form action="/admin/orders/updateorderstatus/{{ $order->id }}" method="POST" id='cancel-form'>
                @csrf
                <input type="hidden" name="status" value="Canceled">
                <input type="hidden" name="note" value="" id='cancel-note'>
                <input type="submit" value="Cancel" class="btn btn-danger" id="btn-cancel">
              </form>
            </td>

            <td>
              <form action="/admin/orders/updateorderstatus/{{ $order->id }}" method="POST" id="process-form">
                @csrf
                @switch($order->order_status->name)
                @case('Pending')
                <input type="hidden" name="status" value="Processing">
                <input type="submit" value="Process" class="btn btn-primary" id="btn-process">
                @break
                @case('Processing')
                <input type="hidden" name="status" value="Delivering">
                <input type="submit" value="Deliver" class="btn btn-info" id="btn-deliver">
                @break
                @case('Delivering')
                <input type="hidden" name="status" value="Completed">
                <input type="submit" value="Complete" class="btn btn-success" id="btn-complete">
                @break
                @default
                @endswitch
              </form>
            </td>
            @else
            <td>
              <form action="/admin/orders/updateorderstatus/{{ $order->id }}" method="POST" id="reopen-form">
                @csrf
                <input type="hidden" name="status" value="Processing">
                <input type="hidden" name="note" value="">
                <input type="submit" value="Re-open" class="btn btn-secondary" id="btn-reopen">
              </form>
            </td>
            <td></td>
          </tr>
          @endif

        </table>
      </div>
    </div>

    <div class="col-4">
      <div class="card-body">
        @if ($order->note != null)
        <h6>Note</h6>
        <p> {{ $order->note }}</p>
        @endif
      </div>
    </div>
  </div>

  <div class="row">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered">
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
              <td><a href="/admin/products/edit/{{ $item->product->sku }}" target="_blank">{{ $item->product->name }} <i class="fa fa-external-link" aria-hidden="true"></i></a></td>
              <td>{{ number_format($item->price,0) }}</td>
              <td>{{ $item->quantity }}</td>
              <td>{{ number_format($item->total,0) }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script src="{{ asset('js/admin-buttons.js') }}"></script>
@endsection
