@extends('layouts.admin')

@section('subtitle', 'Quản lý tài khoản')

@section('content')
    <h3>Quản lý tài khoản</h3>

    <div class="search mb-3">
        <form action="{{ route('admin.users.search') }}" method="post">
            @csrf
            <div class="d-flex">
                <div class="col-2">
                    <select name="type_search" id="" class="form-control">
                        <option value="hoTen">Họ tên</option>
                        <option value="email">Email</option>
                    </select>
                </div>

                <div class="col-6">
                    <input type="text" class="form-control" name="search" placeholder="Nhập từ khóa tìm kiếm">
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
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Trạng thái</th>
                    <th>Công cụ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td style="width: 250px">{{ $item->address, 50 }} </td>
                        <td>
                            {{ match ($item->status) {
                                0 => 'Chờ phê duyệt',
                                1 => 'Được phê duyệt',
                                2 => 'Bị từ chối',
                                3 => 'Bị khóa',
                                default => 'None',
                            } }}
                        </td>
                        <td>
                            <div class="d-flex">
                                <a href="/admin/users/edit/{{ $item->id }}" class="btn btn-warning"><i class="bi bi-pencil-fill"></i></a>

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="pagination">
        {{ $users->links() }}
    </div>
@endsection
