@extends('layouts.template')

@section('content')
    <div class="container d-flex flex-column justify-content-center align-items-center vh-100 text-center">
        <h1 class="display-1 fw-bold text-danger">404</h1>
        <h2 class="fw-semibold">Oops! Page Not Found</h2>
        <p class="text-muted fs-5">The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
        <a href="/" class="btn btn-primary px-4 py-2 mt-3">
            <i class="fas fa-home"></i> Go to Homepage
        </a>
    </div>
@endsection