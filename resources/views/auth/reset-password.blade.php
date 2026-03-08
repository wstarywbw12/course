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
        
        /* Validation styling */
        .validation-list {
            list-style: none;
            padding-left: 5px;
            margin-top: 8px;
            margin-bottom: 0;
            transition: all 0.3s ease;
        }

        .validation-list li {
            font-size: 0.85rem;
            margin-bottom: 2px;
            transition: all 0.2s ease;
        }

        .text-success {
            color: #198754 !important;
        }

        .text-danger {
            color: #dc3545 !important;
        }

        .validation-hidden {
            display: none;
        }

        .validation-visible {
            display: block;
        }

        .password-strength {
            transition: all 0.3s ease;
            margin-top: 8px;
        }

        .progress {
            height: 5px;
            border-radius: 10px;
            background-color: #e9ecef;
        }

        .input-group-text {
            background-color: white;
            border-right: none;
        }

        .input-group .form-control {
            border-left: none;
        }

        .input-group .form-control:focus {
            border-left: none;
            border-color: #dee2e6;
        }
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

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        {{ $errors->first() }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <form method="POST" action="{{ route('password.update') }}" id="resetForm">
                    @csrf
                     @method('PUT')  
                    <input type="hidden" name="token" value="{{ $request->route('token') ?? $token ?? '' }}">

                    <!-- Email -->
                    <div class="mb-3">
                        <div class="input-group @error('email') has-validation @enderror">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <input type="email" name="email" id="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   placeholder="Email" value="{{ old('email', $email ?? '') }}" required 
                                   aria-describedby="emailHelp">
                        </div>
                        @error('email') 
                            <div class="text-danger small mt-1">{{ $message }}</div> 
                        @enderror
                    </div>

                    <!-- Password Baru dengan Toggle -->
                    <div class="mb-3">
                        <div class="input-group @error('password') has-validation @enderror">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <input type="password" name="password" id="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   placeholder="New Password" required
                                   aria-describedby="passwordValidation">
                            <span class="input-group-text" style="cursor:pointer" onclick="togglePassword()">
                                <i class="bi bi-eye-slash" id="eyeIcon"></i>
                            </span>
                        </div>
                        @error('password') 
                            <div class="text-danger small mt-1">{{ $message }}</div> 
                        @enderror

                        <!-- LIVE VALIDATION -->
                        <ul class="validation-list" id="passwordValidation">
                            <li id="length" class="text-danger">
                                <i class="bi bi-x-circle-fill me-1" id="lengthIcon"></i>
                                Minimum 6 characters
                            </li>
                            <li id="uppercase" class="text-danger">
                                <i class="bi bi-x-circle-fill me-1" id="uppercaseIcon"></i>
                                At least one uppercase letter
                            </li>
                            <li id="number" class="text-danger">
                                <i class="bi bi-x-circle-fill me-1" id="numberIcon"></i>
                                At least one number
                            </li>
                            <li id="special" class="text-danger">
                                <i class="bi bi-x-circle-fill me-1" id="specialIcon"></i>
                                At least one special character
                            </li>
                        </ul>

                        <!-- Password Strength Meter -->
                        <div class="password-strength" id="strengthMeter">
                            <div class="progress">
                                <div id="strengthBar" class="progress-bar" role="progressbar" style="width: 0%;"></div>
                            </div>
                            <small id="strengthText" class="text-muted mt-1 d-block"></small>
                        </div>
                    </div>

                    <!-- Konfirmasi Password dengan Toggle -->
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                   class="form-control"
                                   placeholder="Confirm Password" required
                                   aria-describedby="confirmHelp">
                            <span class="input-group-text" style="cursor:pointer" onclick="toggleConfirmPassword()">
                                <i class="bi bi-eye-slash" id="eyeConfirmIcon"></i>
                            </span>
                        </div>
                        <div id="matchMessage" class="small mt-2 validation-hidden"></div>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary" id="submitBtn">Reset Password</button>
                    </div>

                    <div class="text-center mt-3">
                        <a href="{{ route('login') }}" class="text-primary text-decoration-none small">
                            <i class="bi bi-arrow-left"></i> Back to Login
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Get elements
    const password = document.getElementById("password");
    const confirmPassword = document.getElementById("password_confirmation");
    
    const validationBox = document.getElementById("passwordValidation");
    const matchMessage = document.getElementById("matchMessage");
    const strengthBar = document.getElementById("strengthBar");
    const strengthText = document.getElementById("strengthText");

    const lengthCheck = document.getElementById("length");
    const uppercaseCheck = document.getElementById("uppercase");
    const numberCheck = document.getElementById("number");
    const specialCheck = document.getElementById("special");

    // Icons
    const lengthIcon = document.getElementById("lengthIcon");
    const uppercaseIcon = document.getElementById("uppercaseIcon");
    const numberIcon = document.getElementById("numberIcon");
    const specialIcon = document.getElementById("specialIcon");

    // Track if user has started typing
    let passwordTouched = false;
    let confirmTouched = false;

    // Initialize validation as hidden
    document.addEventListener("DOMContentLoaded", function() {
        validationBox.style.display = "none";
        matchMessage.style.display = "none";
        document.getElementById("strengthMeter").style.display = "none";
    });

    // Add event listeners
    password.addEventListener("focus", function() {
        validationBox.style.display = "block";
        document.getElementById("strengthMeter").style.display = "block";
    });

    password.addEventListener("keyup", function() {
        passwordTouched = true;
        validatePassword();
        calculateStrength();
    });

    password.addEventListener("blur", function() {
        if (password.value.length > 0) {
            validationBox.style.display = "block";
            document.getElementById("strengthMeter").style.display = "block";
        }
    });

    confirmPassword.addEventListener("keyup", function() {
        confirmTouched = true;
        checkMatch();
    });

    confirmPassword.addEventListener("focus", function() {
        if (passwordTouched) {
            matchMessage.classList.remove("validation-hidden");
            matchMessage.style.display = "block";
        }
    });

    function validatePassword() {
        const value = password.value;

        // Update each condition
        updateValidationItem(lengthCheck, lengthIcon, value.length >= 6);
        updateValidationItem(uppercaseCheck, uppercaseIcon, /[A-Z]/.test(value));
        updateValidationItem(numberCheck, numberIcon, /[0-9]/.test(value));
        updateValidationItem(specialCheck, specialIcon, /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(value));

        if (confirmTouched) {
            checkMatch();
        }
    }

    function updateValidationItem(element, icon, isValid) {
        if (isValid) {
            element.classList.remove("text-danger");
            element.classList.add("text-success");
            icon.classList.remove("bi-x-circle-fill");
            icon.classList.add("bi-check-circle-fill");
        } else {
            element.classList.remove("text-success");
            element.classList.add("text-danger");
            icon.classList.remove("bi-check-circle-fill");
            icon.classList.add("bi-x-circle-fill");
        }
    }

    function calculateStrength() {
        const value = password.value;
        let strength = 0;
        
        if (value.length >= 6) strength += 25;
        if (/[A-Z]/.test(value)) strength += 25;
        if (/[0-9]/.test(value)) strength += 25;
        if (/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(value)) strength += 25;
        
        strengthBar.style.width = strength + '%';
        
        if (strength <= 25) {
            strengthBar.className = 'progress-bar bg-danger';
            strengthText.textContent = 'Weak password';
            strengthText.className = 'text-danger mt-1 d-block';
        } else if (strength <= 50) {
            strengthBar.className = 'progress-bar bg-warning';
            strengthText.textContent = 'Fair password';
            strengthText.className = 'text-warning mt-1 d-block';
        } else if (strength <= 75) {
            strengthBar.className = 'progress-bar bg-info';
            strengthText.textContent = 'Good password';
            strengthText.className = 'text-info mt-1 d-block';
        } else {
            strengthBar.className = 'progress-bar bg-success';
            strengthText.textContent = 'Strong password';
            strengthText.className = 'text-success mt-1 d-block';
        }
    }

    function checkMatch() {
        if (confirmPassword.value === "") {
            if (confirmTouched) {
                matchMessage.innerHTML = '<i class="bi bi-exclamation-circle-fill me-1"></i>Please confirm your password';
                matchMessage.className = "small mt-2 text-warning";
                matchMessage.style.display = "block";
            } else {
                matchMessage.style.display = "none";
            }
            return;
        }

        matchMessage.style.display = "block";
        
        if (password.value === confirmPassword.value) {
            matchMessage.innerHTML = '<i class="bi bi-check-circle-fill me-1"></i>Passwords match';
            matchMessage.className = "small mt-2 text-success";
        } else {
            matchMessage.innerHTML = '<i class="bi bi-x-circle-fill me-1"></i>Passwords do not match';
            matchMessage.className = "small mt-2 text-danger";
        }
    }

    // Toggle password visibility
    function togglePassword() {
        const eye = document.getElementById("eyeIcon");

        if (password.type === "password") {
            password.type = "text";
            eye.classList.replace("bi-eye-slash", "bi-eye");
        } else {
            password.type = "password";
            eye.classList.replace("bi-eye", "bi-eye-slash");
        }
    }

    function toggleConfirmPassword() {
        const eye = document.getElementById("eyeConfirmIcon");

        if (confirmPassword.type === "password") {
            confirmPassword.type = "text";
            eye.classList.replace("bi-eye-slash", "bi-eye");
        } else {
            confirmPassword.type = "password";
            eye.classList.replace("bi-eye", "bi-eye-slash");
        }
    }

    // Form submission validation
    document.getElementById('resetForm').addEventListener('submit', function(e) {
        const passwordVal = password.value;
        const confirmVal = confirmPassword.value;
        
        // Check if all validations pass
        const isLengthValid = passwordVal.length >= 6;
        const hasUppercase = /[A-Z]/.test(passwordVal);
        const hasNumber = /[0-9]/.test(passwordVal);
        const hasSpecial = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(passwordVal);
        const doMatch = passwordVal === confirmVal;
        
        if (!isLengthValid || !hasUppercase || !hasNumber || !hasSpecial || !doMatch) {
            e.preventDefault();
            
            // Trigger validation display
            validationBox.style.display = "block";
            document.getElementById("strengthMeter").style.display = "block";
            matchMessage.style.display = "block";
            
            // Show alert
            alert('Please ensure your password meets all requirements and matches the confirmation.');
        }
    });
</script>

</body>
</html>