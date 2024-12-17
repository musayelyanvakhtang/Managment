<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TableController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\OrderController;


Route::get('/tables',[TableController::class, 'index']);
Route::post('/bookings',[BookingController::class, 'store']);
Route::get('/orders',[OrderController::class, 'index']);
