<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UMLab - Verify Email</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { height: 100vh; overflow: hidden; }
        .left-panel {
            background: linear-gradient(160deg, #000000 40%, #1e4ed8 70%, #e5e7eb 100%);
            color: white;
        }
        .brand-text { font-size: 48px; font-weight: 700; }
        .vertical-line { width: 3px; height: 120px; background: white; margin: 40px auto 0; }
        .right-panel { background-color: #f8f9fa; }
        .verify-card { width: 100%; max-width: 360px; }
        .btn-primary { background-color: #2563eb; border: none; }
        .btn-primary:hover { background-color: #1d4ed8; }
        .icon-circle {
            width: 70px; height: 70px;
            background: #dbeafe;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 20px;
        }
    </style>
</head>
<body>
<div class="container-fluid h-100">
    <div class="row h-100">
        <!-- LEFT -->
        <div class="col-lg-6 d-none d-lg-flex align-items-center justify-content-center left-panel">
            <div class="text-center">
                <div class="brand-text">UMLab</div>
                <div class="vertical-line"></div>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="col-lg-6 d-flex align-items-center justify-content-center right-panel">
            <div class="verify-card text-center">

                <!-- Icon -->
                <div class="icon-circle">
                    <i class="bi bi-envelope-check fs-2 text-primary"></i>
                </div>

                <h3 class="fw-bold">Verify Your Email</h3>
                <p class="text-muted mb-4">
                    We've sent a verification link to your email.<br>
                    Please check your inbox and click the link to activate your account.
                </p>

                <!-- Pesan sukses kirim ulang -->
                @if (session('status') == 'verification-link-sent')
                    <div class="alert alert-success">
                        <i class="bi bi-check-circle me-2"></i>
                        A new verification link has been sent to your email.
                    </div>
                @endif

                <!-- Tombol kirim ulang -->
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-send me-2"></i>Resend Verification Email
                        </button>
                    </div>
                </form>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-link text-muted small">
                        <i class="bi bi-box-arrow-right me-1"></i>Logout
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>
</body>
</html>