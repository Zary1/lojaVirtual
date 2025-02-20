<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;

Route::get('/', function () {
    return view('welcome');
});

// Route Administradores
Route::get('/admin',[Admin::class,('index')]);