@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Revenue from Product</h1>
</div>

<div class="mb-3">
  <form action="/admin/reports/revenue/product" method="POST">
    @csrf
    <span>Date:</span>
    <input type="date" name="from-date" placeholder="from" value="{{ old('from-date', date('Y-m-d')) }}">
    <input type="date" name="to-date" placeholder="to" value="{{ old('to-date', date('Y-m-d')) }}">
    <button type="button" id="refresh-date"><i class="fa fa-refresh" aria-hidden="true"></i></button>
    <br>
    <input class="mt-3" type="submit" value="Submit">
  </form>
</div>

@if (isset($report))
<div class="table-responsive mb-5">
  <table class="table" id="report-table" data-page-length="100">
    <thead class="text-uppercase">
      <tr>
        <th scope="col">SKU</th>
        <th scope="col">Name</th>
        <th scope="col">Purchased</th>
        <th scope="col">Total</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($report as $item)
      <tr>
        <td>{{ $item->sku }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->purchased }}</td>
        <td>{{ number_format($item->total, 0) }}</td>
      </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <th scope="col">SUMMARY</th>
        <th scope="col"></th>
        <th scope="col">{{ $summary->purchased }}</th>
        <th scope="col">{{ number_format($summary->total, 0) }}</th>
      </tr>
    </tfoot>
  </table>
</div>
@endif

<script src="{{ asset('js/filter-table.js') }}"></script>
@endsection
