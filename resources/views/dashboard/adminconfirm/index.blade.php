@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Konfirmasi Pembayaran</h1>
</div>
<div class="table-responsive">
    <table class="table table-hover table-striped table-dark table-sm">
        <thead>
            <tr class="text-center">
                <th scope="col" class="py-3">No.</th>
                <th scope="col" class="py-3">Jenis Reservasi</th>
                <th scope="col" class="py-3">ID Transaksi</th>
                <th scope="col" class="py-3">Username</th>
                <th scope="col" class="py-3">Checkin</th>
                <th scope="col" class="py-3">Checkout</th>
                <th scope="col" class="py-3">Total</th>
                <th scope="col" class="py-3">Update</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr class="text-center">
                    <th scope="row" class="py-2">{{ $loop->iteration }}</th>
                    <td class="py-2">{{ $transaction->title }}</td>
                    <td class="py-2">{{ $transaction->id }}</td>
                    <td class="py-2">{{ $transaction->author->username }}</td>
                    <td class="py-2">{{ $transaction->start_date->format('d M Y') }}</td>
                    <td class="py-2">{{ $transaction->end_date->format('d M Y') }}</td>
                    <td class="py-2">Rp.{{ $transaction->bill }}</td>
                    <td>
                        <form action="{{ route('adminconfirm.update', $transaction->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success">Konfirmasi</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    
@endsection