<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KpiCorporateController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layouts.main');
});

Route::middleware(['auth'])->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/users', UserController::class);
    Route::put('/users/{id}/status', [UserController::class, 'updateStatus'])->name('users.updateStatus');
    Route::get('/users/{id}/profile', [UserController::class, 'profile'])->name('users.profile');
    Route::put('/users/{id}/update', [UserController::class, 'updateprofile'])->name('users.updateprofile');


    Route::resource('/corporates', KpiCorporateController::class);
});


// user route

// Show form to create a new user
// Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

// // Store a new user
// Route::post('/users', [UserController::class, 'store'])->name('users.store');

// // Show form to edit a user
// Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');

// // Update a user
// Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

// // Delete a user
// Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

// // Show details of a user
// Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

// // Show list of all users
// Route::get('/users', [UserController::class, 'index'])->name('users.index');

// end route


Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'authenticating'])->name('login')->middleware('guest');
Route::get('register', [AuthController::class, 'register'])->name('registeruser');
Route::post('register', [AuthController::class, 'registeruser'])->name('registeruser');
Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
