<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class VerificationController extends Controller
{
    /**
     * Display the verification form.
     */
    public function show()
    {

        return view('register2');
    }


    public function verifyCode(Request $request)
    {
        $request->validate([
            'code' => 'required|array|size:6',
        ]);
    
        // Retrieve the stored verification code and timestamp
        $sessionCode = Session::get('verification_code');
        $codeTime = Session::get('verification_code_time');
    
        // Check if the code exists and if the time difference is within the allowed period (15 minutes)
        if (!$sessionCode || !$codeTime || now()->diffInMinutes($codeTime) > 15) {
            return redirect()->route('register.verify')->with('error', 'Verification code expired. Please request a new code.');
        }
    
        // Check if the entered verification code matches the session code
        if ($request->verification_code != $sessionCode) {
            return redirect()->route('verification.form')->with('error', 'Invalid verification code.');
        }
    
        // Code is valid, proceed to the next step
        return redirect()->route('register.complete.submit')->with('success', 'Email verified successfully!');
    }

    public function resend(Request $request)
{
    Log::info('Resend route hit!');

    // Generate a new verification code
    $verificationCode = rand(100000, 999999);
    Session::put('verification_code', $verificationCode);
    Session::put('verification_code_time', now());

    $client = Session::get('registration_data'); // Retrieve temporary registration data

    if (!$client) {
        Log::error('No client data found in session.');
        return redirect()->route('register')->with('error', 'Session expired. Please restart the registration process.');
    }

    // Send email
    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'arkilacarrental123@gmail.com';
        $mail->Password = 'ahchxwiujsbmdsye';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('arkilacarrental123@gmail.com', 'ARKILA');
        $mail->addAddress($client['email'], $client['first_name']);

        $mail->isHTML(true);
        $mail->Subject = 'Your New Verification Code';
        $mail->Body = "
            Hello {$client['first_name']},<br><br>
            <p>Your new verification code is: <strong>{$verificationCode}</strong></p>
            <p>Please enter this code on the verification page to complete your registration.</p>
            <p>Thank you,<br>ARKILA Team</p>
        ";

        $mail->send();
        Log::info('Verification email sent to ' . $client['email']);
        
        // Redirect back to register-2 with a success message
        return redirect()->back()->with('success', 'A new verification code has been sent to your email.');
    } catch (Exception $e) {
        Log::error("PHPMailer Error: {$mail->ErrorInfo}");
        return redirect()->back()->with('error', 'Failed to resend verification email. Please try again.');
    }
}

    


    




}
