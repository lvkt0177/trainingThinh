<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .card {
            border-radius: 15px;
            background: white;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        .form-control {
            border-radius: 10px;
        }
        .input-group-text {
            background: #000000;
            color: white;
            border: none;
            border-radius: 10px 0 0 10px;
        }
        .btn-primary {
            border-radius: 10px;
            font-weight: bold;
            transition: 0.3s;
            background: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background: #0056b3;
        }
        .back-link {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }
        .back-link:hover {
            text-decoration: underline;
            color: #0056b3;
        }
    </style>
</head>
<body>

<div class="card text-center" style="max-width: 480px; width: 100%;">
    <h3 class="fw-bold">Reset Password</h3>
    <p class="text-muted">Enter your new password below.</p>


    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            <h5>{{session('error')}}</h5>
        </div>
    @endif

    @if (session('success'))

        <script>
            alert('{{session('success')}}');
            window.location.href = '/login';
        </script>

    @else
        <form method="POST" action="{{route('training.resetPassword.post')}}">
            @csrf
            <input type="hidden" name="email" value="{{ $email }}">
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="mb-3">
                <label for="password" class="form-label fw-bold">New Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}" >
                </div>
                @error('password')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="confirm_password" class="form-label fw-bold">Confirm Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" value="{{old('confirm_password')}}">
                </div>
                @error('confirm_password')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2">Reset Password</button>
        </form>
    @endif

   

    <div class="mt-3">
        <a href="/login" class="back-link">← Back to Login</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
