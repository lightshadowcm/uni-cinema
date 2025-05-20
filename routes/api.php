<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\usercontroller;

Route::get('/user', [Usercontroller::class, 'index']);

Route::get('/user/{id}',[Usercontroller::class, 'show']);

Route::post('/user', [Usercontroller::class, 'store']);

Route::put('/user/{id}', [Usercontroller::class, 'update']);

Route::delete('/user/{id}', [Usercontroller::class, 'destroy']);
