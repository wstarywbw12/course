<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UMLab Reset Password</title>
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
        .login-card { width: 100%; max-width: 310px; }
        .form-control:focus { box-shadow: none; border-color: #2563eb; }
        .btn-primary { background-color: #2563eb; border: none; }
        .btn-primary:hover { background-color: #1d4ed8; }
    </style>
</head>
<body>
<div class="container-fluid h-100">
    <div class="row h-100">
        <!-- LEFT -->
        <div class="col-lg-6 d-none d-lg-flex align-items-center justify-content-center left-panel">
            <div class="text-center">
                <div class="brand-text"><img src="{{ asset('public/img/logo_light.png') }}" alt="sss" height="38"></div>
                <div class="vertical-line"></div>
            </div>
        </div>
        <!-- RIGHT -->
        <div class="col-lg-6 d-flex align-items-center justify-content-center right-panel">
            <div class="login-card">
                <h3 class="fw-bold">Reset Password</h3>
                <p class="text-muted mb-4">Enter your new password below</p>

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                     @method('PUT')
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email -->
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <input type="email" name="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   placeholder="Email" value="{{ old('email', request('email')) }}" required>
                        </div>
                        @error('email') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <!-- Password Baru -->
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <input type="password" name="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   placeholder="New Password" required>
                        </div>
                        @error('password') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <!-- Konfirmasi Password -->
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                            <input type="password" name="password_confirmation"
                                   class="form-control"
                                   placeholder="Confirm Password" required>
                        </div>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Reset Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>