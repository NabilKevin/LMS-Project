<?php

use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Route;

Route::post('/login', [Auth\Post::class, 'login']);