<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;



Auth::routes();



Route::group(["middleware" => "auth"], function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');

    Route::group(['prefix'=>'post', "as"=>"post."],function(){
        Route::get('/create', [PostController::class, 'create'])->name('create');
        Route::post('/store', [PostController::class, 'store'])->name('store');
        Route::delete('/destroy/{post}', [PostController::class, 'destroy'])->name('destroy');
        Route::get('/show/{post}', [PostController::class, 'show'])->name('show');
        Route::get('/edit/{post}', [PostController::class, 'edit'])->name('edit');


    });
});
