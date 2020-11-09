@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Add product</h1>
  <a class="font-weight-bold" href="/admin/products/">&lt;&lt;Back to Products</a>
</div>

<div class="container">
  <div class="card">
    <div class="card-body mx-auto">

      @include('inc.flash')

      <form name="edit-product" method="POST" action="/admin/products/store" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="form-group col-sm-5">
            <label class="col-form-label">Category <span class="text-danger small font-weight-bold">*</span></label>
            <select class="custom-select" name="category">
              @foreach ($categories as $item)
              <option value="{{ $item->id }}">{{ $item->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group col-sm-4">
            <label class="col-form-label">Available <span class="text-danger small font-weight-bold">*</span></label>
            <select class="custom-select" name="available">
              <option value="1">Available</option>
              <option value="0" selected>Unavailable</option>
            </select>
          </div>
        </div>

        <div class="row">
          <div class="form-group col-sm-5">
            <label for="name">Name <span class="text-danger small font-weight-bold">*</span></label>
            <div class="text-danger small font-weight-bold">
              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name') }}" placeholder="Name">
            </div>
            @error('name')
            <span class="text-danger small">{{ $message }}</span>
            @enderror
          </div>

          <div class="form-group col-sm-4">
            <label for="price">Price: <span id="formatted-price">{{ number_format(old('price'), 0) }}</span> <span
                class="text-danger small font-weight-bold">*</span></label>
            <div class="text-danger small font-weight-bold">
              <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"
                value="{{ old('price') }}" placeholder="Price">
            </div>
            @error('price')
            <span class="text-danger small">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="row">
          <div class="form-group col-sm-9">
            <label for="description" class="col-form-label">Description <span
                class="text-danger small font-weight-bold">*</span></label>
            <textarea class="form-control @error('description') is-invalid @enderror"
              name="description">{{ old('description') }}</textarea>
            @error('description')
            <span class="text-danger small">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="row">
          <div class="form-group col-sm-12">
            <label for="fileImg" class="col-form-label">Image <span
                class="text-danger small font-weight-bold">*</span></label>
            <div>
              <img id="img-product" src="#" alt="IMG-PRODUCT" style="width: 30%;object-fit: cover;" class="mb-2">
            </div>
            <input type="file" class="form-control-file" name="image" onchange="readURL(this);">
            @error('image')
            <span class="text-danger small">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <input type="submit" class="btn btn-primary mt-4 pr-4 pl-4" value="Add">
      </form>
    </div>
  </div>
</div>
<script src="{{ asset('js/show-image.js') }}"></script>
@endsection
