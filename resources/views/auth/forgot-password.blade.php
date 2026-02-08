<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Forgot Password</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<!-- Font -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
body{
    background:#f3f4f6;
    font-family:'Inter',sans-serif;
}

.auth-wrapper{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

.auth-card{
    width:380px;
    background:#fff;
    padding:35px 30px;
    border-radius:14px;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
}

.auth-title{
    font-size:28px;
    font-weight:700;
}

.auth-subtitle{
    color:#6b7280;
    font-size:14px;
    margin-bottom:25px;
}

.input-group-text{
    background:transparent;
    border-right:0;
    color:#6b7280;
}

.form-control{
    border-left:0;
    padding:12px;
}

.form-control:focus{
    box-shadow:none;
    border-color:#c7d2fe;
}

.btn-auth{
    background:#2563eb;
    border:none;
    padding:12px;
    border-radius:10px;
    font-weight:600;
}

.btn-auth:hover{
    background:#1d4ed8;
}

.invalid-feedback{
    display:block;
}
</style>
</head>
<body>

<div class="auth-wrapper">
    <div class="auth-card">

        <div class="mb-4">
            <div class="auth-title">Forgot password?</div>
            <div class="auth-subtitle">
                You’ll receive an email to recover your password.
            </div>
        </div>

        <!-- SUCCESS MESSAGE -->
        @if (session('status'))
            <div class="alert alert-success small">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- EMAIL -->
            <div class="mb-4">
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-envelope"></i>
                    </span>
                    <input type="email"
                        name="email"
                        class="form-control @error('email') is-invalid @enderror"
                        placeholder="Enter your email"
                        value="{{ old('email') }}"
                        required autofocus>
                </div>

                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- BUTTON -->
            <div class="d-grid">
                <button class="btn btn-auth text-white">
                    Send
                </button>
            </div>

        </form>

    </div>
</div>

</body>
</html>
