<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/day1', [App\Http\Controllers\Day1Controller::class, 'solve']);
Route::get('/day2', [App\Http\Controllers\Day2Controller::class, 'solve']);
Route::get('/day3', [App\Http\Controllers\Day3Controller::class, 'solve']);
