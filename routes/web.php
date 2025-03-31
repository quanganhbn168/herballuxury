<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WheelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RewardController;
Route::get('/',[HomeController::class,'index'])->name('home');
Route::post('/wheel/spin', [HomeController::class,'spin'])->name('wheel.spin');

Route::prefix('admin')->group(function () {
    Route::get('/rewards', [RewardController::class,'index'])->name('rewards.index');
    Route::get('/rewards/create', [RewardController::class,'create'])->name('rewards.create');
    Route::post('/rewards', [RewardController::class,'store'])->name('rewards.store');
    Route::get('/rewards/{reward}/edit', [RewardController::class,'edit'])->name('rewards.edit');
    Route::put('/rewards/{reward}', [RewardController::class,'update'])->name('rewards.update');
    Route::delete('/rewards/{reward}', [RewardController::class,'destroy'])->name('rewards.destroy');
});