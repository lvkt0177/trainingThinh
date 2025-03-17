@extends('layouts.admin')

@section('content')
    <div class="">
        <h1>Edit User</h1>

        <form method="POST" action="{{ route('admin.users.edit.post') }}"
            onsubmit="return confirm('Xác nhận cập nhật thông tin?')">
            @csrf
            <input type="hidden" name="id" value="{{ $user->id }}">
            <div class="mb-3 text-center">
                <img src="https://as1.ftcdn.net/v2/jpg/03/46/83/96/1000_F_346839683_6nAPzbhpSkIpb8pmAwufkC7c5eD7wYws.jpg"
                    alt="Profile Image" class="rounded-circle" width="170">
            </div>
            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input type="text" class="form-control" name="first_name" value="{{ $user->first_name }}" required>
                @error('first_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>
            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}" required>
                @error('last_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="{{ $user->email }}" readonly>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>

                <select name="status" id="status" class="form-control">

                    @foreach ($userStatus as $status)
                        @if ($user->status->value == 0 || $status->value != 0)
                            <option value="{{ $status->value }}" {{ $user->status === $status ? 'selected' : '' }}>
                                {{ $status->label() }}
                            </option>
                        @endif
                    @endforeach

                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Address</label>
                <input type="text" class="form-control" name="address" value="{{ $user->address }}">
                @if ($errors->has('address'))
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                @endif
            </div>



            @if (session('success'))
                <div class="alert alert-success text-center" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="">
                <button type="submit" class="btn btn-primary w-100"><i class="fas fa-save"></i> Save Changes</button>
            </div>
        </form>
    </div>
@endsection
