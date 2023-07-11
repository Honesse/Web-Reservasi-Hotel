@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Ketersediaan Kamar</h1>
</div>
<div class="table-responsive">
    <table class="table table-hover table-striped table-dark table-sm">
        <thead>
            <tr class="text-center">
                <th scope="col" class="py-3">No.</th>
                <th scope="col" class="py-3">Jenis Kamar</th>
                <th scope="col" class="py-3">No. Kamar</th>
                <th scope="col" class="py-3">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rooms as $room)
                <tr class="text-center">
                    <th scope="row" class="py-2">{{ $loop->iteration }}</th>
                    <td class="py-2">{{ $room->post->title }}</td>
                    <td class="py-2">{{ $room->no_kamar }}</td>
                    <td>@if ($room->status == 0)
                        <button type="button" class="btn btn-success" disabled>Available</button>
                    @else
                        <button type="button" class="btn btn-danger" disabled>Booked</button>
                    @endif</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    
@endsection