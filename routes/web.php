<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Produt;

Route::get('/', function () {
    return view('welcome');
});

// Route Administradores
Route::get('/admin',[Admin::class,('index')]);
Route::get('/registro',[Admin::class,('showRegistro')]);
Route::post('/registro',[Admin::class,('store')]);
Route::get('/loginAdmin',[Admin::class,('showLogin')]);
Route::post('/loginAdmin',[Admin::class,('login')]);
Route::get('/allAdmin',[Admin::class,('showAdmins')]);
Route::delete('/delete/{id}',[Admin::class,('destroy')]);
Route::get('/edit/allAdmin/{id}',[Admin::class,('showEdit')]);
Route::put('/edit/allAdmin/{id}',[Admin::class,('storeEdit')]);
Route::post('logoutAdmin',[Admin::class,('logoutAdmin')]);

// Route Produtos
Route::get('/addProduts',[Produt::class,'index']);
Route::post('/addProduts',[Produt::class,'store']);