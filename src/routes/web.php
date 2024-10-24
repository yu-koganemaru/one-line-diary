<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', 'App\Http\Controllers\PostController@index');
Route::resource('/post', PostController::class, 
    // 詳細画面は今回実装しない
    ['except' => ['index','show']]
);