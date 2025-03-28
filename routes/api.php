<?php

use App\Http\Controllers\Api\PrizeController;
use Illuminate\Support\Facades\Route;

Route::get('/prizes', [PrizeController::class, 'index']);
Route::get('/spin', [PrizeController::class, 'spin']);