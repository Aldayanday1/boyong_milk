<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo_boyong.png') }}">

    <link rel="stylesheet" href="{{ asset('css/login_page.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <div class="background-overlay"></div>
    <form method="POST" action="{{ route('login') }}" class="login-form">
        @csrf

        @if (session('error'))
            <!-- Memuat SweetAlert sebelum memanggil Swal.fire() -->
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

        <div class="login-header">
            <i class="fa-solid fa-user-circle fa-3x" style="color: #0077ff;"></i>
            <h2>Selamat Datang!</h2>
            <p>Silahkan masuk untuk mengelola sistem administrasi.</p>
        </div>


        <!-- Username -->
        <div>
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" class="block w-full mt-1" type="text" name="username" :value="old('username')"
                required autofocus autocomplete="username" />
        </div>

        <!-- Password dengan Toggle -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <div class="relative">
                <x-text-input id="password" class="block w-full pr-10 mt-1" type="password" name="password" required
                    autocomplete="current-password" />
                <!-- Eye Icon -->
                <span class="absolute inset-y-0 flex items-center cursor-pointer right-3" onclick="togglePassword()">
                    <i id="eyeIcon" class="text-gray-500 fa fa-eye"></i>
                </span>
            </div>
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="text-indigo-600 border-gray-300 rounded shadow-sm dark:bg-gray-900 dark:border-gray-700 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                    name="remember">
                <span class="text-sm text-gray-600 ms-2 dark:text-gray-400"
                    style="font-size: 13px; position: relative; top: -1.33px;">{{ __('Ingatkan saya') }}</span>
            </label>
        </div>

        <!-- Tombol Login dan Back -->
        <div class="button-container">
            <a href="/" class="back-button">Back</a>
            <x-primary-button class="login-button">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Font Awesome untuk ikon mata -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>

    <!-- JavaScript Toggle Password -->
    <script>
        function togglePassword() {
            var passwordField = document.getElementById("password");
            var eyeIcon = document.getElementById("eyeIcon");

            if (passwordField.type === "password") {
                passwordField.type = "text";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            }
        }
    </script>

    <!-- JavaScript untuk Animasi Fade-Up -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const formElement = document.querySelector(".login-form");

            if (formElement) {
                setTimeout(() => {
                    formElement.classList.add("visible");
                }, 300); // Delay sedikit setelah halaman dimuat
            }
        });
    </script>
</body>

</html>
