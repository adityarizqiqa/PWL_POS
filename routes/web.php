<?php

use App\Http\Controllers\levelController;
use illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/level', [levelController::class, 'index']);