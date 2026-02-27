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
                    <div class="brand-text">UMLab</div>
                    <div class="vertical-line"></div>
                </div>
            </div>

            <!-- RIGHT SIDE -->
            <div class="col-lg-6 d-flex align-items-center justify-content-center right-panel">
                <div class="login-card">

                    <h3 class="fw-bold">Hi!</h3>
                    <p class="text-muted mb-4">Let’s start your UML Class Diagram journey</p>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- NAME -->
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-person"></i>
                                </span>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Enter your name" value="{{ old('name') }}" required autofocus>
                            </div>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- EMAIL -->
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-envelope"></i>
                                </span>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Enter your email" value="{{ old('email') }}" required>
                            </div>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- PASSWORD -->
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-lock"></i>
                                </span>
                                <input id="password" type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Enter your password" required>
                                <span class="input-group-text" style="cursor:pointer" onclick="togglePassword()">
                                    <i class="bi bi-eye-slash" id="eyeIcon"></i>
                                </span>
                            </div>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- CONFIRM PASSWORD -->
                        <div class="mb-4">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-lock"></i>
                                </span>
                                <input type="password" name="password_confirmation" class="form-control"
                                    placeholder="Confirm your password" required>
                            </div>
                        </div>

                        <!-- BUTTON -->
                        <div class="d-grid mb-4">
                            <button class="btn btn-auth  btn-primary ">Sign up</button>
                        </div>

                        <!-- DIVIDER -->
                        <div class="divider mb-4">or</div>

                        <!-- Google Button -->
                        <a href="{{ url('/auth/google') }}" class="btn btn-outline-primary">
                            <img src="https://www.svgrepo.com/show/475656/google-color.svg" width="20">
                            Sign in with Google
                        </a>

                        <div class="text-center small">
                            Already have an account?
                            <a href="{{ route('login') }}" class="text-primary fw-semibold text-decoration-none">
                                Login here
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
                eye.classList.replace("bi-eye-slash", "bi-eye");
            } else {
                password.type = "password";
                eye.classList.replace("bi-eye", "bi-eye-slash");
            }
        }
    </script>

</body>

</html>
