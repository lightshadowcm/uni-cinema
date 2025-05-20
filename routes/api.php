<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\usercontroller;

Route::get('/user', [usercontroller::class, 'index']);

Route::get('/user/{id}', function() {
    return 'only one user';
});

Route::post('/user', [usercontroller::class, 'store']);

Route::put('/user/{id}', function() {
    return 'actualizando usuario';
});

Route::delete('/user/{id}', function() {
    return 'eliminando usuario';
});
