<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
    <link rel="stylesheet" href="/style.css">


    <!-- Menambahkan Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Login & Register Page</title>
</head>

<body>
    <div class="container" id="container">
        <!-- Register Form -->
        <div class="form-container sign-up">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h1>Create Account</h1>
                <span>Register</span>
                <input type="text" name="username" placeholder="Name" required>
                <input type="text" name="nik" placeholder="Enter NIK" required>
                <input type="text" name="npwp" placeholder="Enter NPWP" required>
                <button type="submit">Daftar</button>
            </form>
        </div>

        <!-- Login Form -->
        <div class="form-container sign-in">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1>Sign In</h1>
                <span>Login With NIK & NPWP</span>
                <input type="text" name="nik" placeholder="Enter NIK" required>
                <input type="text" name="npwp" placeholder="Enter NPWP" required>
                <button type="submit">Masuk</button>
            </form>
        </div>

        <!-- Toggle Panel -->
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Ayo daftar <br> dan mulai perjalananmu bersama kami</h1>
                    <p>Sign in With ID & Password</p>
                    <button class="hidden" id="login">Masuk</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Halo, Login dulu yuk!</h1>
                    <p>Agar bisa memulai jelajahi dashboard anda</p>
                    <button class="hidden" id="register">Daftar</button>
                </div>
            </div>
        </div>
    </div>

    {{-- @section('scripts') --}}
    <script>
        const container = document.getElementById('container');
        const registerBtn = document.getElementById('register');
        const loginBtn = document.getElementById('login');

        registerBtn.addEventListener('click', () => {
            container.classList.add("active");
        });

        loginBtn.addEventListener('click', () => {
            container.classList.remove("active");
        });
    </script>
    {{-- @endsection --}}
</body>

</html>
