<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\VehicleController;
use App\Models\Car;




Route::get('/landingpage', function () {
    return view('landingpage');
})->name('landingpage');

Route::get('/', function () {
    return redirect()->route('landingpage'); // Redirect to landing page
});


// Step 1: Registration Form
Route::get('/register', function () {
    return view('register');
})->name('register');


Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/register', [ClientController::class, 'store'])->name('register.store');

//END, WAG NA GAGALAWIN 


// verification routes
Route::get('/register2', [VerificationController::class, 'show'])->name('register.verify');

Route::post('/register2', [VerificationController::class, 'verifyCode'])->name('verification.submit');

// Route::post('/verification/send', [VerificationController::class, 'resendVerification'])->name('verification.resend');



Route::get('/register3', function () {
    return view('register3');
})->name('register3');


Route::post('/register3', [ClientController::class, 'completeRegistration'])->name('register.complete.submit');


Route::post('/upload-files', [ClientController::class, 'uploadFiles'])->name('upload.files');



// POST route for resending the verification code
Route::post('/verification/resend', [VerificationController::class, 'resend'])->name('verification.resend');









// WAG NG GAGALAWIN KUNG AYAW MO MASIRA BUHAY MO
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [ClientController::class, 'login'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.post');
// WAG NG GAGALAWIN KUNG AYAW MO MASIRA BUHAY MO


// WAG NG GAGALAWIN KUNG AYAW MO MASIRA BUHAY MO
Route::get('/loginverify', function () {
    return view('loginverify');
})->name('loginverify');
Route::get('/loginverify', [LoginController::class, 'showLoginVerificationForm'])->name('loginverify');
Route::post('/loginverify', [LoginController::class, 'verifyCode'])->name('verify');
Route::post('/login/verify', [LoginController::class, 'verifyCode'])->name('verify');
Route::get('/login/resend-code', [LoginController::class, 'resendCode'])->name('verification.send');
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');
// WAG NG GAGALAWIN KUNG AYAW MO MASIRA BUHAY MO





Route::get('/partner', function () {
    return view('partner');
})->name('partner');


Route::get('/about', function () {
    return view('about');
})->name('about');


Route::get('/rent', function () {
    return view('rent');
})->name('rent');

Route::get('/vehicles', function () {
    return view('vehicles');
})->name('vehicles');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/settings', function () {
    return view('settings');
})->name('settings');

Route::get('/self_drive', function () {
    return view('self_drive');
})->name('self_drive');

Route::get('/with_driver', function () {
    return view('with_driver');
})->name('with_driver');






//?////////// WITH ACCOUNT PAGE ///////////////////
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');
Route::get('/welcome_about', function () {
    return view('welcome_about');
})->name('welcome_about');

Route::get('/welcome_vehicles', function () {
    return view('welcome_vehicles');
})->name('welcome_vehicles');

Route::get('/welcome_services', function () {
    return view('welcome_services');
})->name('welcome_services');

Route::get('/welcome_rent', function () {
    return view('welcome_rent');
})->name('welcome_rent');

Route::get('/welcome_contact', function () {
    return view('welcome_contact');
})->name('welcome_contact');

Route::get('/welcome_partner', function () {
    return view('welcome_partner');
})->name('welcome_partner');

Route::get('/welcome_settings', function () {
    return view('welcome_settings');
})->name('welcome_settings');

Route::get('/welcome_self_drive', function () {
    return view('welcome_self_drive');
})->name('welcome_self_drive');

Route::get('/welcome_with_driver', function () {
    return view('welcome_with_driver');
})->name('welcome_with_driver');

Route::post('/logout', function () {
    // Add your logout logic here
    Auth::logout();
    return redirect()->route('landingpage');
})->name('logout');




/////////////////////////SEARCH CARS////////////////////////
Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
Route::post('/search-cars', [CarController::class, 'searchCars'])->name('cars.search');
Route::get('/car/{id}', [CarController::class, 'show'])->name('car.details');
Route::get('/search', [CarController::class, 'searchCars'])->name('cars.search');

Route::get('/cars/search', [CarController::class, 'searchCars'])->name('cars.search');

/////////////////////////SEND EMAIL CONTACT US ////////////////////////
Route::post('/send-email', [EmailController::class, 'sendEmail'])->name('send.email');


/////////////////////////SETTINGS////////////////////////

// Settings routes
Route::prefix('settings')->group(function () {
    Route::get('/profile-management', [SettingsController::class, 'profileManagement'])->name('settings.profile-management');
    Route::get('/account-activity', [SettingsController::class, 'accountActivity'])->name('settings.account-activity');
    Route::get('/privacy-security', [SettingsController::class, 'privacySecurity'])->name('settings.privacy-security');
    Route::get('/help-faqs', [SettingsController::class, 'helpFaqs'])->name('settings.help-faqs');
});

/////////////////////////ACTIVITY LOGS////////////////////////
Route::get('/settings/account-activity', [SessionController::class, 'index'])->name('settings.account-activity');

//faqs
Route::get('/settings/help-faqs', [FaqController::class, 'index'])->name('settings.help-faqs');


/////////////////////////UPDATE PROFILE PICTURE////////////////////////
Route::post('/profile/picture/update', [SettingsController::class, 'updateProfilePicture'])
    ->name('profile.picture.update')
    ->middleware('auth:client');



Route::post('/update-password', [SettingsController::class, 'updatePassword'])->name('update-password');


///////////////////Forgot Password////////////////////////

// use App\Http\Controllers\Auth\ForgotPasswordController;

// Route::get('forgot-password', [ForgotPasswordController::class, 'showForgotForm'])->name('forgot.password');
// Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLink']);

// Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
// Route::post('reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');



///////////////////CHATBOT////////////////////////
Route::post('/chat', [ChatbotController::class, 'chat'])->name('chat');

use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
// Password Reset Routes
Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');




//////////ADMIN SIDE//////////
// Admin Login Routes
Route::get('/adminlogin', [AdminAuthController::class, 'showLoginForm'])->name('admin.adminlogin');
Route::post('/adminlogin', [AdminAuthController::class, 'authenticate'])->name('admin.login.post');
// Admin Logout Route
Route::post('/adminlogout', [AdminAuthController::class, 'logout'])->name('admin.logout');
// Admin Dashboard Route (Requires Authentication with Admin Guard)
Route::get('/admin/dashboard', [AdminAuthController::class, 'dashboard'])
    ->name('admin.dashboard')
    ->middleware('auth:admin');
////////////////////////////////////////////////




// Admin routes
Route::prefix('admin')->group(function () {
    Route::get('/vehicles', [VehicleController::class, 'list'])->name('vehicles.list');
    Route::get('/vehicles/{id}', [VehicleController::class, 'show'])->name('vehicles.show');
    Route::get('/add-vehicle', [VehicleController::class, 'add'])->name('vehicles.add');
    Route::post('/vehicles', [VehicleController::class, 'store'])->name('vehicles.store');
    Route::delete('/vehicles/{id}', [VehicleController::class, 'destroy'])->name('vehicles.destroy');
    Route::get('/admin/vehicles/{id}/edit', [VehicleController::class, 'edit'])->name('admin.vehicles.edit');
    Route::get('/admin/vehicles/{id}', [VehicleController::class, 'show'])->name('admin.vehicles.show');
    Route::get('admin/dashboard', [VehicleController::class, 'index'])->name('admin.dashboard');
    Route::get('admin/filter', [VehicleController::class, 'filterCars'])->name('admin.filter-cars');
    Route::get('/admin/accounts', [AdminAuthController::class, 'index'])->name('admin.accounts');
    Route::get('/admin/accounts/{id}', [AdminAuthController::class, 'show'])->name('admin.show');
    Route::get('/admin/accounts/{id}/edit', [AdminAuthController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/accounts/{id}', [AdminAuthController::class, 'update'])->name('admin.update');
    Route::get('/admin/clients', [ClientController::class, 'index'])->name('admin.clients');
    Route::get('/admin/clients/{id}', [ClientController::class, 'show'])->name('admin.clients.show');
Route::delete('/admin/clients/{id}/archive', [ClientController::class, 'archive'])->name('admin.clients.archive');








});




Route::get('/admin/gps', function () {
    return view('admin.gps-tracking');
})->name('gps.tracking');
