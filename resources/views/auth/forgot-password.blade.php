<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h2>Forgot Password</h2>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('password.email') }}" method="POST">
    @csrf
    <label for="email">Email Address</label>
    <input type="email" name="email" id="email" required>
    <button type="submit">Send Password Reset Link</button>
</form>


    </div>

</body>

</html>