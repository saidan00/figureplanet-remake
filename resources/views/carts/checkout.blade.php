@extends('layouts.app')

@section('content')

@if (!isset($cart->cart_items) || count($cart->cart_items) == 0)
<section id="cart-logged-in" class="bg-title-page p-t-50 p-b-40 flex-col-c-m">
  <h2>Nothing to show</h2>
  <p>
    Your cart is empty. Please buy something.
  </p>
</section>
@else
<div class="container">
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-body mt-5 mb-5">
        <h2>Order Details</h2>
        <hr>
        <form name="checkout-form" action="/orders/create" method="POST">
          @csrf

          <div class="row">
            <div class="form-group col">
              <label for="first_name">First name <span class="text-danger small font-weight-bold">*</span></label>
              <div class="bo4">
                <input type="text" name="first_name"
                  class="sizefull s-text7 p-l-22 p-r-22 form-control form-control-lg @error('first_name') is-invalid @enderror"
                  value="{{ $cart->user->first_name }}" placeholder="First name">
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
                  value="{{ $cart->user->last_name }}" placeholder="Last name">
              </div>
              @error('last_name')
              <span class="text-danger small">{{ $message }}</span>
              @enderror
            </div>
          </div>

          <div class="form-group">
            <label for="phone">Phone <span class="text-danger small font-weight-bold">*</span></label>
            <div class="bo4">
              <input type="text" name="phone"
                class="sizefull s-text7 p-l-22 p-r-22 form-control form-control-lg @error('phone') is-invalid @enderror"
                value="{{ $cart->user->phone }}" placeholder="Phone">
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
                value="{{ $cart->user->address }}" placeholder="Address">
            </div>
            @error('address')
            <span class="text-danger small">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="payment_method">Payment <span class="text-danger small font-weight-bold">*</span></label>
            <div>
              <input type="radio" name="payment_method" value="cod" checked> <span class="small text-secondary">COD</span><br>
              <input type="radio" name="payment_method" value="bank-transfer" disabled> <span class="small text-secondary">Bank
                Transfer (developing)</span><br>
              <input type="radio" name="payment_method" value="credit-card" disabled> <span class="small text-secondary">Credit
                Card (developing)</span>
            </div>
            @error('payment_method')
            <span class="text-danger small">{{ $message }}</span>
            @enderror
          </div>

          <div class="row">
            <div class="col mb-2">
              <input id="checkout-btn" type="submit" value="Checkout"
                class="btn bg1 btn-block text-light hov1 bo-rad-23">
            </div>
            <div class="col">
              <a href="/cart" class="btn btn-light btn-block hov1 bo-rad-23">Edit cart</a>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="col-md-6 mx-auto">
      <div class="card card-body mt-5 mb-5">
        <h5 class="m-text20 p-b-24">
          Cart
        </h5>

        <!--  -->
        <table id="checkout-table">
          <tr>
            <th>Product</th>
            <th class="quantity"> Quantity</th>
            <th>Price</th>
            <th>Total</th>
          </tr>
          @foreach ($cart->cart_items as $item)
          <tr>
            <td>{{ $item->product->name }}</td>
            <td class="quantity">{{ $item->quantity }}</td>
            <td>{{ number_format($item->product->price, 0) }}</td>
            <td>{{ number_format($item->total, 0) }}</td>
          </tr>
          @endforeach
        </table>

        <hr>

        <h5 class="m-text20 p-b-24">
          Cart Totals
        </h5>

        <!--  -->
        <div class="flex-w flex-sb-m p-b-12">
          <span class="s-text18 w-size19 w-full-sm">
            Subtotal:
          </span>

          <span class="m-text21 w-size20 w-full-sm" data-name="sub-total">
            {{ number_format($cart->subtotal, 0) }}
          </span>
        </div>

        <!--  -->
        <div class="flex-w flex-sb bo10 p-t-15 p-b-20">
          <span class="s-text18 w-size19 w-full-sm">
            Shipping:
          </span>

          <span class="m-text21 w-size20 w-full-sm" data-name="shipping">
            {{ number_format($cart->shipping_fee, 0) }}
          </span>
        </div>

        <!--  -->
        <div class="flex-w flex-sb-m p-t-26 p-b-30">
          <span class="m-text22 w-size19 w-full-sm">
            Total:
          </span>

          <span class="m-text21 w-size20 w-full-sm">
            <span class="m-text21 w-size20 w-full-sm" data-name="total">
              {{ number_format($cart->total, 0) }}
            </span>
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
@endif
@endsection
