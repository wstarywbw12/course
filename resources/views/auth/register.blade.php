<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>UMLab Register</title>
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

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- NAME -->
                        <div class="mb-3">
                            <div class="input-group has-validation">
                                <span class="input-group-text">
                                    <i class="bi bi-person"></i>
                                </span>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Enter your name" value="{{ old('name') }}" required autofocus>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
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

                            <!-- LIVE VALIDATION - HIDDEN INITIALLY -->
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
                        </div>

                        <!-- CONFIRM PASSWORD -->
                        <div class="mb-4">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-lock"></i>
                                </span>
                                <input type="password" id="confirmPassword" name="password_confirmation"
                                    class="form-control" placeholder="Confirm your password" required>
                                <span class="input-group-text" style="cursor:pointer" onclick="toggleConfirmPassword()">
                                    <i class="bi bi-eye-slash" id="eyeConfirmIcon"></i>
                                </span>
                            </div>

                            <div id="matchMessage" class="small mt-2 validation-hidden"></div>
                        </div>

                        <!-- BUTTON -->
                        <div class="d-grid mb-4">
                            <button type="submit" class="btn btn-auth btn-primary">Sign up</button>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Get elements
        const password = document.getElementById("password");
        const confirmPassword = document.getElementById("confirmPassword");
        
        const validationBox = document.getElementById("passwordValidation");
        const matchMessage = document.getElementById("matchMessage");

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

        // Add event listeners
        password.addEventListener("focus", function() {
            // Show validation when user focuses on password field
            validationBox.classList.add("validation-visible");
            validationBox.style.display = "block";
        });

        password.addEventListener("keyup", function() {
            passwordTouched = true;
            validatePassword();
        });

        password.addEventListener("blur", function() {
            // Optional: Keep visible if there's content
            if (password.value.length > 0) {
                validationBox.style.display = "block";
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

            // Always show validation box when user starts typing
            validationBox.style.display = "block";
            
            // Update each condition with icon and class
            updateValidationItem(lengthCheck, lengthIcon, value.length >= 6);
            updateValidationItem(uppercaseCheck, uppercaseIcon, /[A-Z]/.test(value));
            updateValidationItem(numberCheck, numberIcon, /[0-9]/.test(value));
            updateValidationItem(specialCheck, specialIcon, /[!@#$%^&*(),.?":{}|<>]/.test(value));

            // Check match if confirm has been touched
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

        // Toggle functions
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

        // Initialize validation as hidden
        document.addEventListener("DOMContentLoaded", function() {
            validationBox.style.display = "none";
            matchMessage.style.display = "none";
        });
    </script>

</body>

</html>