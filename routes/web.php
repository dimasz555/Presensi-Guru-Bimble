<?php

use App\Http\Controllers\adminDashboardController;
use App\Http\Controllers\attendanceController;
use App\Http\Controllers\ProfileController;
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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/presensi', [attendanceController::class, 'index'])->name('presensi');
    Route::post('/add-presensi', [attendanceController::class, 'store'])->name('add.presensi');
    Route::get('/profil', [profileController::class, 'index'])->name('profil');
    Route::post('/update-password', [profileController::class, 'updatePassword'])->name('update.password');
    Route::post('/update-avatar', [profileController::class, 'updateAvatar'])->name('update.avatar');
});

Route::get('/admin/dashboard', [adminDashboardController::class, 'index'])->name('dashboard');


require __DIR__ . '/auth.php';
