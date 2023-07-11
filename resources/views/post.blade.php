@extends('layouts.main')

@section('container')

<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <h1 class="mt-2">{{ $post->title }}</h1>
            <h5 class="card-title pricing-card-title mb-4">Rp. 
                <a href="#" class="text-decoration-none">{{ $post->price }}</a>
                <small class="text-body-secondary fw-light">/malam</small>
            </h5>

            @if ($post->image)
            <div style="max-height: 400px; overflow:hidden;">
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">
            </div>
            @else
            <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid">
            @endif

            <article class="my-3 fs-5" style="text-align: justify">
                {!! $post->body !!}
            </article>
            <div id="liveAlertPlaceholder"></div>
            <a href="/posts"><button type="button" class="btn btn-danger">Kembali</button></a>
            
            @if (!Auth::guest())
            <button type="button" class="btn btn-danger mx-2 px-4" data-bs-toggle="modal" data-bs-target="#exampleModal">  Book  </button>
                
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Formulir Reservasi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/posts/{post:slug}" method="post" enctype="multipart/form-data">
                        @csrf 
                        <div class="mb-3">
                            <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}">
                            <label for="title" class="form-label">Jenis Booking</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="Reservasi {{ $post->title }}" readonly>
                            @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="bill" class="form-label">Harga sewa per malam</label>
                            <input type="number" class="form-control @error('bill') is-invalid @enderror" id="bill" name="bill" value="{{ $post->price }}" readonly>
                            @error('bill')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="start_date" class="form-label">Tanggal Check-in</label>
                            <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{ old('start_date') }}">
                            @error('start_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="estimate" class="form-label">Berapa hari anda akan menginap?</label>
                            <input type="number" class="form-control @error('estimate') is-invalid @enderror" id="estimate" name="estimate" value="{{ $post->estimate }}">
                            @error('estimate')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-danger">Selesai</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
            </div>
            @else
            <button type="button" class="btn btn-danger mx-2 px-4" id="liveAlertBtn"> Book </button>
            @endif

        </div>
    </div>
</div>

<script>
    const alertPlaceholder = document.getElementById('liveAlertPlaceholder')
    const appendAlert = (message, type) => {
    const wrapper = document.createElement('div')
    wrapper.innerHTML = [
        `<div class="alert alert-${type} alert-dismissible" role="alert">`,
        `   <div>${message}</div>`,
        '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
        '</div>'
    ].join('')

    alertPlaceholder.append(wrapper)
    }

    const alertTrigger = document.getElementById('liveAlertBtn')
    if (alertTrigger) {
    alertTrigger.addEventListener('click', () => {
        appendAlert('Silahkan Login terlebih dahulu untuk melakukan booking', 'success')
    })
    }
</script>

@endsection

{{-- <form method="post" action="/dashboard/posts" class="mb-5" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Judul</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title') }}" value="Reservasi {{ $post->title }}">
      @error('title')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="slug" class="form-label">Slug</label>
      <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug') }}"">
      @error('slug')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="category" class="form-label">Pelayanan</label>
      <select class="form-select" name="category_id">
        @foreach ($categories as $category)
        @if (old('category_id') == $category->id)
        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
        @else
        <option value="{{ $category->id }}">{{ $category->name }}</option>
            
        @endif
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label for="slug" class="form-label">Harga sewa per malam</label>
      <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" required value="{{ old('price') }}"">
      @error('price')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="image" class="form-label">Sisipkan Gambar</label>
      <img class="img-preview img-fluid mb-3 col-sm-5">
      <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
      @error('image')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>        
    <div class="mb-3">
      <label for="body" class="form-label">Deskripsi Kamar</label>
      @error('body')
      <p class="text-danger">{{ $message }}</p>
      @enderror
      <input id="body" type="hidden" name="body" value="{{ old('body') }}">
      <trix-editor input="body"></trix-editor>
    </div>
    <button type="submit" class="btn btn-primary">Tambah</button>
</form> --}}