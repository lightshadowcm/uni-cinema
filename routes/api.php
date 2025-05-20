<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function() {
    return 'user list';
});

Route::get('/user/{id}', function() {
    return 'only one user';
});

Route::post('/user', function() {
    return 'creando usuario';
});

Route::put('/user/{id}', function() {
    return 'actualizando usuario';
});

Route::delete('/user/{id}', function() {
    return 'eliminando usuario';
});
