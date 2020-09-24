@extends('layouts.app')

@section('content')
<!-- Title Page -->
<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(/images/master-slide1.png);">
  <h2 class="l-text2 t-center">Figure Planet</h2>
  <p class="m-text13 t-center">New Arrivals Figure 2019</p>
</section>

<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
        <div class="leftbar p-r-20 p-r-0-sm">
          <!--  -->
          <h4 class="m-text14 p-b-7">
            Categories
          </h4>

          <ul class="p-b-54">
            <li class="p-t-4">
              <a data-categoryCode="all" href="/products/search/all" class="s-text13">
                All
              </a>
            </li>

            @foreach($categories as $category)
            @if ($category->name != 'Others')
            <li class="p-t-4">
              <a href="/products/search/" class="s-text13">
                {{ $category->name }}
              </a>
            </li>
            @endif
            @endforeach

            <li class="p-t-4">
              <a data-categoryCode="others" href="/products/search/others" class="s-text13">
                Others
              </a>
            </li>
          </ul>

          <!--  -->
          <h4 class="m-text14 p-b-32">
            Filters
          </h4>

          <div class="filter-price p-t-22 p-b-50 bo3">
            <div class="m-text15 p-b-17">
              Price
            </div>

            <div class="wra-filter-bar">
              <span class="s-text13">From:</span>
              <div class="bo4 of-hidden size15 m-b-20">
                <input id="minPrice" class="sizefull s-text7 p-l-22 p-r-22" type="number" name="minPrice"
                  placeholder="from" min="0" max="9999" value="">
              </div>
              <span class="s-text13">To:</span>
              <div class="bo4 of-hidden size15 m-b-20">
                <input id="maxPrice" class="sizefull s-text7 p-l-22 p-r-22" type="number" name="maxPrice"
                  placeholder="to" min="1" max="9999" value="">
              </div>
            </div>

            <div class="flex-sb-m flex-w p-t-16">
              <div class="w-size11">
                <!-- Button -->
                <button class="flex-c-m size4 bg7 bo-rad-15 hov1 s-text14 trans-0-4" id="filter-price">
                  Filter
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
        <!--  -->
        <div class="flex-sb-m flex-w p-b-35">
          <div class="flex-w">
            <!--  -->
            <div class="search-product bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
              <input id="search-product" class="s-text7 size15 p-l-23 p-r-50" type="text" name="search-product"
                placeholder="Search Products..." value="">
            </div>

            <!--  -->
            <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
              <select id="sort" class="selection-2" name="sorting">
                <option value="default">Default
                  Sorting
                </option>
                <option value="a-to-z">Name: A-Z
                </option>
                <option value="z-to-a">Name: Z-A
                </option>
                <option value="low-to-high">
                  Price: low
                  to high</option>
                <option value="high-to-low">
                  Price: high
                  to low</option>
              </select>
            </div>

            <div class="m-t-10 m-b-5">
              <input id="btn-search" type="button"
                class="flex-c-m size4 bg7 bo-rad-15 hov1 s-text14 trans-0-4 m-t-8 p-r-6 p-l-6" value="Search">
            </div>
          </div>

          <span class="s-text8 p-t-5 p-b-5">
            Showing 0–0 of 0 results
          </span>
        </div>

        <!-- Product -->
        <div id="display-products" class="row">
          @foreach ($products as $product)
          <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
            <!-- Block2 -->
            <div class="block2">
              <div class="block2-img wrap-pic-w of-hidden pos-relative block2-label">
                <img src="{{ asset($product->images[0]->path ?? '') }}" alt="{{ $product->sku }}">

                <div class="block2-overlay trans-0-4">
                  <span class="block2-btn-addwishlist hov-pointer trans-0-4">
                    <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                    <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                  </span>

                  <div class="block2-btn-addcart w-size1 trans-0-4" data-sku="{{ $product->sku }}">
                    <!-- Button -->
                    <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                      Add to Cart
                    </button>
                  </div>
                </div>
              </div>

              <div class="block2-txt p-t-20">
                <a href="" class="block2-name dis-block s-text3 p-b-5">
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

        <!-- Pagination -->
        {{ $products->links() }}

      </div>
    </div>
  </div>
</section>

{{-- <script src="/js/filter-handler.js"></script>     --}}
@endsection
