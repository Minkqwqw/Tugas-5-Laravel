<?php

use App\Http\Controllers\Api\GenreController;
use App\Http\Controllers\Api\AuthorController;

Route::apiResource('genres', GenreController::class);
Route::apiResource('authors', AuthorController::class);