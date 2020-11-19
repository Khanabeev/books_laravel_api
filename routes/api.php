<?php

use App\Http\Controllers\Api\v1\AuthorController;
use App\Http\Controllers\Api\v1\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('/v1')->group(function () {
    Route::apiResource('authors', AuthorController::class);
    Route::apiResource('books', BookController::class);
});
