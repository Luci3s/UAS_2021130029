<?php

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

// Route::get('/', function () {
//     return view('landing');
// });

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AdopterController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\AdoptionController;

Route::resource('adoptions', AdoptionController::class);
Route::resource('donations', DonationController::class);
Route::resource('adopters', AdopterController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('animals', AnimalController::class);
Route::get('/', LandingController::class)->name('landing');
