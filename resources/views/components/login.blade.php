<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-container {
            max-width: 600px;
            width: 100%;
            padding: 3rem;
            background: white;
            border-radius: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        .login-title {
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
</head>
<body>

<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="login-container">
        <div class="text-center">
            <a href="/" class="text-center text-dark login-title mb-3 text-decoration-none">Training</a>
        </div>
        <p class="text-center text-muted mb-4">Sign in to your account</p>
        <form>
            <div class="mb-4">
                <label for="email" class="form-label fw-semibold">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" required placeholder="Enter your email">
            </div>
            <div class="mb-4">
                <label for="password" class="form-label fw-semibold">Password</label>
                <input type="password" class="form-control" id="password" name="password" required placeholder="Enter your password">
            </div>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <input type="checkbox" id="remember" class="form-check-input">
                    <label for="remember" class="form-check-label">Remember me</label>
                </div>
                <a href="#" class="text-primary text-decoration-none">Forgot Password?</a>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
        <div class="text-center mt-4">
            <span class="text-muted">Don't have an account?</span>
            <a href="/sign-up" class="text-primary text-decoration-none fw-semibold">Sign Up</a>
        </div>
        <hr>
     
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
