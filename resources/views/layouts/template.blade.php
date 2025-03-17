<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Training - @yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="icon" type="image/png" href="https://w7.pngwing.com/pngs/204/418/png-transparent-social-media-blogger-computer-icons-logo-blog-text-rectangle-orange.png"> 

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }
        .navbar {
            background: linear-gradient(90deg, #585858, #000000);
            padding: 15px 0;
        }
        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
        }
        .nav-link {
            font-size: 18px;
            transition: color 0.3s;
        }
        .nav-link:hover {
            color: #ffffff !important;
        }
        .footer {
            background: linear-gradient(90deg, #070707, #4d4c4c);
            color: rgb(255, 255, 255);
            padding: 50px 0;
            text-align: center;
            margin-top: 50px;
        }
        .footer .footer-links a {
            color: rgb(255, 255, 255);
            margin: 0 15px;
            text-decoration: none;
            transition: color 0.3s;
        }
        .footer .footer-links a:hover {
            color: #ffffff;
        }
        .footer .social-icons a {
            color: rgb(255, 255, 255);
            font-size: 20px;
            margin: 0 10px;
            transition: color 0.3s;
        }
        .footer .social-icons a:hover {
            color: #ffdd57;
        }
    </style>
    
    @yield('CSS')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">Training</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto me-2">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/news">News</a></li>
                    @auth
                        <li class="nav-item"><a class="nav-link" href="{{route('training.posts')}}">Your Posts</a></li>
                    @endauth

                    {{-- <li class="nav-item"><a class="nav-link" href="/shop">Shop</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li> --}}
                </ul>
                @auth
                    <ul class="navbar-nav">
                        <li class="nav-item d-flex align-items-center">
                            <a href="{{route('training.profile')}}" class="text-light fw-semibold fs-5 me-3 text-decoration-none"><i class="fa fa-user-circle" aria-hidden="true"></i> {{$name}}</a>
                            <a class="btn btn-danger px-4 py-2 rounded-pill" href="/logout">Log out</a>
                        </li>
                    </ul>
                @endauth

                @guest
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="btn btn-outline-light me-2 mb-2" href="/login">Login</a></li>
                        <li class="nav-item"><a class="btn btn-danger" href="{{route('training.sign-up')}}">Sign Up</a></li>
                    </ul>
                @endguest

            </div>
        </div>
    </nav>

    @if (session('success'))
        <div id="success-alert"
            class="position-fixed end-0 bottom-0 mb-3 me-3 p-3 alert alert-success shadow-lg  fade show d-flex align-items-center"
            role="alert" style="display: none; min-width: 400px;z-index:999;">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
        </div>

        <script>
            let alertBox = document.getElementById("success-alert");

            alertBox.style.display = "block";

            setTimeout(() => {
                alertBox.classList.remove("show");
                setTimeout(() => alertBox.style.display = "none", 500);
            }, 4000);
        </script>
    @endif

    @if (session('error'))
        <div id="error-alert"
            class="position-fixed bottom-4 end-0 mb-3 me-3 p-3 alert alert-danger shadow-lg fade show d-flex align-items-center"
            role="alert" style="display: none; min-width: 400px; z-index: 999;">
            <i class="bi bi-x-circle-fill me-2"></i> {{ session('error') }}
        </div>

        <script>
            let alertBox = document.getElementById("error-alert");
            alertBox.style.display = "block";
            setTimeout(() => {
                alertBox.classList.remove("show");
                setTimeout(() => alertBox.style.display = "none", 500);
            }, 4000);
        </script>
    @endif
    
    @if (session('logout'))
        <script>
            alert('{{session('logout')}}');
        </script>
    @endif

    @if (session('login'))
        <script>
            alert('{{session('login')}}');
        </script>
    @endif
  

    
    <main class="container mt-4">
        @yield('content')
    </main>
    
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Traing</h5>
                    <p>Training by Nguyen Thai Phuong & Dinh Tien Cong</p>
                </div>
                <div class="col-md-4 footer-links">
                    <h5>Links</h5>
                    <a href="/">Home</a>
                    <a href="/shop">Shop</a>
                    <a href="/about">About</a>
                    <a href="/contact">Contact</a>
                </div>
                <div class="col-md-4 social-icons">
                    <h5>Follow Us</h5>
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <hr>
            <p>&copy; 2025 Training. KHGC</p>
        </div>
    </footer>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @yield('JS')
    @stack('scripts')
</body>
</html>