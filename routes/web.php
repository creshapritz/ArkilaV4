<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\LoginController;
<<<<<<< HEAD
use App\Http\Controllers\CarController;

Route::get('/landingpage', function () {
    return view('landingpage');
})->name('landingpage');

Route::get('/', function () {
    return redirect()->route('landingpage'); // Redirect to landing page
});

=======
>>>>>>> 913c2da (uploadingv1)

// Step 1: Registration Form
Route::get('/register', function () {
    return view('register');
})->name('register');

<<<<<<< HEAD

Route::get('/login', function () {
    return view('login');
})->name('login');

=======
>>>>>>> 913c2da (uploadingv1)
Route::post('/register', [ClientController::class, 'store'])->name('register.store');

//END, WAG NA GAGALAWIN 


// verification routes
<<<<<<< HEAD
Route::get('/register2', [VerificationController::class, 'show'])->name('register.verify');

Route::post('/register2', [VerificationController::class, 'verifyCode'])->name('verification.submit');

// Route::post('/verification/send', [VerificationController::class, 'resendVerification'])->name('verification.resend');



=======
Route::get('/register2', [VerificationController::class, 'show'])->name('verification.form');

Route::post('/register2', [VerificationController::class, 'verifyCode'])->name('verification.submit');

Route::post('/verification/send', [VerificationController::class, 'resendVerification'])->name('verification.resend');


// Step 3: Final Step
>>>>>>> 913c2da (uploadingv1)
Route::get('/register3', function () {
    return view('register3');
})->name('register3');


Route::post('/register3', [ClientController::class, 'completeRegistration'])->name('register.complete.submit');


Route::post('/upload-files', [ClientController::class, 'uploadFiles'])->name('upload.files');



<<<<<<< HEAD
// POST route for resending the verification code
Route::post('/verification/resend', [VerificationController::class, 'resend'])->name('verification.resend');
=======
// Route::post('register/complete', [ClientController::class, 'completeRegistration'])->name('completeRegistration');
// Route::get('/verification/resend', [VerificationController::class, 'resendCode'])->name('verification.resend');
// Route::post('/register/verify', [ClientController::class, 'verifyCode']);



Route::post('/register/resend', [VerificationController::class, 'resend'])->name('register.resend');




>>>>>>> 913c2da (uploadingv1)









// WAG NG GAGALAWIN KUNG AYAW MO MASIRA BUHAY MO
Route::get('/login', function () {
    return view('login');
})->name('login');
<<<<<<< HEAD

=======
>>>>>>> 913c2da (uploadingv1)
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





<<<<<<< HEAD
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
    return view('settings
    ');
})->name('settings');

Route::get('/logout', function () {
    // Add your logout logic here
    Auth::logout();
    return redirect()->route('landingpage');
})->name('logout');



// WITH ACCOUNT PAGE 

Route::get('/welcome_rent', function () {
    return view('welcome_rent
    ');
})->name('welcome_rent');

//SEARCH CARS

Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
Route::post('/search-cars', [CarController::class, 'searchCars'])->name('cars.search');
Route::get('/car/{id}', [CarController::class, 'show'])->name('car.details');
Route::get('/search', [CarController::class, 'searchCars'])->name('cars.search');
=======
>>>>>>> 913c2da (uploadingv1)


