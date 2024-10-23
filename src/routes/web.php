<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::resource('/', PostController::class, 
    // 詳細画面は今回実装しない
    ['except' => ['show']]
);