@extends('layouts.template')

@section('title',$post->title)  

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center my-4">
        <a href="{{route('training.posts')}}" class="btn btn-outline-secondary px-4 py-2">
            <i class="fas fa-arrow-left"></i> Back to Blog
        </a>
        <div>
            <a href="" class="btn btn-primary px-4 py-2 me-2">
                <i class="fas fa-edit"></i> Edit
            </a>
        </div>
    </div>
    <div class="card shadow-lg border-0 overflow-hidden">
        <img src="{{$post->thumbnail}}" class="card-img-top" alt="Post Image" style="height: 450px; object-fit: cover;">
        <div class="card-body p-5">
            <h1 class="fw-bold mb-3 text-center">{{$post->title}}</h1>
            <div class="d-flex justify-content-center align-items-center text-muted mb-4">
                <i class="fas fa-calendar-alt me-2"></i> <span class="fw-semibold"></span> {{ $post->publish_date}}
            </div>
            <hr>
            <div class="post-content fs-5 lh-lg">
               {!! $post->content !!}
            </div>
            <hr>
            
        </div>
    </div>
</div>
    
@endsection

