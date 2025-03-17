@extends('layouts.admin')
@section('subtitle', 'Quản lý bài viết')

@section('content')
    <h3 class="my-2">Quản lý bài viết</h3>

    <div class="search mb-3">
        <form action="{{route('admin.posts.search')}}" class="" method="GET">
            @csrf
            <div class="d-flex">
                <div class="col-6 m-0 p-0">
                    <input type="text" class="form-control" value="{{ request('search') }}" name="search" placeholder="Nhập từ khóa tìm kiếm">
                </div>

                <div class="col-2">
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                </div>
            </div>
        </form>
    </div>
    
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <script>
                alert('{{ session('success') }}');
            </script>
        </div>
    @endif

    <div class="">
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Tiêu đề</th>
                    <th>Mô tả</th>
                    <th>Người đăng</th>
                    <th>Ngày đăng</th>
                    <th>Trạng thái</th>
                    <th>Công cụ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td style="width: 200px">{{$item->title}}</td>
                        <td style="width: 400px">{{$item->description}}</td>
                        <td>{{$item->user->email}}</td>
                        <td>{{$item->publish_date}}</td>
                        <td>{{$item->status->label()}}</td>
                        <td>
                            <div class="d-flex">
                                <a href="{{route('admin.posts.edits',['slug' => $item->slug])}}" class="btn btn-warning"><i class="bi bi-pencil-fill"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="pagination">
        {{$posts->links()}}
    </div>


@endsection