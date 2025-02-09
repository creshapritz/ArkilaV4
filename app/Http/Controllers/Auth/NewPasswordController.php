<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class NewPasswordController extends Controller
{
    public function create(Request $request): View
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
    
        // Use the 'clients' broker for resetting passwords
        $status = Password::broker('clients')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (Client $client) use ($request) {
                // Log new hashed password for debugging
                $newHashedPassword = Hash::make($request->password);
                Log::info('New hashed password: ', ['hash' => $newHashedPassword]);
    
                // Save the new hashed password
                $client->forceFill([
                    'password' => $newHashedPassword,
                ])->save();
    
                event(new PasswordReset($client));
            }
        );
    
        return $status == Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withInput($request->only('email'))
                ->withErrors(['email' => __($status)]);
    }
    
}
