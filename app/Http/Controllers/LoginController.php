<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Client;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class LoginController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('login'); // Replace 'login' with your login view
    }

    // Handle login request
    public function login(Request $request)
    {
        // Validate login input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);



        // Find the client by email
        $client = Client::where('email', $request->email)->first();

        if ($client) {
            Log::info(json_encode([
                'Entered Password' => $request->password,
                'Stored Hashed Password' => $client->password,
                'Password Match' => Hash::check($request->password, $client->password),
            ]));

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $client = Auth::user();

                // Password matches
                $verificationCode = mt_rand(100000, 999999);
                $expiryTime = now()->addMinutes(10);
                Session::put('verification_code', $verificationCode);
                // Set expiration for verification code
                Session::put('verification_code_expiry', now()->addMinutes(10));  // 10 minutes expiry

                Log::info('Verification code stored in session: ' . $verificationCode);

                // Send verification email using PHPMailer
                $mail = new PHPMailer(true);
                try {
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = env('MAIL_USERNAME');
                    $mail->Password = env('MAIL_PASSWORD');

                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = 587;

                    // Recipients
                    $mail->setFrom('arkilacarrental123@gmail.com', 'ARKILA');
                    $mail->addAddress($client->email);

                    // Content
                    $mail->isHTML(true);
                    $mail->Subject = 'Your Verification Code';
                    $mail->Body = "
                        Hello {$client->first_name},<br><br>
                        <p>Your verification code is: <strong>{$verificationCode}</strong></p>
                        <p>Please enter this code on the verification page to complete your login process.</p>
                        <p>Thank you,<br>ARKILA Team</p>
                    ";

                    $mail->send();

                    // Redirect to the verification page
                    return redirect()->route('loginverify')->with('success', 'Verification code sent to your email!')->with('client_name', $client->first_name);
                } catch (Exception $e) {
                    Log::error("PHPMailer Error: {$mail->ErrorInfo}");
                    return redirect()->back()->with('error', 'Failed to send verification email. Please try again.');
                }
            } else {
                return redirect()->back()->with('error', 'Invalid email or password.');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid email or password.');
        }
    }

    // Show the login verification form
    public function showLoginVerificationForm()
    {
        return view('loginverify'); // Replace with your verification view
    }


    public function verifyCode(Request $request)
    {
        // Log the request data
        Log::info('Request data:', $request->all());

        // Validate the code input
        $request->validate([
            'code' => 'required|array|min:6|max:6',  // Expecting an array with exactly 6 digits
            'code.*' => 'required|string|max:1'  // Each code field must be a single digit
        ]);

        // Get the input array, defaulting to an empty array if it's null
        $enteredCodeArray = $request->input('code', []);  // Default to empty array if null

        // Log the processed input
        Log::info('Processed code array:', ['code' => $enteredCodeArray]);

        // Ensure the entered code array is not empty and contains 6 elements
        if (empty($enteredCodeArray) || count($enteredCodeArray) !== 6) {
            return redirect()->back()->with('error', 'Please enter all 6 code digits.');
        }

        // Trim the code array manually using a foreach loop
        $enteredCode = '';
        foreach ($enteredCodeArray as $digit) {
            $enteredCode .= trim($digit);  // Trim each digit and concatenate
        }

        Log::info('Final entered code:', ['enteredCode' => $enteredCode]);

        // Retrieve the session code and expiry time
        $sessionCode = Session::get('verification_code');
        $sessionExpiry = Session::get('verification_code_expiry');

        Log::info('Session verification code:', ['sessionCode' => $sessionCode]);
        Log::info('Session verification expiry:', ['sessionExpiry' => $sessionExpiry]);

        // Check if the session code exists and if it has expired
        if (!$sessionCode || !$sessionExpiry || now()->gt($sessionExpiry)) {
            return redirect()->back()->with('error', 'Verification code expired. Please request a new one.');
        }

        // Compare codes as strings to avoid data type mismatch
        if ((string) $enteredCode === (string) $sessionCode) {
            // Code matches, proceed to the next step
            Session::forget('verification_code');
            Session::forget('verification_code_expiry');
            return redirect()->route('welcome')->with('success', 'Verification successful!');
        }

        return redirect()->back()->with('error', 'Invalid verification code. Please try again.');
    }




    public function resendCode()
    {
        $verificationCode = mt_rand(100000, 999999);
        Session::put('verification_code', $verificationCode);
        // Set expiration for verification code
        Session::put('verification_code_expiry', now()->addMinutes(10));  // 10 minutes expiry

        $client = Auth::user(); // Assuming the client is authenticated


        if ($client) {
            Session::put('client_name', $client->first_name);
            // Send email with the new verification code
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'arkilacarrental123@gmail.com';
                $mail->Password = 'ahchxwiujsbmdsye';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->setFrom('arkilacarrental123@gmail.com', 'ARKILA');
                $mail->addAddress($client->email);

                $mail->isHTML(true);
                $mail->Subject = 'Your New Verification Code';
                $mail->Body = "
                Hello {$client->first_name},<br><br>
                <p>Your new verification code is: <strong>{$verificationCode}</strong></p>
                <p>Please enter this code on the verification page to complete your login process.</p>
                <p>Thank you,<br>ARKILA Team</p>
            ";

                $mail->send();
                return redirect()->back()->with('success', 'A new verification code has been sent to your email!');
            } catch (Exception $e) {
                Log::error("PHPMailer Error: {$mail->ErrorInfo}");
                return redirect()->back()->with('error', 'Failed to resend verification email. Please try again.');
            }
        } else {
            return redirect()->route('login')->with('error', 'Session expired. Please log in again.');
        }
    }


}
