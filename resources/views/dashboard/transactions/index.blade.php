@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Konfirmasi Pembayaran</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="table-responsive small col-lg-8">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No.</th>
          <th scope="col">User-id</th>
          <th scope="col">Jenis Transaksi</th>
          <th scope="col">No. Kamar</th>
          <th scope="col">Estimasi</th>
          <th scope="col">Bill</th>
          <th scope="col">Status</th>
          <th scope="col">Set</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($transactions as $transaction)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $transaction->user_id }}</td>
          <td>{{ $transaction->title }}</td>
          <td>{{ $transaction->no_kamar }}</td>
          <td>{{ $transaction->estimate }}</td>
          <td>{{ $transaction->bill }}</td>
          <td>
            @if ($transaction->paymentstatus === 1) 
              <p>Lunas</p>
            @else 
              <p>Belum Lunas</p>
            @endif
          </td>
          <td>
              <button class="btn btn-danger py-1" onclick="return confirm('Are you sure?')"><svg class="bi"><use xlink:href="#edit"/></svg></button>
          </td>
        </tr> 
        @endforeach
      </tbody>
    </table>
  </div>
    
@endsection