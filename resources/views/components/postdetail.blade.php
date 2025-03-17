@extends('layouts.template')

@section('title',$post->title)  

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center my-4">
        @auth
            <a href="{{route('training.posts')}}" class="btn btn-outline-secondary px-4 py-2">
                <i class="fas fa-arrow-left"></i> Back to Blog
            </a>
        @endauth

        @guest
            <a href="/news" class="btn btn-outline-secondary px-4 py-2">
                <i class="fas fa-arrow-left"></i> Back to Home
            </a>
        @endguest
    </div>
    
    <div class="card shadow-lg border-0 overflow-hidden col-12">
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

    <div class="card shadow-lg border-0 overflow-hidden col-12 my-3">
        <div class="card-body p-5">
            <form action="{{ route('training.posts.comment.post') }}" method="post" class="my-4 text-end">
                @csrf
                <input type="hidden" name="post_id" value="{{$post->id}}">
                <div class="mb-3">
                    <textarea class="form-control" id="body" rows="3" name="body" placeholder="Chia sẽ ý kiến của bạn" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Gửi</button>
            </form>
            <hr>
            <h3 class="fw-bold mb-3 text-left ">Comment</h3>
            
            @if ($comments)
                @foreach ($comments as $comment)
                    <div class="card shadow-sm mb-3">
                        <div class="card-body">
                        @if ($id_user == $comment->user_id)
                            <form action="{{ route('training.posts.comment.delete', $comment->id) }}" onsubmit="return confirm('Are you sure you want to delete this comment?')" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn-close position-absolute top-0 end-0 m-2" type="submit" aria-label="Close"></button>
                            </form>
                        @endif

                            <div class="d-flex align-items-start">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/59/User-avatar.svg/2048px-User-avatar.svg.png" alt="User Avatar" class="rounded-circle me-3" width="50">
                                <div>
                                    <h6 class="mb-1 fw-bold">{{$comment->user->name}}</h6>
                                    <p class="mb-0">{{$comment->body}}</p>

                                </div>
                            </div>
                            <div class="text-end mt-2">
                                <small class="text-muted me-2">{{$comment->created_at}}</small>
                            </div>
                        </div>
                    </div>
                @endforeach

                
            @endif

            
        </div>
    </div>


</div>
    
@endsection