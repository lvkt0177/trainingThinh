@extends('layouts.template')

@section('title', 'Blog')

@section('content')
    @if (session('success'))
        <script>
            alert('{{ session('success') }}');
        </script>
    @endif

    @if (session('error'))
        <script>
            alert('{{ session('error') }}');
        </script>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-2">
        <div class="d-flex align-items-center">
            <div>
                <h4 class="fw-bold mb-1">Your Posts List</h4>
            </div>
        </div>
        <div class="d-flex">
            <a href="{{ route('training.posts.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Create Post</a>
            <form action="{{route('training.posts.create.fake')}}" method="post">
                @csrf
                <button class="btn btn-primary ms-2" type="submit">Create 5 Fake Posts</button>
            </form>
        </div>
    </div>

    <div class="">
        <form method="POST" action="{{ route('training.posts.deleteALL') }}" onsubmit="return confirm('Bạn xác nhận xoá tất cả bài viết?')" >
            @csrf
            @method('DELETE')
            <button type="submit" style="border:none;"
                class=" text-danger fs-5 p-0 mb-3">Delete All</button>
        </form>
    </div>
    <div class="container mt-1">
        <div class="row" id="postList">
            @foreach ($posts as $post)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card shadow-sm position-relative" style="height: 450px">
                        <img src="{{ $post->thumbnail }}"
                            class="card-img-top" alt="Thumbnails" style="height: 230px;width: 100%; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{  Str::limit($post->title, 30) }}</h5>
                            <p class="text-muted" style="height: 40px">{{ Str::limit(strip_tags($post->description), 80) }}</p>
                            <div class="d-flex justify-content-between">
                                <a href="/training/posts/detail/{{ $post->slug }}"
                                    class="btn btn-sm btn-outline-primary"><i class="fa fa-eye" aria-hidden="true"></i>
                                    Read More</a>
                                <span class="text-muted small"><b><i class="fas fa-calendar-alt me-2"></i> </b>
                                    {{ $post->publish_date }}</span>
                            </div>
                            <div class="">
                                @if ($post->status == 0)
                                    <span class="badge bg-success my-3">Bài viết này đang chờ được phê duyệt</span>
                                @endif

                                @if ($post->status == 1)
                                    <span class="badge bg-primary my-3">Bài viết này đã được phê duyệt</span>
                                @endif
                            </div>
                        </div>

                        <div class="position-absolute top-0 end-0 p-2">
                            <a href="/training/posts/{{ $post->slug }}" class="btn btn-sm btn-warning me-1"><i
                                    class="fas fa-edit"></i></a>
                            <form action="/training/posts/delete/{{ $post->slug }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Bạn có chắc muốn xoá bài viết này?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-3"> 
            {{ $posts->links() }}
        </div>

    </div>
@endsection
