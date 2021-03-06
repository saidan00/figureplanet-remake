@extends('layouts.app')

@section('content')
<!-- breadcrumb -->
<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
  <a href="/user/orders" class="s-text16">
    Orders
    <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
  </a>

  <span class="s-text17">
    {{ $order->id . ' (' . $order->order_status->name . ')'}}
  </span>
</div>

<div class="container p-t-50 p-b-70">
  <table id="order-details-table">
    <tr>
      <th></th>
      <th>Product</th>
      <th>Price</th>
      <th>Quantity</th>
      <th>Total</th>
    </tr>
    @foreach ($order->order_details as $item)
    <tr class="table-row">
      <td>
        <div class="order-details-img"><img src="{{ asset($item->product->images[0]->path) }}"></div>
      </td>
      <td class="p-r-10"><a href="/products/{{ $item->product->sku }}">{{ $item->product->name }}</a>
      </td>
      <td>{{ number_format($item->price, 0) }}</td>
      <td>{{ $item->quantity }}</td>
      <td>{{ number_format($item->total,0) }}</td>
    </tr>
    @endforeach
  </table>

  <div class="row mt-5">
    <div class="col-lg-8">
      <div class="card card-body">
        <table>
          <tr>
            <td class="font-weight-bold">Receiver:</td>
            <td class="p-l-10">{{ $order->receiver_name }}</td>
          </tr>
          <tr>
            <td class="font-weight-bold">Phone:</td>
            <td class="p-l-10">{{ $order->phone }}</td>
          </tr>
          <tr>
            <td class="font-weight-bold">Address:</td>
            <td class="p-l-10">{{ $order->address }}</td>
          </tr>
          <tr>
            <td class="font-weight-bold">Payment method:</td>
            <td class="p-l-10">{{ $order->payment_method->name }}</td>
          </tr>
          </tr>
          <tr>
            <td class="font-weight-bold">Status:</td>
            <td class="p-l-10">{{ $order->order_status->name }}</td>
          </tr>
          @if ($order->note != null)
          <tr>
            <td class="font-weight-bold">Note:</td>
            <td class="p-l-10">{{ $order->note }}</td>
          </tr>
          @endif
        </table>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card card-body">
        <table>
          <tr>
            <td class="font-weight-bold">Subtotal:</td>
            <td class="p-l-10">{{ number_format($order->subtotal, 0) }} VND</td>
          </tr>
          <tr>
            <td class="font-weight-bold">Shipping:</td>
            <td class="p-l-10">{{ number_format($order->shipping_fee, 0) }} VND</td>
          </tr>
          <tr>
            <td class="font-weight-bold">Total:</td>
            <td class="p-l-10">{{ number_format($order->total, 0) }} VND</td>
          </tr>
        </table>
      </div>
    </div>
  </div>

  @if ($order->order_status->name == 'Pending')
  <form action="/orders/cancelorder" method="post" name="cancel-form">
    @csrf
    <div class="size9 trans-0-4 mt-5">
      <input type="hidden" name="order_id" value="{{ $order->id }}">
      <input type="hidden" name="note" value="khách hàng hủy">
      <!-- Button -->
      <input type="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" value="Cancel"
        id="cancel-btn">
    </div>
  </form>
  @endif
</div>
<script src="{{ asset('/js/checkout-btn.js')}}"></script>
@endsection
