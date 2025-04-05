<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SubscriberController;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::get('/items', [ItemController::class, 'index'])->name('items');
Route::post('/register', [AdminController::class, 'register']);
Route::post('/signin', [AdminController::class, 'signin']);
Route::post('/fetchsubscriber', [AdminController::class, 'fetchSubcriberDetails']);
Route::post('/subscriber/register', [SubscriberController::class, 'register']);

