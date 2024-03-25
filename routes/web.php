<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\userManagementController;


Route::prefix("admin")->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class,'index'])->name('home.dashboard');
    Route::resource('user-management', userManagementController::class);
    Route::resource('doctors', DoctorController::class);
});
Route::get('/', function() {
    return view('welcome');
});