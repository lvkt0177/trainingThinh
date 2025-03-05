@extends('layouts.template')

@section('title', 'News')

@section('content')
    <div class="container mt-1">

        <div class="">
            <h3 class="fw-bold border-bottom border-3 border-dark">Tin mới</h3>
        </div>

        <div class="row" id="postList">

            @foreach ($posts as $post)
                <div class="col-12 border-bottom py-3 d-flex">
                    <a href="/training/posts/detail/{{$post->slug}}" class="text-decoration-none">
                        <img src="{{$post->thumbnail}}" class="img-fluid rounded"
                            style="width: 450px; height: 200px; object-fit: cover;" alt="Thumbnail">    
                    </a>
                    <div class="ms-3" style="width: 900px;">
                        <a class="text-decoration-none fs-3 text-dark fw-bold " href="/training/posts/detail/{{$post->slug}}" class="fw-bold mb-1">{{$post->title}}</a>
                        <p class="text-muted m-0">{{$post->publish_date}}</p>
                        <p class="text-secondary mb-0">{{Str::limit($post->description,100)}}</p>
                    </div>
                </div>
            @endforeach
        </div>


    </div>
@endsection
