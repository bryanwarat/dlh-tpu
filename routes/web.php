<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\HomeController;

Auth::routes();

    // Route::get('/', [App\Http\Controllers\Public\HomeController::class, 'index'])->name('publics.index');
    Route::get('/', [HomeController::class, 'index'])->name('publics.reservation.index');
    Route::post('/reservation', [HomeController::class, 'store'])->name('publics.reservation.store');


Route::middleware(['auth'])->group(function () {
    
    Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard.index');

    Route::get('/admin/tpu', [App\Http\Controllers\Admin\CemeteryController::class, 'index'])->name('admin.cemetery.index');
    Route::get('/admin/tpu/create', [App\Http\Controllers\Admin\CemeteryController::class, 'create'])->name('admin.cemetery.create');
    Route::get('/admin/tpu/data', [App\Http\Controllers\Admin\CemeteryController::class, 'cemeteriesData'])->name('admin.cemetery.data');
    Route::post('/admin/tpu/store', [App\Http\Controllers\Admin\CemeteryController::class, 'store'])->name('admin.cemetery.store');
    Route::get('/admin/tpu/{id}/edit', [App\Http\Controllers\Admin\CemeteryController::class, 'edit'])->name('admin.cemetery.edit');
    Route::put('/admin/tpu/{id}/update', [App\Http\Controllers\Admin\CemeteryController::class, 'update'])->name('admin.cemetery.update');
    Route::get('/admin/tpu/{id}/detail', [App\Http\Controllers\Admin\CemeteryController::class, 'detail'])->name('admin.cemetery.detail');

    Route::get('/admin/pemesanan', [App\Http\Controllers\Admin\ReservationController::class, 'index'])->name('admin.reservation.index');

});