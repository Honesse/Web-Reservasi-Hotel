@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Konten Reservasi</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="table-responsive">
  <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Tambah Baru</a>
    <table class="table table-hover table-striped table-dark table-sm" >
      <thead class="py-3">
        <tr class="text-center">
          <th scope="col" class="py-3">No.</th>
          <th scope="col" class="py-3">Judul/Kategori</th>
          <th scope="col" class="py-3">Harga Sewa</th>
          <th scope="col" class="py-3">Opsi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)
        <tr class="text-center">
          <th scope="row" class="py-2">{{ $loop->iteration }}</th>
          <td class="py-2">{{ $post->title }}</td>
          <td class="py-2">{{ $post->price }}</td>
          <td class="py-2">
            <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info"><svg class="bi"><use xlink:href="#eye"/></svg></a>
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning"><svg class="bi"><use xlink:href="#edit"/></svg></a>
            <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><svg class="bi"><use xlink:href="#x-circle"/></svg></button>
            </form>
          </td>
        </tr> 
        @endforeach
      </tbody>
    </table>
  </div>
    
@endsection