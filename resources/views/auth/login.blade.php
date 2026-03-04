<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>UMLab Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            height: 100vh;
            overflow: hidden;
        }

        /* LEFT SIDE */
        .left-panel {
            background: linear-gradient(160deg, #000000 40%, #1e4ed8 70%, #e5e7eb 100%);
            color: white;
            position: relative;
        }

        .brand-text {
            font-size: 48px;
            font-weight: 700;
        }

        .vertical-line {
            width: 3px;
            height: 120px;
            background: white;
            margin: 40px auto 0;
        }

        /* RIGHT SIDE */
        .right-panel {
            background-color: #f8f9fa;
        }

        .login-card {
            width: 100%;
            max-width: 310px;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #2563eb;
        }

        .btn-primary {
            background-color: #2563eb;
            border: none;
        }

        .btn-primary:hover {
            background-color: #1d4ed8;
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 20px 0;
        }

        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid #ccc;
        }

        .divider:not(:empty)::before {
            margin-right: .75em;
        }

        .divider:not(:empty)::after {
            margin-left: .75em;
        }

        @media (max-width: 992px) {
            .left-panel {
                display: none;
            }
        }
    </style>
</head>

<body>

    <div class="container-fluid h-100">
        <div class="row h-100">

            <!-- LEFT SIDE -->
            <div class="col-lg-6 d-none d-lg-flex align-items-center justify-content-center left-panel">
                <div class="text-center">
                    <div class="brand-text"><img src="{{ asset('public/img/logo_light.png') }}" alt="sss" height="38"></div>
                    <div class="vertical-line"></div>
                </div>
            </div>

            <!-- RIGHT SIDE -->
            <div class="col-lg-6 d-flex align-items-center justify-content-center right-panel">
                <div class="login-card">

                    <h3 class="fw-bold">Hi!</h3>
                    <p class="text-muted mb-4">Let’s start your UML Class Diagram journey</p>

                    {{-- GLOBAL ERROR ALERT --}}
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i>
                            {{ $errors->first() }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- EMAIL -->
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-envelope"></i>
                                </span>
                                <input type="email" name="email" class="form-control" placeholder="Enter your email"
                                    required>
                            </div>
                        </div>

                        <!-- PASSWORD -->
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-lock"></i>
                                </span>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Enter your password" required>
                                <span class="input-group-text" style="cursor:pointer" onclick="togglePassword()">
                                    <i class="bi bi-eye-slash" id="eyeIcon"></i>
                                </span>
                            </div>
                        </div>

                        <!-- REMEMBER + FORGOT -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember">
                                <label class="form-check-label" for="remember">
                                    Remember me
                                </label>
                            </div>

                            <a href="{{ route('password.request') }}" class="text-decoration-none small text-primary">
                                Forgot Password
                            </a>
                        </div>

                        <!-- Login Button -->
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-login btn-primary ">Login</button>
                        </div>

                        <!-- DIVIDER -->
                        <div class="divider mb-4">or</div>

                        <!-- Google Button -->
                        <div class="d-grid mb-3">
                            <a href="{{ url('/auth/google') }}" class="btn btn-outline-primary">
                                <img src="https://www.svgrepo.com/show/475656/google-color.svg" width="20">
                                Sign in with Google
                            </a>
                        </div>

                        <div class="text-center small">
                            Don’t have an account?
                            <a href="{{ route('register') }}" class="text-primary fw-semibold text-decoration-none">
                                Sign up here
                            </a>
                        </div>

                    </form>


                </div>
            </div>

        </div>
    </div>


    <script>
        function togglePassword() {
            const password = document.getElementById("password");
            const eye = document.getElementById("eyeIcon");

            if (password.type === "password") {
                password.type = "text";
                eye.classList.remove("bi-eye-slash");
                eye.classList.add("bi-eye");
            } else {
                password.type = "password";
                eye.classList.remove("bi-eye");
                eye.classList.add("bi-eye-slash");
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
