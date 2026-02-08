<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Register</title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Icons -->
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

.divider{
    display:flex;
    align-items:center;
    text-align:center;
    color:#9ca3af;
    font-size:13px;
}

.divider::before,
.divider::after{
    content:'';
    flex:1;
    border-bottom:1px solid #e5e7eb;
}

.divider:not(:empty)::before{
    margin-right:.75em;
}
.divider:not(:empty)::after{
    margin-left:.75em;
}

.btn-google{
    border:1px solid #2563eb;
    border-radius:10px;
    padding:12px;
    font-weight:500;
    background:white;
}

.btn-google:hover{
    background:#f9fafb;
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
            <div class="auth-title">Hi!</div>
            <div class="auth-subtitle">Let’s start your UML Class Diagram journey</div>
        </div>

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
                        placeholder="Enter your name"
                        value="{{ old('name') }}" required autofocus>
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
                        placeholder="Enter your email"
                        value="{{ old('email') }}" required>
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
                    <input type="password" name="password_confirmation"
                        class="form-control"
                        placeholder="Confirm your password" required>
                </div>
            </div>

            <!-- BUTTON -->
            <div class="d-grid mb-4">
                <button class="btn btn-auth text-white">Sign up</button>
            </div>

            <!-- DIVIDER -->
            <div class="divider mb-4">or</div>

            <!-- GOOGLE -->
            <div class="d-grid mb-4">
                <button type="button" class="btn btn-google">
                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" width="20" class="me-2">
                    Sign up with Google
                </button>
            </div>

            <div class="text-center small">
                Already have an account?
                <a href="{{ route('login') }}" class="text-primary fw-semibold text-decoration-none">
                    Login here
                </a>
            </div>

        </form>
    </div>
</div>

<script>
function togglePassword(){
    const password = document.getElementById("password");
    const eye = document.getElementById("eyeIcon");

    if(password.type === "password"){
        password.type = "text";
        eye.classList.replace("bi-eye-slash","bi-eye");
    }else{
        password.type = "password";
        eye.classList.replace("bi-eye","bi-eye-slash");
    }
}
</script>

</body>
</html>
