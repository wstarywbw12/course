<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Font (opsional biar mirip) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background: #f3f4f6;
            font-family: 'Inter', sans-serif;
        }

        .login-wrapper {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            width: 380px;
            background: white;
            padding: 35px 30px;
            border-radius: 14px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
        }

        .login-title {
            font-size: 28px;
            font-weight: 700;
        }

        .login-subtitle {
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 25px;
        }

        /* input icon */
        .input-group-text {
            background: transparent;
            border-right: 0;
            color: #6b7280;
        }

        .form-control {
            border-left: 0;
            padding: 12px;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #c7d2fe;
        }

        /* login button */
        .btn-login {
            background: #2563eb;
            border: none;
            padding: 12px;
            border-radius: 10px;
            font-weight: 600;
        }

        .btn-login:hover {
            background: #1d4ed8;
        }

        /* divider */
        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            color: #9ca3af;
            font-size: 13px;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #e5e7eb;
        }

        .divider:not(:empty)::before {
            margin-right: .75em;
        }

        .divider:not(:empty)::after {
            margin-left: .75em;
        }

        /* google button */
        .btn-google {
            border: 1px solid #d1d5db;
            border-radius: 10px;
            padding: 12px;
            font-weight: 500;
            background: white;
        }

        .btn-google:hover {
            background: #f9fafb;
        }
    </style>

</head>

<body>


    <div class="login-wrapper">

        <div class="login-card">

            <div class="mb-4">
                <div class="login-title">Hi!</div>
                <div class="login-subtitle">Let’s start your UML Class Diagram journey</div>
            </div>

            <form method="POST" action="{{ route('login') }}">
                    @csrf
                <!-- EMAIL -->
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-envelope"></i>
                        </span>
                        <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                    </div>
                </div>

                <!-- PASSWORD -->
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-lock"></i>
                        </span>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password"
                            required>
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

                <!-- LOGIN BUTTON -->
                <div class="d-grid mb-4">
                    <button type="submit"  class="btn btn-login text-white">Login</button>
                </div>

                <!-- DIVIDER -->
                <div class="divider mb-4">or</div>

                <!-- GOOGLE -->
                <div class="d-grid mb-3">
                    <button type="button" class="btn btn-google">
                        <img src="https://www.svgrepo.com/show/475656/google-color.svg" width="20" class="me-2">
                        Sign in with Google
                    </button>
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

</body>

</html>
