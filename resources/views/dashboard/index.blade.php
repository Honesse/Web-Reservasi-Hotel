@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard, dikelola oleh {{ auth()->user()->name }}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
      </div>
      <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
        <svg class="bi"><use xlink:href="#calendar3"/></svg>
        This week
      </button>
    </div>
  </div>

  <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Rekapitulasi</h1>
  </div>
  <div class="table-responsive small">
    <table class="table table-hover table-striped table-dark table-sm">
      <thead class="py-3">
        <tr class="text-center">
          <th scope="col" class="py-3">No.</th>
          <th scope="col" class="py-3">Username</th>
          <th scope="col" class="py-3">ID Transaksi</th>
          <th scope="col" class="py-3">Checkin</th>
          <th scope="col" class="py-3">Checkout</th>
          <th scope="col" class="py-3">Total</th>
          <th scope="col" class="py-3">Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($transactions as $transaction)
        <tr class="text-center">
          <th scope="row" class="py-2">{{ $loop->iteration }}</th>
          <td class="py-2">{{ $transaction->author->username }}</td>
          <td class="py-2">{{ $transaction->id }}</td>
          <td class="py-2">{{ $transaction->start_date->format('d M Y') }}</td>
          <td class="py-2">{{ $transaction->end_date->format('d M Y') }}</td>
          <td class="py-2">Rp.{{ $transaction->bill }}</td>
          <th scope="row">
            @if ($transaction->paymentstatus == 1)
              <p class="font-weight-bold text-success">Lunas</p>
            @else
              <p class="font-weight-bold text-danger">Belum dibayar</p>
            @endif
          </th>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
    
@endsection