<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app'); // Xử lý riêng route gốc
});
Route::get('/{any}', function () {
    return view('app');
})->where('any', '.*');