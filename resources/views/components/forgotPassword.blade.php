@extends('layouts.template')

@section('title','Forgot Password')

@section('content')
<div class="d-flex justify-content-center align-items-center bg-light" style="height: 65vh">
    <div class="card shadow-lg p-5 rounded-4" style="max-width: 600px; width: 100%; border: none;">

        @if (session('success'))
        <div class="alert alert-success" role="alert">
            <h5>{{session('success')}}</h5>
        </div>
        @else
            <h3 class="text-center mb-3 fw-bold text-dark">Forgot Password</h3>
            <p class="text-center text-muted">Enter your email below and we'll send a reset link.</p>

            <form method="POST" action="{{ route('training.forgotPassword.post') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email Address</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0">
                            <i class="fa-solid fa-envelope text-muted"></i>
                        </span>
                        <input type="email" class="form-control border-start-0" id="email" name="email" required>
                    </div>
                    @error('email')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary w-100 py-2 fw-bold shadow-sm">Send</button>
            </form>
            <div class="text-center mt-3">
                <a href="/login" class="text-decoration-none text-primary fw-semibold">Back to Login</a>
            </div>
            
        @endif

    </div>
</div>


@endsection
