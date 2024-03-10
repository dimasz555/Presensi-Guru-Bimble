<?php

use App\Http\Controllers\adminDashboardController;
use App\Http\Controllers\adminKelolaGuruController;
use App\Http\Controllers\adminKelolaPresensiController;
use App\Http\Controllers\adminProfileController;
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


Route::middleware('auth','role:guru')->group(function () {
    Route::get('/presensi', [attendanceController::class, 'index'])->name('presensi');
    Route::post('/add-presensi', [attendanceController::class, 'store'])->name('add.presensi');
    Route::get('/profil', [profileController::class, 'index'])->name('profil');
    Route::post('/update-password', [profileController::class, 'updatePassword'])->name('update.password');
    Route::post('/update-avatar', [profileController::class, 'updateAvatar'])->name('update.avatar');
});


Route::middleware('auth','role:admin')->group(function () {
    Route::get('/admin/dashboard', [adminDashboardController::class, 'index'])->name('dashboard');

    Route::get('/admin/profile', [adminProfileController::class, 'index'])->name('profile.admin');
    Route::post('/admin/update-password', [adminProfileController::class, 'updatePassword'])->name('update.password.admin');

    Route::get('/admin/kelolaGuru', [adminKelolaGuruController::class, 'index'])->name('kelolaGuru.admin');
    Route::post('/admin/kelolaGuru/add-guru', [adminKelolaGuruController::class, 'store'])->name('kelolaGuru.add');
    Route::put('/admin/kelolaGuru/edit-guru', [adminKelolaGuruController::class, 'update'])->name('kelolaGuru.update');
    Route::delete('/admin/kelolaGuru/delete-guru', [adminKelolaGuruController::class, 'destroy'])->name('kelolaGuru.delete');

    Route::get('/admin/daftarGuru', [adminKelolaPresensiController::class, 'index'])->name('daftarGuru.admin');

});



require __DIR__ . '/auth.php';
