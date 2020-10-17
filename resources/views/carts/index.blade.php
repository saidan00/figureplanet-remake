@extends('layouts.app')

@section('content')
<!-- Title Page -->
<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m"
  style="background-image: url({{ asset('storage/media/heading-pages-06.jpg') }});">
  <h2 class="l-text2 t-center">
    Cart
  </h2>
</section>

<!-- Cart -->
@if (!isset($cart->cart_items) || count($cart->cart_items) == 0)
<section id="cart-logged-in" class="bg-title-page p-t-50 p-b-40 flex-col-c-m">
  <h2>Nothing to show</h2>
  <p>
    Your cart is empty. Please buy something.
  </p>
</section>
@else
<section id="cart-logged-in" class="cart bgwhite p-t-70 p-b-100">
  <div class="container">
    <!-- Cart item -->
    <div class="container-table-cart pos-relative">
      <div class="wrap-table-shopping-cart bgwhite">
        <div id="cart-table">
          <table class="table-shopping-cart" id="table-shopping-cart">
            <tr class="table-head">
              <th class="column-1"></th>
              <th class="column-2">Product</th>
              <th class="column-3">Price (VND)</th>
              <th class="column-4 p-l-70">Quantity</th>
              <th class="column-5">Total</th>
            </tr>

            @foreach ($cart->cart_items as $item)
            <!-- load cart -->
            <tr id="product-{{ $item->product->id }}" class="table-row" data-product-id="{{ $item->product->id }}" data-name="cart">
              <td class="column-1">
                <div class="cart-img-product b-rad-4 o-f-hidden" data-product-id="{{ $item->product->id }}">
                  <img src="{{ asset($item->product->images[0]->path) }}" alt="IMG-PRODUCT">
                </div>
              </td>
              <td class="column-2"><a href="/products/{{ $item->product->sku }}">{{ $item->product->name }}</a>
              </td>
              <td class="column-3">{{ number_format($item->product->price, 0) }}</td>
              <td class="column-4">
                <div class="flex-w bo5 of-hidden w-size17">
                  <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                    <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                  </button>

                  <input class="size8 m-text18 t-center num-product" type="number" name="num-product1" value="{{ $item->quantity }}">

                  <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                    <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                  </button>
                </div>
              </td>
              <td class="column-5">{{ number_format($item->total, 0) }}</td>
            </tr>
            @endforeach

          </table>
        </div>
      </div>
    </div>

    <!-- Total -->
    <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm" id="cart-totals">
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

      <div class="size15 trans-0-4">
        <!-- Button -->
        <a href="/cart/processcheckout">
          <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
            Proceed to Checkout
          </button>
        </a>
      </div>
    </div>
  </div>
</section>
@endif
@endsection
