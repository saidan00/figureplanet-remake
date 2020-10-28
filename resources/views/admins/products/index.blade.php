@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Dashboard</h1>
</div>

<div class="mb-3">
  <span><a class="font-weight-bold" href="/admin/products/add">Add product</a></span>
</div>

<div class="mb-3">
  Price:
  <input type="text" id="min" placeholder="Min">
  <input type="text" id="max" placeholder="Max">
</div>

<div class="table-responsive mb-5">
  <table class="table" id="products-table" data-page-length='100'>
    <thead class="text-uppercase">
      <tr>
        <th scope="col">SKU</th>
        <th scope="col">Name</th>
        <th scope="col">Quantity</th>
        <th scope="col">Price</th>
        <th scope="col">Category</th>
        <th scope="col">Available</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($products as $item)
      <tr>
        <td>{{ $item->sku }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->available_quantity }}</td>
        <td>{{ number_format($item->price, 0) }}</td>
        {{-- <td>{{ $item->price }}</td> --}}
        <td>{{ $item->category->name }}</td>
        <td>{{ $item->is_available ? 'Yes' : 'No' }}</td>
        <td>
          <a href="/admin/products/edit/{{ $item->sku }}" title="Edit product"><i class="fa fa-edit fa-lg text-dark"></i></a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<script src="{{ asset('js/filter-table.js') }}"></script>
@endsection
