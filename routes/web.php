<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\ReservationController as PublicReservationController;
use App\Http\Controllers\Public\CarRentalController as PublicCarRentalController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CemeteryController;
use App\Http\Controllers\Admin\ReservationController as AdminReservationController;
use App\Http\Controllers\Admin\CarRentalController as AdminCarRentalController;
use App\Http\Controllers\Public\CemeteryController as PublicCemeteryController;

// Otentikasi Laravel Breeze/UI/Jetstream
Auth::routes();

// ===================================
// PUBLIC ROUTES (Pengguna Umum)
// ===================================

Route::get('/', [HomeController::class, 'index'])->name('publics.home');

// Halaman Formulir Pemakaman Baru
Route::get('/pemakaman-baru', [PublicReservationController::class, 'index'])->name('publics.reservation.index');
Route::post('/pemakaman-baru/store', [PublicReservationController::class, 'store'])->name('public.reservation.store');

// Halaman Formulir Sewa Mobil Jenazah
Route::get('/mobil-jenazah', [PublicCarRentalController::class, 'index'])->name('publics.carrental.index');
Route::post('/mobil-jenazah/store', [PublicCarRentalController::class, 'store'])->name('public.carrental.store');

Route::get('/informasi-tpu', [PublicCemeteryController::class, 'index'])->name('publics.cemetery.index');

// Route AJAX untuk mengambil data kelurahan
Route::get('/cemetery/get-subdistricts/{districtId}', [PublicReservationController::class, 'getSubdistricts'])
    ->name('cemetery.getSubdistricts');


// ===================================
// ADMIN ROUTES (Membutuhkan otentikasi)
// ===================================
Route::middleware(['auth'])->group(function () {
    
    // Dashboard Admin
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');

    // CRUD TPU (Cemetery)
    Route::prefix('admin/tpu')->name('admin.cemetery.')->group(function () {
        Route::get('/', [CemeteryController::class, 'index'])->name('index');
        Route::get('/create', [CemeteryController::class, 'create'])->name('create');
        Route::get('/data', [CemeteryController::class, 'cemeteriesData'])->name('data');
        Route::post('/store', [CemeteryController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [CemeteryController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [CemeteryController::class, 'update'])->name('update');
        Route::get('/{id}/detail', [CemeteryController::class, 'detail'])->name('detail');
    });

    // Administrasi Pemakaman Baru (Reservation)
    Route::prefix('admin/pemakaman-baru')->name('admin.reservation.')->group(function () {
        Route::get('/', [AdminReservationController::class, 'index'])->name('index');
        Route::get('/data', [AdminReservationController::class, 'data'])->name('data');
        Route::get('/create', [AdminReservationController::class, 'create'])->name('create');
        Route::post('/store', [AdminReservationController::class, 'store'])->name('store');
        Route::get('/detail/{id}', [AdminReservationController::class, 'detail'])->name('detail');
        Route::delete('/{id}', [AdminReservationController::class, 'destroy'])->name('destroy');
        Route::put('/{id}/status', [AdminReservationController::class, 'updateStatus'])->name('update_status');
    });

    // Administrasi Sewa Mobil Jenazah (Car Rental)
    Route::prefix('admin/sewa-mobil')->name('admin.carrental.')->group(function () {
        Route::get('/', [AdminCarRentalController::class, 'index'])->name('index');
        Route::get('/data', [AdminCarRentalController::class, 'data'])->name('data');
        Route::get('/detail/{id}', [AdminCarRentalController::class, 'detail'])->name('detail');
        Route::put('/{id}/status', [AdminCarRentalController::class, 'updateStatus'])->name('update_status');
        Route::delete('/{id}', [AdminCarRentalController::class, 'destroy'])->name('destroy');
    });

});
