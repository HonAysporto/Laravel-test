<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



// Route::get('/items', [ItemController::class, 'index'])->name('items');
Route::post('/register', [UserController::class, 'register']);
Route::post('/signin', [UserController::class, 'signin']);
