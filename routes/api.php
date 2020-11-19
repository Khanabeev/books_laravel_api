<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('/v1')->group(function() {
    Route::get('/authors', [\App\Http\Controllers\Api\v1\AuthorController::class, 'index']);
});
