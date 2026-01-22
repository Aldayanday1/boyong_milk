<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Boyong Milk Admin</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo_boyong.png') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Poppins:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/login_page.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <div class="login-container">
        <!-- Left Side - Branding -->
        <div class="login-left">
            <div class="login-left-content">
                <div class="brand-logo">
                    <img src="{{ asset('images/logo_boyong.png') }}" alt="Boyong Milk Logo">
                </div>

                <h1 class="brand-title">Boyong Milk</h1>
                <p class="brand-subtitle">Sistem Administrasi Produk</p>

                <div class="brand-features">
                    <div class="brand-feature">
                        <div class="feature-icon">
                            <i class="fas fa-boxes"></i>
                        </div>
                        <div class="feature-text">
                            <h3>Kelola Produk</h3>
                            <p>CRUD produk lengkap dalam satu dashboard</p>
                        </div>
                    </div>

                    <div class="brand-feature">
                        <div class="feature-icon">
                            <i class="fas fa-chart-pie"></i>
                        </div>
                        <div class="feature-text">
                            <h3>Data & Statistik</h3>
                            <p>Pantau status produk lewat grafik interaktif</p>
                        </div>
                    </div>

                    <div class="brand-feature">
                        <div class="feature-icon">
                            <i class="fas fa-tachometer-alt"></i>
                        </div>
                        <div class="feature-text">
                            <h3>Panel Admin</h3>
                            <p>Antarmuka admin modern dan mudah digunakan</p>
                        </div>
                    </div>
                </div>

                <div class="brand-footer">
                    <p>&copy; 2025 Boyong Milk. KKN REGULER 090 UMY</p>
                </div>
            </div>

            <!-- Decorative Shapes -->
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
        </div>

        <!-- Right Side - Login Form -->
        <div class="login-right">
            <div class="login-right-content">
                <a href="/" class="back-link">
                    <i class="fas fa-arrow-left"></i>
                    <span>Kembali ke Website</span>
                </a>

                <div class="login-header">
                    <div class="login-icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <h2>Selamat Datang Kembali!</h2>
                    <p>Masuk ke akun administrator Anda</p>
                </div>

                <form method="POST" action="{{ route('login') }}" class="login-form">
                    @csrf

                    @if (session('error'))
                        <div class="alert-error">
                            <i class="fas fa-exclamation-circle"></i>
                            <span>{{ session('error') }}</span>
                        </div>
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <script>
                            Swal.fire({
                                title: 'Gagal!',
                                text: "{{ session('error') }}",
                                icon: 'error',
                                timer: 3000,
                                showConfirmButton: true
                            });
                        </script>
                    @endif

                    <!-- Username -->
                    <div class="form-group">
                        <label for="username" class="form-label">
                            <i class="fas fa-user"></i>
                            <span>Username</span>
                        </label>
                        <input id="username" type="text" name="username" value="{{ old('username') }}"
                            class="form-input" placeholder="Masukkan username Anda" required autofocus
                            autocomplete="username">
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password" class="form-label">
                            <i class="fas fa-lock"></i>
                            <span>Password</span>
                        </label>
                        <div class="password-wrapper">
                            <input id="password" type="password" name="password" class="form-input"
                                placeholder="Masukkan password Anda" required autocomplete="current-password">
                            <button type="button" class="password-toggle" onclick="togglePassword()">
                                <i id="eyeIcon" class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Remember Me -->
                    <div class="form-check">
                        <input id="remember_me" type="checkbox" name="remember" class="form-checkbox">
                        <label for="remember_me" class="form-check-label">
                            {{ __('Ingatkan saya selama 30 hari') }}
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn-login">
                        <span>Masuk ke Dashboard</span>
                        <i class="fas fa-arrow-right"></i>
                    </button>

                    <div class="login-footer">
                        <p>Lupa password? <a href="#">Hubungi Administrator</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // Toggle Password Visibility
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }

        // Page Load Animation
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(() => {
                document.querySelector('.login-left-content').classList.add('animate-in');
                document.querySelector('.login-right-content').classList.add('animate-in');
            }, 100);
        });

        // Auto-hide alert after 5 seconds
        const alert = document.querySelector('.alert-error');
        if (alert) {
            setTimeout(() => {
                alert.style.animation = 'slideOut 0.5s ease-out forwards';
            }, 5000);
        }
    </script>
</body>

</html>
