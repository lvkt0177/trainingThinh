@extends('layouts.template')

@section('title','Sign Up')
@section('CSS')

    <style>
        body {
            background-color: #f8f9fa;
        }
        .register-container {
            max-width: 800px;
            width: 100%;
            padding: 3rem;
            background: white;
            border-radius: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        .register-title {
            font-size: 2rem;
            font-weight: bold;
        }
        .form-control {
            padding: 16px;
            font-size: 1.1rem;
            border-radius: 12px;
        }
        .btn-primary {
            font-size: 1.2rem;
            padding: 14px;
            border-radius: 12px;
            font-weight: bold;
        }
        .btn-google {
            font-size: 1.1rem;
            padding: 14px;
            border-radius: 12px;
            font-weight: bold;
        }
    </style>
@endsection
@section('content')

    <div class="container">
        @if (session('success'))
            <script>
                alert("{{session('success')}}");
                window.location.href = "/login";
            </script>
        @endif
        <div class="d-flex justify-content-center align-items-center">
            <div class="register-container">
                <h3 class="text-center register-title mb-3">Create an Account</h3>
                <p class="text-center text-muted mb-4">Sign up to get started</p>
                <form method="POST" action="{{route('training.sign-up.post')}}">
                    @csrf
                    <div class="mb-4">
                        <label for="first_name" class="form-label fw-semibold">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{old('first_name')}}" placeholder="Your first name" required>
                        @error('first_name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="last_name" class="form-label fw-semibold">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{old('last_name')}}" placeholder="Your last name" required>
                        @error('last_name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="email" class="form-label fw-semibold">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="Your email address" required>
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="address" class="form-label fw-semibold">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{old('address')}}" placeholder="Your address" required>
                        @error('address') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label fw-semibold">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Your password" required>
                        @error('password') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="confirm_password" class="form-label fw-semibold">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required>
                        @error('confirm_password') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                </form>
                <div class="text-center mt-4">
                    <span class="text-muted">Already have an account?</span>
                    <a href="/login" class="text-primary text-decoration-none fw-semibold">Login</a>
                </div>
                <hr>

            </div>
        </div>
        
    </div>
@endsection