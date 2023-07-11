@extends('layouts.main')

@section('container')

<h1 class="my-4 text-center" style="font-weight:700">{{ $title }}</h1>
 
@if ($posts->count())

<div class="card mb-3 text-center">
    @if ($posts[0]->image)
    <div style="max-height: 400px; overflow:hidden;">
        <img src="{{ asset('storage/' . $posts[0]->image) }}" alt="{{ $posts[0]->title }}" class="card-img-top">
    </div>
    @else
    <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}?hotel" class="card-img-top" alt="{{ $posts[0]->title }}">
    @endif
    <div class="card-body">
    <h2 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h2>
    <h2 class="card-title pricing-card-title">Rp. <a href="#" class="text-decoration-none">{{ $posts[0]->price }}</a><small class="text-body-secondary fw-light">/malam</small></h2>
    <p class="card-text">{{ $posts[0]->excerpt }}</p>

    <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-danger">Read more</a>

    </div>
</div>

<div class="container">
    <div class="row">
        @foreach ($posts->skip(1) as $post)
        <div class="col-md-4 mb-3">
            <div class="card">
                @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="card-img-top">
                @else
                <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
                @endif
                <div class="card-body">
                  <h3 class="card-title">{{ $post->title }}</h3>
                  <h5 class="card-title pricing-card-title">Rp. 
                    <a href="#" class="text-decoration-none">{{ $post->price }}</a>
                    <small class="text-body-secondary fw-light">/malam</small></h5>
                  <p class="card-text">{{ $post->excerpt }}</p>
                  <a href="/posts/{{ $post->slug }}" class="btn btn-danger">Read more</a>
                </div>
              </div>
        </div>
        @endforeach
    </div>
</div>

@else

<p class="text-center fs-4">No Post Found</p>
    
@endif

<div class="d-flex justify-content-center">
    {{ $posts->links() }}
</div>
    
@endsection