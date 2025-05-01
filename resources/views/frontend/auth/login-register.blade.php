<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #007bff;
            --secondary-color: #6c757d;
        }

        body {
            background-color: #f4f6f9;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: 'Arial', sans-serif;
        }

        .auth-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            overflow: hidden;
            width: 100%;
            max-width: 1000px;
            display: flex;
            min-height: 600px;
        }

        .auth-image {
            background: linear-gradient(rgba(0,123,255,0.8), rgba(0,123,255,0.8)), 
                        url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23007bff" fill-opacity="1" d="M0,160L48,176C96,192,192,224,288,229.3C384,235,480,213,576,186.7C672,160,768,128,864,133.3C960,139,1056,181,1152,197.3C1248,213,1344,203,1392,197.3L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320L192,320L96,320L0,320Z"></path></svg>');
            background-size: cover;
            background-position: center;
            width: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            padding: 20px;
        }

        .auth-forms {
            width: 50%;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-switch-container {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .form-switch-btn {
            background-color: transparent;
            border: none;
            color: var(--secondary-color);
            margin: 0 10px;
            padding-bottom: 5px;
            border-bottom: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .form-switch-btn.active {
            color: var(--primary-color);
            border-bottom-color: var(--primary-color);
            font-weight: bold;
        }

        @media (max-width: 768px) {
            .auth-container {
                flex-direction: column;
            }
            .auth-image, .auth-forms {
                width: 100%;
            }
            .auth-image {
                height: 200px;
            }
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <div class="auth-image">
            <div>
                <h2>Welcome to Our Platform</h2>
                <p>Secure login and registration made simple</p>
            </div>
        </div>
        <div class="auth-forms">
            @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif
            <div class="form-switch-container">
                <button class="form-switch-btn active" id="loginTab">Login</button>
                <button class="form-switch-btn" id="registerTab">Register</button>
            </div>

            <!-- Login Form -->
            <form action="{{ route('user.login') }}" method="POST" id="loginForm" class="auth-form">
                @csrf
                <div class="mb-3">
                    <label for="loginEmail" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="loginEmail" required>
                </div>
                <div class="mb-3">
                    <label for="loginPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="loginPassword" required>
                </div>
                {{-- <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Remember me</label>
                </div> --}}
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
                <div class="text-center mt-3">
                    <a href="#" class="text-muted">Forgot Password?</a>
                </div>
            </form>

            <!-- Registration Form (Hidden by default) -->
            <form action="{{ route('user.register') }}" method="post" id="registerForm" class="auth-form" style="display:none;">
                @csrf
                <div class="mb-3">
                    <label for="registerName" class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-control" id="registerName" required>
                </div>
                <div class="mb-3">
                    <label for="registerEmail" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="registerEmail" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" id="phone" required>
                </div>
                <div class="mb-3">
                    <label for="registerPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="registerPassword" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" name="is_terms_conditon_active" id="termsAgree" required>
                    <label class="form-check-label" for="termsAgree">I agree to the Terms and Conditions</label>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Create Account</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Tab switching logic
        const loginTab = document.getElementById('loginTab');
        const registerTab = document.getElementById('registerTab');
        const loginForm = document.getElementById('loginForm');
        const registerForm = document.getElementById('registerForm');

        loginTab.addEventListener('click', () => {
            loginTab.classList.add('active');
            registerTab.classList.remove('active');
            loginForm.style.display = 'block';
            registerForm.style.display = 'none';
        });

        registerTab.addEventListener('click', () => {
            registerTab.classList.add('active');
            loginTab.classList.remove('active');
            registerForm.style.display = 'block';
            loginForm.style.display = 'none';
        });

        // Basic form validation
        // const registerFormElement = document.querySelector('#registerForm');
        // registerFormElement.addEventListener('submit', (e) => {
        //     const password = document.getElementById('registerPassword').value;
        //     // const confirmPassword = document.getElementById('confirmPassword').value;

        //     // if (password !== confirmPassword) {
        //     //     e.preventDefault();
        //     //     alert('Passwords do not match!');
        //     // }
        // });
    </script>
</body>
</html>