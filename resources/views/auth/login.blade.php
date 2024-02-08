<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Favicons -->
    <link rel="icon" href="{{ asset('assets/img/logo_bimbel.png') }}" type="image/png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <!-- Template Main CSS File -->
    <!-- <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet"> -->

    <style>
        body {
            background-color: #146C94;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .password-toggle-icon {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            z-index: 2;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mx-auto my-auto" style="max-width: 600px; height:600px;">
                    <div class="card-body text-center">
                        <img src="{{ asset('assets/img/logo_bimbel.png') }}" alt="image" class="img-fluid  mx-auto mb-3" style="width: 250px; height:250px;">
                        <form method="POST" action="{{ route('login.store') }}">
                            @csrf
                            <div class="form mb-4 mx-auto" style="max-width: 400px;">
                                <input type="text" class="form-control rounded @error('username') is-invalid @enderror" name="username" placeholder="Nama Pengguna" required>
                            </div>
                            @error('username')
                            <div class="text-danger mb-2" style="margin-top: -20px; font-size:10px;">{{ $message }}</div>
                            @enderror

                            <div class="form mb-5 mx-auto" style="max-width: 400px; position: relative;">
                                <input type="password" class="form-control rounded @error('password') is-invalid @enderror" name="password" id="password" placeholder="Kata Sandi" required>
                                <span class="password-toggle-icon" onclick="togglePassword()">
                                    <i class="fas fa-eye" id="password-toggle-icon"></i>
                                </span>
                                @error('password')
                                <div class="text-danger" style="margin-top: -10px;">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm w-100 " style="max-width: 400px; height:40px ; font-weight:700;">LOGIN</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

<!-- Vendor JS Files -->
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/typed.js/typed.umd.js"></script>
<script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

<script>
    function togglePassword() {
        var passwordField = document.getElementById('password');
        var passwordIcon = document.getElementById('password-toggle-icon');

        if (passwordField.type === "password") {
            passwordField.type = "text";
            passwordIcon.classList.remove('fa-eye');
            passwordIcon.classList.add('fa-eye-slash');
        } else {
            passwordField.type = "password";
            passwordIcon.classList.remove('fa-eye-slash');
            passwordIcon.classList.add('fa-eye');
        }
    }
</script>



</html>