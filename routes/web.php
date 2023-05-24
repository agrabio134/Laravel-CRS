<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\RentalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormSubmitted;




Route::get('/', [CarController::class, 'landing'])->name('landing');
Route::get('/about', [CarController::class, 'about'])->name('about');


Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');
Route::post('/cars', [CarController::class, 'store'])->name('cars.store');
Route::get('/cars/{car}/edit', [CarController::class, 'edit'])->name('cars.edit');
Route::put('/cars/{car}', [CarController::class, 'update'])->name('cars.update');
Route::delete('/cars/{car}', [CarController::class, 'destroy'])->name('cars.destroy');
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/cars', [CarController::class, 'cars'])->name('cars');


/// Login Routes
// Login Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Registration Routes
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');



Route::get('/home', [CarController::class, 'cars'])->name('cars');

// Password Reset Routes
Route::get('/password/reset', [AuthController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [AuthController::class, 'reset'])->name('password.update');

// Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');


// routes/web.php

Route::post('/rentals', [RentalController::class, 'store'])->name('rentals.store');



Route::get('/tracking', [CarController::class, 'tracking'])->name('tracking')->middleware('auth');



Route::post('/contact', function (Request $request) {
    $data = $request->validate([
        'Fname' => 'required',
        'Lname' => 'required',
        'email' => 'required|email',
        'number' => 'required',
        'message' => 'required',
    ]);

    // Send the email
    Mail::to('agrabioharvey@gmail.com')->send(new ContactFormSubmitted($data));

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Your message has been sent successfully!');
})->name('contact');

Route::get('/contact', function () {
    return view('emails.contact-form-submitted');
})->name('contact');
