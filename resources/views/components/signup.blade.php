@extends('layouts.template')

@section('title','Sign Up')

@section('content')
    <div class="container">
        @if (session('success'))
            <script>
                alert("{{session('success')}}");
                window.location.href = "/login";
            </script>
        @endif
        <form class="container mt-5 col-md-6" method="POST" action="{{route('training.sign-up.post')}}">
            @csrf
            <h2 class="mb-4">Sign Up</h2>
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control mb-2" id="first_name" name="first_name" value="{{old('first_name')}}">

                @error('first_name')
                    <span class="text-danger">{{$message}}</span>
                @enderror

            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control mb-2" id="last_name" name="last_name" value="{{old('last_name')}}">

                @error('last_name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control mb-2" id="email" name="email" value="{{old('email')}}">

                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control mb-2" id="address" name="address" value="{{old('address')}}">

                @error('address')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control mb-2" id="password" name="password" value="{{old('password')}}">
                @error('password')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control mb-2" id="confirm_password" name="confirm_password">
                @error('confirm_password')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>
        
    </div>
@endsection