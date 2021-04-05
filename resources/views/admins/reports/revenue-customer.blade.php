@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Revenue from Customer</h1>
</div>

<div class="mb-3">
  <form action="/admin/reports/revenue/customer" method="POST">
    @csrf
    <span>Date:</span>
    <input type="date" name="from-date" placeholder="from" value="{{ old('from-date', date('Y-m-d')) }}">
    <input type="date" name="to-date" placeholder="to" value="{{ old('to-date', date('Y-m-d')) }}">
    <button type="button" id="refresh-date"><i class="fa fa-refresh" aria-hidden="true"></i></button>
    <span class="ml-3">Email:</span>
    <select name="email" class="chosen-select" data-placeholder=" ">
      <option value="All">--all--</option>
      @foreach ($users as $item)
      @if (old('email') == $item->email)
      <option value="{{ $item->email }}" selected>{{ $item->email }}</option>
      @else
      <option value="{{ $item->email }}">{{ $item->email }}</option>
      @endif
      @endforeach
    </select>
    <br>
    <input class="mt-3" type="submit" value="Submit">
  </form>
</div>

@if (isset($orders))
<div class="table-responsive mb-5">
  <table class="table" id="report-table" data-page-length="100">
    <thead class="text-uppercase">
      <tr>
        <th scope="col">Order Code</th>
        <th scope="col">Time</th>
        <th scope="col">Items</th>
        <th scope="col">Total</th>
        <th scope="col">Email</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($orders as $item)
      <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->created_at->format('d/m/Y - H:i') }}</td>
        <td>{{ $item->items_count }}</td>
        <td>{{ number_format($item->total, 0) }}</td>
        <td>{{ $item->user->email }}</td>
        <td class="text-success font-weight-bold">{{ $item->order_status->name }}</td>
      </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <th scope="col">SUMMARY</th>
        <th scope="col"></th>
        <th scope="col">{{ $summary->products }}</th>
        <th scope="col">{{ number_format($summary->total, 0) }}</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </tfoot>
  </table>
</div>
@endif

<script src="{{ asset('js/filter-table.js') }}"></script>
@endsection
