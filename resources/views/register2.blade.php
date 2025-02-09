<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/assets/img/favicon-96x96.png" sizes="96x96" />
    <title>REGISTER</title>
    <link href="https://unpkg.com/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
    <script src="{{ asset('assets/js/register.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<style>
    /* Change the background color and text color of the popup */
    .custom-swal-popup {
        background-color: #F9F8F2;
        /* Light blue background */
        color: #2e2e2e;
        /* Black text */
    }

    /* Change the title color */
    .custom-swal-title {
        color: #F07324;
        /* Orange color */
        font-weight: bold;
    }

    /* Change the button background and text color */
    .custom-swal-button {
        background-color: #F07324;
        /* Lime green background */
        color: white;
        /* White text */
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
    }

    /* Add hover effect for the button */
    .custom-swal-button:hover {
        background-color: #F07324;
        /* Dark green */
    }
</style>

<body>


    <div class="registration-container">

        <div class="image-container">
            <div class="logo-container">
                <img src="{{ asset('assets/img/whitelogo.png') }}" alt="Logo" class="logo">
                <p class="logo-text">Access a ride <br> that's ready when you are</p>
            </div>
            <img src="{{ asset('assets/img/background1.png') }}">
            <!-- <img src="{{ asset('assets/img/carlang.png') }}" class="car-image"> -->
        </div>

        <!-- Right Side (Form) -->
        <div class="form-container">


            <form action="{{ route('verification.submit') }}" method="POST">
                @csrf
                <div class="form-header">
                    <h1>Welcome!</h1>
                    <p>Adventure Awaits! Sign up with ARKILA to get moving.</p>
                </div>

                <!-- timeline and registration heading container -->
                <div class="timeline-registration-container">
                    <div class="timeline">
                        <div class="timeline-step" id="step-1">1</div>
                        <div class="timeline-line" id="line-1"></div>
                        <div class="timeline-step" id="step-2">2</div>
                        <div class="timeline-line" id="line-2"></div>
                        <div class="timeline-step" id="step-3">3</div>
                    </div>
                </div>

                <!-- Verification Section -->
                <div class="verification-section">
                    <h2>Verification Code</h2>
                    <p>II. We have sent you a verification code on your Gmail Account. <br> Please enter the
                        verification code below.</p>

                    <!-- Code Input Boxes -->
                    <div class="code-input-container">

                        <input type="text" class="code-input" name="code[]" maxlength="1" required />
                        <input type="text" class="code-input" name="code[]" maxlength="1" required />
                        <input type="text" class="code-input" name="code[]" maxlength="1" required />
                        <input type="text" class="code-input" name="code[]" maxlength="1" required />
                        <input type="text" class="code-input" name="code[]" maxlength="1" required />
                        <input type="text" class="code-input" name="code[]" maxlength="1" required />


                    </div>


                    <!-- Outside the form -->
                    <div class="resend-code-container">
                        <button type="button" class="resend-code" id="resendCodeBtn">Resend Code</button>
                    </div>

                    <!-- Navigation Buttons -->
                    <div class="button-container">
                        <button type="submit" class="next-button">Next</button>
                        <button type="button" class="back-button" onclick="goToBack()">Back</button>
                    </div>
                </div>
            </form>
            <!-- <form action="{{ route('verification.resend') }}" method="POST" id="resendForm">
                @csrf
                <button type="submit" class="resend-code" id="resendCodeBtn">Resend Code</button>
            </form> -->




        </div>

    </div>
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
        });


        document.getElementById('resendCodeBtn').addEventListener('click', function (event) {
            event.preventDefault(); // Prevent default form submission

            fetch("{{ route('verification.resend') }}", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                body: JSON.stringify({})
            })
                .then(response => {
                    // Attempt to parse the response as JSON
                    return response.json().catch(() => {
                        // If parsing fails, treat it as a non-JSON response
                        return { success: true, message: 'Verification code sent!' }; // Default success message
                    });
                })
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            title: 'Email Sent!',
                            text: data.message || 'The verification email has been resent successfully.',
                            icon: 'success',
                            confirmButtonText: 'OK',
                             iconColor: '#F07324',
                            customClass: {
                                popup: 'custom-swal-popup',
                                title: 'custom-swal-title',
                                confirmButton: 'custom-swal-button'
                            }
                        });
                    } else {
                        Swal.fire({
                            title: 'Failed!',
                            text: data.message || 'Failed to resend the verification email. Please try again later.',
                            icon: 'error',
                            confirmButtonText: 'OK',
                            customClass: {
                                popup: 'custom-swal-popup',
                                title: 'custom-swal-title',
                                confirmButton: 'custom-swal-button'
                            }
                        });
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    Swal.fire({
                        title: 'Error!',
                        text: 'An error occurred while resending the email.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                });
        });


    </script>

</body>

</html>