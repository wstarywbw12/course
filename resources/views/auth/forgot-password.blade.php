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

                    <h3 class="fw-bold">Forgot Password?</h3>
                    <p class="text-muted mb-4">You'll receive an email to recover your password</p>

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <!-- Tampilkan pesan sukses -->
                        @if (session('status'))
                            <div class="alert alert-success mb-3">
                                {{ session('status') }}
                            </div>
                        @endif

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
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Send Button -->
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>

                        <div class="text-center">
                            <a href="{{ route('login') }}" class="text-muted small">
                                <i class="bi bi-arrow-left"></i> Back to Login
                            </a>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>


</body>

</html>
