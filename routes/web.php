<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RaceController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/race-results', [RaceController::class, 'index']);
