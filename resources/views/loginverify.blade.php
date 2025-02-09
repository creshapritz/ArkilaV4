<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification</title>
    <link href="https://unpkg.com/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
    <script src="{{ asset('assets/js/register.js') }}" defer></script>
<<<<<<< HEAD
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

=======
>>>>>>> 913c2da (uploadingv1)
</head>

<body>
    <div class="registration-container">

        <div class="image-container">
            <div class="logo-container">
<<<<<<< HEAD
                <img src="{{ asset('assets/img/whitelogoarkila.png') }}" alt="Logo" class="logo">
=======
                <img src="{{ asset('assets/img/arkila_logo.png') }}" alt="Logo" class="logo">
>>>>>>> 913c2da (uploadingv1)
                <p class="logo-text">Access a ride <br> that's ready when you are</p>
            </div>
            <img src="{{ asset('assets/img/background1.png') }}">
            <!-- <img src="{{ asset('assets/img/car.png') }}" class="car-image"> -->
        </div>

        <!-- Right Side (Form) -->
        <div class="form-container">


            <form action="{{ route('verify') }}" method="POST">
                @csrf
                <div class="form-header">
<<<<<<< HEAD
                    <h1>Hello, {{ session('client_name') }}!</h1>
=======
                    <h1>Hello, User!</h1>
>>>>>>> 913c2da (uploadingv1)
                    <p>Enter your Code!</p>
                </div>


                <!-- Verification Section -->
                <div class="verification-section">
                    <h2>Verify Authentication</h2>
                    <p>Enter the authentication code that we sent at your email.</p>

                    <!-- Code Input Boxes -->
                    <div class="code-input-container">

                        <input type="text" class="code-input" name="code[]" maxlength="1" required />
                        <input type="text" class="code-input" name="code[]" maxlength="1" required />
                        <input type="text" class="code-input" name="code[]" maxlength="1" required />
                        <input type="text" class="code-input" name="code[]" maxlength="1" required />
                        <input type="text" class="code-input" name="code[]" maxlength="1" required />
                        <input type="text" class="code-input" name="code[]" maxlength="1" required />

                    </div>

                    <!-- Resend Code Button -->
                    <div class="resend-code-container">
<<<<<<< HEAD
                        <a href="{{ route('verification.send') }}" class="resend-code" id="resend-btn">Resend Code</a>
=======
                        <a href="{{ route('verification.send') }}" class="resend-code">Resend Code</a>
>>>>>>> 913c2da (uploadingv1)

                    </div>

                    <!-- Navigation Buttons -->
                    <div class="button-container">
<<<<<<< HEAD
                        <button type="submit" class="next-button">Next</button>
                        <button type="button" class="back-button" onclick="goToBack()">Back</button>


=======
                    <button type="submit" class="next-button">Next</button>
                    <button type="button" class="back-button" onclick="goToBack()">Back</button>
                        
                       
>>>>>>> 913c2da (uploadingv1)
                    </div>
                </div>
            </form>

<<<<<<< HEAD


=======
            
            @if (session('error'))
                <p style="color: red;">{{ session('error') }}</p>
            @endif
>>>>>>> 913c2da (uploadingv1)

        </div>

    </div>

<<<<<<< HEAD



    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const codeInputs = document.querySelectorAll('.code-input');

            codeInputs.forEach((input, index) => {
                // Focus on the first input on page load
                if (index === 0) {
                    input.focus();
                }

                // Handle input event
                input.addEventListener('input', (e) => {
                    const value = e.target.value;
                    if (value.length === 1) {
                        // Move focus to the next input if available
                        if (index < codeInputs.length - 1) {
                            codeInputs[index + 1].focus();
                        }
                    } else {
                        // Remove extra input if more than one character is entered
                        e.target.value = value.charAt(0);
                    }
                });

                // Handle backspace event
                input.addEventListener('keydown', (e) => {
                    if (e.key === 'Backspace' && e.target.value === '') {
                        // Move focus to the previous input if available
                        if (index > 0) {
                            codeInputs[index - 1].focus();
                        }
                    }
                });

                // Prevent entering non-numeric characters
                input.addEventListener('keypress', (e) => {
                    if (!/[0-9]/.test(e.key)) {
                        e.preventDefault();
                    }
                });
            });

            const resendButton = document.getElementById('resend-btn');

            resendButton.addEventListener('click', function (event) {
                event.preventDefault(); 
               
                Swal.fire({
                    title: 'Verification Sent!',
                    text: 'A new verification code has been sent to your email.',
                    icon: 'success',
                    confirmButtonText: 'Okay',
                    confirmButtonColor: '#F07324',
                    background: '#F9F8F2',
                    iconColor: '#F07324',
                    timer: 5000,
                }).then(() => {
                    
                    window.location.href = resendButton.href; 
                });
            });



        });



    </script>

=======
>>>>>>> 913c2da (uploadingv1)
</body>

</html>