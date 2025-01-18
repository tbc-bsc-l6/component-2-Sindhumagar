<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shoes World</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
        /* Custom styles for the navbar */
        .navbar {
            background: linear-gradient(90deg, #1d3557, #457b9d);
        }

        .navbar-brand {
            font-family: 'Poppins', sans-serif;
            font-weight: bold;
            color: #f1faee !important;
        }

        .navbar-nav .nav-link {
            color: #f1faee !important;
            font-size: 1.1rem;
            margin: 0 10px;
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #a8dadc !important;
            text-decoration: underline;
        }

        .navbar-nav .btn {
            padding: 6px 15px;
            font-size: 1rem;
        }

        .social-icons a {
            color: #f1faee;
            font-size: 1.2rem;
            transition: transform 0.3s;
        }

        .social-icons a:hover {
            transform: scale(1.2);
            color: #a8dadc;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg shadow">
        <div class="container">
            <!-- Logo with brand name -->
            <a class="navbar-brand d-flex align-items-center" href="/">
                <img src="../shoelogo.png" alt="Logo" style="width: 50px; height: 50px;" class="me-2">
                <span class="fs-4">Shoes World</span>
            </a>
            <!-- Toggler for mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Collapsible content -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/viewAllShoes">Shoes</a>
                    </li>
                    @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('list.cart') }}">Cart</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('order.view') }}">Order</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile.setting') }}">Change Password</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-danger text-light" href="{{ route('account.logout') }}">Logout</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="btn btn-success text-light me-2" href="{{ route('account.login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-warning text-light" href="{{ route('account.register') }}">Register</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @if (Session::has('success'))
        <div class="alert alert-success mt-3 text-center" id="successMessage">{{ Session::get('success') }}</div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger mt-3 text-center" id="errorMessage">{{ Session::get('error') }}</div>
    @endif

    @yield('content')

    <!-- Footer -->
    <footer class="bg-dark text-light py-3 mt-5">
        <div class="container text-center">
            <div class="social-icons mb-3">
                <a href="#" class="mx-2">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="mx-2">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="mx-2">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="mx-2">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
            <p class="mb-0">&copy; 2025 Shoes World. All rights reserved.</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        setTimeout(function() {
            const successMessage = document.getElementById('successMessage');
            const errorMessage = document.getElementById('errorMessage');

            if (successMessage) {
                successMessage.style.display = 'none';
            }
            if (errorMessage) {
                errorMessage.style.display = 'none';
            }
        }, 5000);
    </script>
</body>

</html>
