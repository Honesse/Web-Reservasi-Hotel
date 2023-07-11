@extends('layouts.main')

@section('container')

<link href="/css/grid.css" rel="stylesheet">

<div class="container">
    <div class="row">
        <div class="row mb-3 text-center">
          <div class="col-md-8">
            <h2 class="mt-4">
              Jenis Transaksi
            </h2>
          </div>
          <h2 class="col-md-4 mt-4">Status Pembayaran</h2>
        </div>
        @foreach ($transactions as $transaction)
        <div class="row mb-3 text-center">
          <div class="col-md-8 themed-grid-col">
            <div class="pb-3"> <h5 class="my-1">
              {{ $transaction->title }}</h5>
            </div>
            <div class="row">
              <div class="col-md-6 themed-grid-col">{{ $transaction->estimate }} hari penyewaan</div>
              <div class="col-md-6 themed-grid-col">Total Rp.{{ $transaction->bill }}</div>
            </div>
          </div>
          @if ($transaction->paymentstatus === 1)
          <div class="col-md-4 themed-grid-col"><p class="my-2">Lunas</p>
            <div>
              <a href="{{ route('transaction.invoice', $transaction->id) }}">
              <button type="button" class="btn btn-danger">Download Invoice</button>
              </a>
            </div>
          </div>

          @else
          <div class="col-md-4 themed-grid-col"><p class="my-2"> Belum dibayar </p>
            <div>
              <button type="button" class="btn btn-danger">Bayar Sekarang</button>
            </div>
          </div>  
          @endif
        </div>
        @endforeach
        <div class="row mb-3 text-center">
          <div class="col-md-8 themed-grid-col">
            <div class="pb-3">
              -
            </div>
            <div class="row">
              <div class="col-md-6 themed-grid-col">
                <a href=""></a> -
                </div>
              <div class="col-md-6 themed-grid-col"> - </div>
            </div>
          </div>
          <div class="col-md-4 themed-grid-col text-center"></div>
        </div>
    </div>
</div>


    
@endsection