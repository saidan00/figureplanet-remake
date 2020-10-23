@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit product</h1>
</div>

<div class="container">
  <div class="card">
    <div class="card-body mx-auto">
      <span><a href="/products/{{ $product->sku }}" target="_blank">To product page &gt;&gt;</a></span>

      @include('inc.flash')

      <form name="edit-product" method="POST" action="/admin/products/{{ $product->sku }}"
        enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="form-group col-sm-3">
            <label for="sku" class="col-form-label">SKU</label>
            <input class="form-control" type="text" value="{{ $product->sku }}" name="sku" readonly>
          </div>
          <div class="form-group col-sm-3">
            <label class="col-form-label">Category <span class="text-danger small font-weight-bold">*</span></label>
            <select class="custom-select" name="category">
              @foreach ($categories as $item)
              <option value="{{ $item->id }}" {{ $product->category_id == $item->id ? 'selected' : '' }}>
                {{ $item->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group col-sm-3">
            <label class="col-form-label">Available <span class="text-danger small font-weight-bold">*</span></label>
            <select class="custom-select" name="available">
              <option value="1" {{ $product->is_available ? 'selected' : '' }}>Available</option>
              <option value="0" {{ !$product->is_available ? 'selected' : '' }}>Unavailable</option>
            </select>
          </div>
        </div>

        <div class="row">
          <div class="form-group col-sm-5">
            <label for="name">Name <span class="text-danger small font-weight-bold">*</span></label>
            <div class="text-danger small font-weight-bold">
              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ $product->name }}" placeholder="Name">
            </div>
            @error('name')
            <span class="text-danger small">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group col-sm-2">
            <label for="price">Price <span class="text-danger small font-weight-bold">*</span></label>
            <div class="text-danger small font-weight-bold">
              <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"
                value="{{ $product->price }}" placeholder="Price">
            </div>
            @error('price')
            <span class="text-danger small">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group col-sm-2">
            <label for="quantity">Quantity <span class="text-danger small font-weight-bold">*</span></label>
            <div class="text-danger small font-weight-bold">
              <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror"
                value="{{ $product->quantity }}" placeholder="Quantity">
            </div>
            @error('quantity')
            <span class="text-danger small">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="row">
          <div class="form-group col-sm-9">
            <label for="description" class="col-form-label">Description <span
                class="text-danger small font-weight-bold">*</span></label>
            <textarea class="form-control @error('description') is-invalid @enderror"
              name="description">{{ $product->description }}</textarea>
            @error('description')
            <span class="text-danger small">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="row">
          <div class="form-group col-sm-12">
            <label for="fileImg" class="col-form-label">Image <span
                class="text-danger small font-weight-bold">*</span></label>
            <input type="file" class="form-control-file" name="fileImg">
            @error('description')
            <span class="text-danger small">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <input type="submit" class="btn btn-primary mt-4 pr-4 pl-4" value="Update">
      </form>
    </div>
  </div>
</div>
@endsection
