<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\HomeController;

Auth::routes();

    // Route::get('/', [App\Http\Controllers\Public\HomeController::class, 'index'])->name('publics.index');
    Route::get('/', [HomeController::class, 'index'])->name('publics.home');
    Route::get('/reservation', [App\Http\Controllers\Public\ReservationController::class, 'index'])->name('publics.reservation.index');

    Route::get('/cemetery/get-subdistricts/{districtId}', [App\Http\Controllers\Public\ReservationController::class, 'getSubdistricts'])
    ->name('cemetery.getSubdistricts');

Route::middleware(['auth'])->group(function () {
    
    Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard.index');

    Route::get('/admin/tpu', [App\Http\Controllers\Admin\CemeteryController::class, 'index'])->name('admin.cemetery.index');
    Route::get('/admin/tpu/create', [App\Http\Controllers\Admin\CemeteryController::class, 'create'])->name('admin.cemetery.create');
    Route::get('/admin/tpu/data', [App\Http\Controllers\Admin\CemeteryController::class, 'cemeteriesData'])->name('admin.cemetery.data');
    Route::post('/admin/tpu/store', [App\Http\Controllers\Admin\CemeteryController::class, 'store'])->name('admin.cemetery.store');
    Route::get('/admin/tpu/{id}/edit', [App\Http\Controllers\Admin\CemeteryController::class, 'edit'])->name('admin.cemetery.edit');
    Route::put('/admin/tpu/{id}/update', [App\Http\Controllers\Admin\CemeteryController::class, 'update'])->name('admin.cemetery.update');
    Route::get('/admin/tpu/{id}/detail', [App\Http\Controllers\Admin\CemeteryController::class, 'detail'])->name('admin.cemetery.detail');

    Route::get('/admin/pemakaman-baru', [App\Http\Controllers\Admin\ReservationController::class, 'index'])->name('admin.reservation.index');
Route::get('/admin/pemakaman-baru/data', [App\Http\Controllers\Admin\ReservationController::class, 'data'])->name('admin.reservation.data');
Route::get('/admin/pemakaman-baru/detail/{id}', [App\Http\Controllers\Admin\ReservationController::class, 'detail'])->name('admin.reservation.detail');
Route::delete('/admin/pemakaman-baru/{id}', [App\Http\Controllers\Admin\ReservationController::class, 'destroy'])->name('admin.reservation.destroy');

});