<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <h1>Reset Password</h1>
    <form action="{{ route('password.update') }}" method="POST">
    @csrf
    <input type="hidden" name="token" value="{{ request()->route('token') }}">
    
    <label for="email">Email Address</label>
    <input type="email" name="email" id="email" required value="{{ old('email') }}">

    <label for="password">New Password</label>
    <input type="password" name="password" id="password" required>

    <label for="password_confirmation">Confirm Password</label>
    <input type="password" name="password_confirmation" id="password_confirmation" required>

    <button type="submit">Reset Password</button>
</form>


</body>
</html>
