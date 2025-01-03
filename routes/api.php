<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TableController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\OrderController;


Route::resource('/tables', TableController::class);


Route::post('/bookings', [BookingController::class, 'store']);
Route::post('/orders', [OrderController::class, 'store']);
Route::get('/orders', [OrderController::class, 'index']);
Route::get('/test', [BookingController::class, 'index']);
