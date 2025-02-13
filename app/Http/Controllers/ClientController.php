<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Models\Client;

class ClientController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'extension_name' => 'nullable|string|max:255',
            'age' => 'required|integer|min:18',
            'dob' => 'required|date',
            'contact_number' => 'required|string|max:15|different:emergency_contact',
            'address' => 'required|string|max:255',
            'emergency_contact' => 'required|string|max:15',
            'emergency_contact_relationship' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:clients',
            'email' => 'required|email|max:255|unique:clients',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Temporarily store data in the session
        Session::put('registration_data', $request->except('password_confirmation'));

        // Generate a verification code
        $verificationCode = rand(100000, 999999); // Replace with a specific code
        Session::put('verification_code', $verificationCode);
        Session::put('verification_code_time', now());

        // Log the incoming password and hashed password
        Log::info('Incoming password: ' . $request->password);
        Log::info('Hashed password: ' . Hash::make($request->password));



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
            $mail->addAddress($request->email, $request->first_name);

            $mail->isHTML(true);
            $mail->Subject = 'Verify Your Email Address';
            $mail->Body = "Hello {$request->first_name},<br><br>"
                . "Thank you for registering. Please use the following verification code to verify your email:<br>"
                . "<h2>{$verificationCode}</h2><br>"
                . "If you did not request this, please ignore this email.";

            $mail->send();

            Log::info('Verification email sent to: ' . $request->email);
        } catch (Exception $e) {
            Log::error('PHPMailer Error: ' . $mail->ErrorInfo);
            return redirect()->back()->with('error', 'Could not send verification email. Please try again later.');
        }

        return redirect()->route('register.verify')->with('success', 'Registration step 1 completed! Please verify your email.');
    }


    public function verifyCode(Request $request)
    {
        $request->validate([
            'verification_code' => 'required|integer',
        ]);

        $sessionCode = Session::get('verification_code');
        $codeTime = Session::get('verification_code_time');

        if (!$sessionCode || !$codeTime || now()->diffInMinutes($codeTime) > 15) {
            return redirect()->route('register')->with('error', 'Verification code expired. Please register again.');
        }

        if ($request->verification_code != $sessionCode) {
            return redirect()->route('verification.form')->with('error', 'Invalid verification code.');
        }

        return redirect()->route('register.complete.submit')->with('success', 'Email verified successfully!');
    }






    public function completeRegistration(Request $request)
    {
        // Validation for Register3 form
        $request->validate([
            'driver_license' => 'nullable|string',
            'front_license' => 'nullable|file|mimes:jpeg,jpg,png,pdf|max:5120',
            'back_license' => 'nullable|file|mimes:jpeg,jpg,png,pdf|max:5120',
            'second_id' => 'nullable|string',
            'front_second_id' => 'nullable|file|mimes:jpeg,jpg,png,pdf|max:5120',
            'back_second_id' => 'nullable|file|mimes:jpeg,jpg,png,pdf|max:5120',
        ]);

        // Retrieve the registration data from session
        $registrationData = Session::get('registration_data');
        if (!$registrationData) {
            return redirect()->route('register')->with('error', 'Session expired. Please start the registration process again.');
        }

        // Handle the uploaded files (if any)
        $frontLicensePath = $request->hasFile('front_license') ? $request->file('front_license')->store('public/uploads/licenses') : null;
        $backLicensePath = $request->hasFile('back_license') ? $request->file('back_license')->store('public/uploads/licenses') : null;
        $frontSecondIdPath = $request->hasFile('front_second_id') ? $request->file('front_second_id')->store('public/uploads/ids') : null;
        $backSecondIdPath = $request->hasFile('back_second_id') ? $request->file('back_second_id')->store('public/uploads/ids') : null;

        try {
            // Save the client data to the database
            $client = Client::create(array_merge($registrationData, [
                'password' => $registrationData['password'],
                'driver_license' => $request->driver_license,
                'front_license' => $frontLicensePath,
                'back_license' => $backLicensePath,
                'second_id' => $request->second_id,
                'front_second_id' => $frontSecondIdPath,
                'back_second_id' => $backSecondIdPath,
            ]));

            // Log the file paths for debugging (optional)
            Log::info('Front License Path: ' . $frontLicensePath);
            Log::info('Back License Path: ' . $backLicensePath);
            Log::info('Front Second ID Path: ' . $frontSecondIdPath);
            Log::info('Back Second ID Path: ' . $backSecondIdPath);

            // Clear the session data
            Session::forget('registration_data');
            Session::forget('verification_code');

            // Redirect to the login page with success message
            return redirect()->route('login')->with('success', 'Registration complete! Please log in.');
        } catch (Exception $e) {
            Log::error('Error occurred during registration: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }




    public function index()
    {
        $clients = Client::all(); // Fetch all clients from the database
        return view('admin.clients', compact('clients'));
    }

    public function show($id)
    {
        $client = Client::findOrFail($id);
        return view('admin.client-details', compact('client'));
    }
    public function archive($id)
    {
        $client = Client::findOrFail($id);
        $client->delete(); // This removes the client (use SoftDeletes if needed)

        return redirect()->route('admin.clients')->with('success', 'Client archived successfully.');
    }






}
