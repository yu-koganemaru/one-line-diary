<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'indexView']);
Route::get('/post', [PostController::class, 'postView']);
Route::post('/post', [PostController::class, 'post']);

