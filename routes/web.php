<?php

use Illuminate\Support\Facades\Route;

Auth::routes();


Route::middleware(['auth'])->group(function () {
    
    Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard.index');
    Route::get('/admin/tpu', [App\Http\Controllers\Admin\TpuController::class, 'index'])->name('admin.tpu.index');

});