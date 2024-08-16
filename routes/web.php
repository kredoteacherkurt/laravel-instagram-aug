<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SampleController;

Auth::routes();



Route::group(["middleware" => "auth"], function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');

    Route::group(['prefix'=>'post', "as"=>"post."],function(){
        Route::get('/create', [PostController::class, 'create'])->name('create');
        Route::post('/store', [PostController::class, 'store'])->name('store');
        Route::delete('/destroy/{post}', [PostController::class, 'destroy'])->name('destroy');
        Route::get('/show/{post}', [PostController::class, 'show'])->name('show');
        Route::get('/edit/{post}', [PostController::class, 'edit'])->name('edit');
        Route::patch('/update/{post}', [PostController::class, 'update'])->name('update');
    });

    // Route::group(['prefix'=>'comment', "as"=>"comment."],function(){
    //     Route::post('/comment/{post_id}/store',[CommentController::class, 'store'])->name('store');
    // });

    Route::resource('/comment', CommentController::class);
        // ->except('create', 'edit', 'update','index','show');

});
