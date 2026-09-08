<?php

use App\Http\Controllers\Auth;
use App\Http\Controllers\Courses;
use App\Http\Middleware\isStudent;
use Illuminate\Support\Facades\Route;

Route::post('/login', [Auth\Post::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
  Route::post('/logout', [Auth\Post::class, 'login']);

  Route::prefix('students')->middleware(isStudent::class)->group(function () {

    Route::get('/courses', [Courses\Get::class, 'index']);
    Route::get('/courses/{slug}', [Courses\Get::class, 'Show']);
  });
});
