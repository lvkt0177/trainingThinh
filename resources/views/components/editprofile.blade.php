@extends('layouts.template')

@section('title','Edit your profile')

@section('content')
<div class="container mt-5" style="height: 80vh">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 p-4">
                <h3 class="text-center fw-bold mb-4">Edit Profile</h3>
                <form method="POST" action="{{ route('training.profile.edit.post') }}" onsubmit="return confirm('Xác nhận cập nhật thông tin?')">
                    @csrf
                    <div class="mb-3 text-center">
                        <img src="https://as1.ftcdn.net/v2/jpg/03/46/83/96/1000_F_346839683_6nAPzbhpSkIpb8pmAwufkC7c5eD7wYws.jpg" 
                            alt="Profile Image" class="rounded-circle" width="120">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control" name="first_name" value="{{ $user->first_name }}" required>
                        @error('first_name') <span class="text-danger">{{$message}}</span> @enderror

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}" required>
                        @error('last_name') <span class="text-danger">{{$message}}</span> @enderror

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $user->email }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" value="{{ $user->address }}">
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                        @if (session('success'))
                            <div class="alert alert-success text-center" role="alert">
                                {{session('success')}}
                            </div>
                        @endif

                    <button type="submit" class="btn btn-primary w-100"><i class="fas fa-save"></i> Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection