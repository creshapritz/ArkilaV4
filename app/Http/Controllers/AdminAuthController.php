<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.adminlogin'); // Path to admin login Blade file
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log in using the admin guard
        if (!Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            return back()->withErrors(['error' => 'Invalid credentials.']);
        }

        // Redirect to admin dashboard after successful login
        return redirect()->route('admin.dashboard');
    }




    public function logout()
    {
        Auth::guard('admin')->logout(); // Log out from admin guard
        return redirect()->route('admin.adminlogin'); // Redirect back to admin login page
    }



    public function dashboard()
    {
        if (Auth::guard('admin')->check()) { // Check if logged in as admin
            return view('admin.admindashboard', ['admin' => Auth::guard('admin')->user()]);
        }

        return redirect()->route('admin.adminlogin'); // Redirect to admin login if not authenticated
    }

    public function index()
    {
        $admins = Admin::all(); // Fetch all admins from the database
        return view('admin.adminaccounts', compact('admins'));
    }
    public function show($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.show', compact('admin')); // Ensure you create admin/show.blade.php
    }




    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'role' => 'required|string',
            'status' => 'required|boolean',
        ]);

        Admin::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'role' => $request->role,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Admin account created successfully.');
    }
    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
        $admin->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'role' => $request->role,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Admin details updated successfully.');
    }
    public function edit($id)
{
    $admin = Admin::findOrFail($id);
    return view('admin.edit', compact('admin')); // Ensure this file exists
}







}
