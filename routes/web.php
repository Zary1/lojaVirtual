<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Produt;
use App\Http\Controllers\Category; 
use App\Http\Controllers\FrontEnd; 
use App\Http\Controllers\Contactos; 
use App\Http\Controllers\Carrinho; 
use App\Http\Middleware\Authenticate;

// front end
Route::get('/',[FrontEnd::class,'index']);
Route::get('/showAllProdutos',[FrontEnd::class,'showAllProdutos']);
Route::get('/categoryCp',[FrontEnd::class,'categoryCp']); 
Route::get('/categoryTelefone',[FrontEnd::class,'categoryTelefone']); 
Route::get('/categoriaTablet',[FrontEnd::class,'categoriaTablet']); 
Route::get('/categoriaCamera',[FrontEnd::class,'categoriaCamera']); 
Route::get('/categoriaPromocao',[FrontEnd::class,'categoriaPromocao']); 
Route::get('/detalheProdut/{id}',[FrontEnd::class,'detalheProdut']); 
// Route Carinho
Route::get('/cart', [Carrinho::class, 'showCart']);
Route::post('/cart/add/{id}', [Carrinho::class, 'addToCart']);
Route::post('/favorito/{id}', [Carrinho::class, 'favorito']);
Route::get('/favorito', [Carrinho::class, 'showfavorito']);
Route::delete('/cart/add/{id}', [Carrinho::class, 'removeFromCart']);
Route::put('/cart/add/{id}', [Carrinho::class, 'updateCart']);

   

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
//  Route Category
Route::get('addCategory',[Category::class,'addCategory']);
Route::post('addCategory',[Category::class,'storeCategory']);
Route::delete('/deleteCategoria/{id}', [Category::class, 'destroy']);
Route::get('/editCategoria/{id}', [Category::class, 'showEditCategorie']);
Route::put('/editCategoria/{id}', [Category::class, 'updateCategorie'])->name('categories.editCategoria');


// Route Produtos
Route::get('/addProduts',[Produt::class,'addProdutos'])->middleware(Authenticate::class);
Route::post('/addProduts',[Produt::class,'store']);  
Route::delete('/addProduts/{id}', [Produt::class, 'destroy']);
Route::get('/allProdutos',[Produt::class,'allProdutos'])->middleware(Authenticate::class);      
Route::get('/addProduts/{id}',[Produt::class,'showeditProduts']);   
Route::put('/edit/{id}',[Produt::class,'editProduts']);   
Route::get('/categoria/telefone',[Produt::class,'ShowTelefones'])->middleware(Authenticate::class);      
Route::get('/categoria/computador',[Produt::class,'ShowComputador'])->middleware(Authenticate::class);      
Route::get('/categoria/tablete',[Produt::class,'ShowTablete'])->middleware(Authenticate::class);      
Route::get('/categoria/cameras',[Produt::class,'ShowCameras'])->middleware(Authenticate::class);      
Route::get('/categoria/promocao',[Produt::class,'ShowPromocao'])->middleware(Authenticate::class);      
Route::get('/seach',[Produt::class,'showSeach'])->middleware(Authenticate::class);      
Route::post('/seach',[Produt::class,'seach'])->middleware(Authenticate::class);   

// Route Contatos
Route::post('/sendContacto',[Contactos::class,'sendContacto']); 
Route::get('/main',[Contactos::class,'main'])->name('layout.main'); 



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
