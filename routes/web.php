<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaffController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Route::get('/staff', [StaffController::class, 'index'])->name('staff.index');
// Route::get('/staff/{id}', [StaffController::class, 'show'])->name('staff.show');
// Route::get('/staff/edit/{id}', [StaffController::class, 'edit'])->name('staff.edit');


// Route::middleware('auth')->group(function () {
//     Route::get('staff', 'StaffController@index')->name('staff.index');
//     // Route::patch('/staff', [StaffController::class, 'update'])->name('profile.update');
//     // Route::delete('/staff', [StaffController::class, 'destroy'])->name('profile.destroy');
// });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::resource('/staff', StaffController::class);

    // Route::post('/staff', [StaffController::class, 'update'])->name('staff.form');
});

require __DIR__.'/auth.php';
