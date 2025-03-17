<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::get('/items', [ItemController::class, 'index'])->name('items');
Route::post('/register', [AdminController::class, 'register']);
Route::post('/signin', [AdminController::class, 'signin']);
