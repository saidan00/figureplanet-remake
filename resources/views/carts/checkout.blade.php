@extends('layouts.app')

@section('content')

@if (count($carts) == 0)
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
        <form name="checkout-form" action="/carts/checkout" method="POST">
          @csrf

          <div class="row">
            <div class="form-group col">
              <label for="first_name">First name <span class="text-danger small font-weight-bold">*</span></label>
              <div class="bo4">
                <input type="text" name="first_name"
                  class="sizefull s-text7 p-l-22 p-r-22 form-control form-control-lg @error('first_name') is-invalid @enderror"
                  value="{{ $user->first_name }}" placeholder="First name">
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
                  value="{{ $user->last_name }}" placeholder="Last name">
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
                value="{{ $user->phone }}" placeholder="Phone">
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
                value="{{ $user->address }}" placeholder="Address">
            </div>
            @error('address')
            <span class="text-danger small">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="payment">Payment <span class="text-danger small font-weight-bold">*</span></label>
            <div>
              <input type="radio" name="payment" value="cod" checked> <span class="small text-secondary">COD</span><br>
              <input type="radio" name="payment" value="bank-transfer" disabled> <span class="small text-secondary">Bank
                Transfer (developing)</span><br>
              <input type="radio" name="payment" value="credit-card" disabled> <span class="small text-secondary">Credit
                Card (developing)</span>
            </div>
            @error('payment')
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
          </tr>
          <?php for ($i = 0; $i < $data["cart"]["totalCart"]; $i++) : ?>
          <tr>
            <td><?php echo $data["cart"]["cart"][$i]->productName; ?></td>
            <td class="quantity"><?php echo $data["cart"]["cart"][$i]->quantity; ?></td>
            <td><?php echo "$" . $data["cart"]["cart"][$i]->price *  $data["cart"]["cart"][$i]->quantity; ?></td>
          </tr>
          <?php endfor; ?>
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
            $<?php echo $data["cart"]["subTotal"]; ?>
          </span>
        </div>

        <!--  -->
        <div class="flex-w flex-sb bo10 p-t-15 p-b-20">
          <span class="s-text18 w-size19 w-full-sm">
            Shipping:
          </span>

          <span class="m-text21 w-size20 w-full-sm" data-name="shipping">
            $<?php echo $data["cart"]["shipping"]; ?>
          </span>
        </div>

        <!--  -->
        <div class="flex-w flex-sb-m p-t-26 p-b-30">
          <span class="m-text22 w-size19 w-full-sm">
            Total:
          </span>

          <span class="m-text21 w-size20 w-full-sm">
            <span class="m-text21 w-size20 w-full-sm" data-name="total">
              $<?php echo $data["cart"]["total"]; ?>
            </span>
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
@endif
@endsection
