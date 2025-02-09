<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/assets/img/favicon-96x96.png" sizes="96x96" />
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <script src="{{ asset('assets/js/login.js') }}" defer></script>
    <link href="https://unpkg.com/boxicons/css/boxicons.min.css" rel="stylesheet">
</head>

<body>
    <section class="login-section">
        <!-- Left side - Login Form -->
        <div class="login-form">
            <h2>LOG IN</h2>
            <p>Let’s Hit the Road – Log In and Start Your Journey with ARKILA!</p>


            <form action="{{ route('login.post') }}" method="post">
                @csrf
                <label for="email">Email:</label>
                <input type="email" name="email" required>
                <label for="password">Password:</label>
                <div class="input-container">
                    <input type="password" name="password" id="password" required>
                    <i class="bx bx-hide" id="togglePassword"></i> <!-- Password toggle icon -->
                </div>

                <a href="{{ route('password.request') }}" class="forgot-password">Forgot Password?</a>
                <button type="submit" name="login">Login</button>
            </form>



            <p class="login-signup">Don't have an account? <a href="/register">Sign up</a></p>
        </div>

        <!-- Right side - Video Section -->
        <div class="video-background">
            <video autoplay muted loop>
                <source src="{{ asset('assets/img/output.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="video-text">Get there with <span class="highlight">ARKILA!</span></div>
        </div>
    </section>
</body>

</html>