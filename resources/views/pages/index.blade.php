@extends('layouts.app')

@section('content')
<!-- Slide1 -->
<section class="slide1">
  <div class="wrap-slick1">
    <div class="slick1">
      <div class="item-slick1 item1-slick1"
        style="background-image: url({{ asset('/storage/media/master-slide-01.jpg') }});">
        <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
          <span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
            Figure Collection
          </span>

          <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
            New arrivals
          </h2>

          <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
            <!-- Button -->
            <a href="/products" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
              Shop Now
            </a>
          </div>
        </div>
      </div>

      <div class="item-slick1 item2-slick1"
        style="background-image: url({{ asset('/storage/media/master-slide-02.jpg') }});">
        <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
          <span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rollIn">
            Figure Collection
          </span>

          <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="lightSpeedIn">
            New arrivals
          </h2>

          <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="slideInUp">
            <!-- Button -->
            <a href="/products" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
              Shop Now
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- New Product -->
<section class="newproduct bgwhite p-t-45 p-b-45">
  <div class="container">
    <div class="sec-title p-b-60">
      <h3 class="m-text5 t-center">
        Featured Products
      </h3>
    </div>

    <!-- Slide2 -->
    <div class="wrap-slick2">
      <div class="slick2">

        @foreach ($products as $product)
        <div class="item-slick2 p-l-15 p-r-15">
          <!-- Block2 -->
          <div class="block2">
            <div class="block2-img wrap-pic-w of-hidden pos-relative">
              <a href="/products/{{ $product->sku }}">
                <img src="{{ asset($product->images[0]->path ?? '') }}" alt="IMG-PRODUCT">
              </a>
            </div>

            <div class="block2-txt p-t-20">
              <a href="/products/{{ $product->sku }}" class="block2-name dis-block s-text3 p-b-5">
                {{ $product->name }}
              </a>

              <span class="block2-price m-text6 p-r-5">
                {{ number_format($product->price, 0) }} VND
              </span>
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>

  </div>
</section>
@endsection
