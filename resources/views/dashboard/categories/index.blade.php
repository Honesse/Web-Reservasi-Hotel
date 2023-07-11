@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Update Kategori</h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success col-lg-6" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="table-responsive">
    <a href="/dashboard/categories/create" class="btn btn-primary mb-3">Tambah Baru</a>
    <table class="table table-hover table-striped table-dark table-sm" >
      <thead class="py-3">
        <tr class="text-center">
          <th scope="col" class="py-2">No.</th>
          <th scope="col" class="py-2">Nama Kategori</th>
          <th scope="col" class="py-2">Opsi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($categories as $category)
        <tr class="text-center">
          <th scope="row" class="py-2">{{ $loop->iteration }}</th>
          <td class="py-2">{{ $category->name }}</td>
          <td>
            <a href="/dashboard/categories/{{ $category->slug }}" class="badge bg-info"><svg class="bi"><use xlink:href="#eye"/></svg></a>
            <a href="/dashboard/categories/{{ $category->slug }}" class="badge bg-warning"><svg class="bi"><use xlink:href="#edit"/></svg></a>
            <a href="/dashboard/categories/{{ $category->slug }}" class="badge bg-danger"><svg class="bi"><use xlink:href="#x-circle"/></svg></a>
          </td>
        </tr> 
        @endforeach
      </tbody>
    </table>
  </div>
    
@endsection