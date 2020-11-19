<?php

use App\Http\Controllers\Api\v1\AuthorController;
use App\Http\Controllers\Api\v1\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('/v1')->group(function () {
    Route::get('books/search', [BookController::class, 'search'])->name('books.search');
    Route::get('authors/search', [AuthorController::class, 'search'])->name('authors.search');


    Route::apiResource('authors', AuthorController::class);
    Route::apiResource('books', BookController::class);

});
