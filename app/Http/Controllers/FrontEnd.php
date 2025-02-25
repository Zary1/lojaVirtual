<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categorie;

class FrontEnd extends Controller
{
    //
    public function index(){
        $categorie=Categorie::where('category_name','telefone')->first();
        if(!$categorie){
            return redirect()->back()->with('error', 'Categoria não encontrada!');
        }

        $produts=Product::where('categorie_id',$categorie->id)->get();
        return view('welcome', ['produts' => $produts]);
    }
    public function showAllProdutos(){
        $produts=Product::all();
        return view('front_end.showAllProdutos', [ 'produts' => $produts ]);
    }

    public function categoryCp(){
        $categorie=Categorie::where('category_name','computador')->first();
        if(!$categorie){
            return redirect()->back()->with('error', 'Categoria não encontrada!');
        }

        $produts=Product::where('categorie_id',$categorie->id)->get();
        return view('front_end.categoryCp', ['produts' => $produts]);
        }
       
        public function  categoryTelefone(){
            $categorie=Categorie::where('category_name','telefone')->first();
            if(!$categorie){
                return redirect()->back()->with('error', 'Categoria não encontrada!');
            }
    
            $produts=Product::where('categorie_id',$categorie->id)->get();
            return view('front_end.categoriaTelefone',['produts'=>$produts]);
        }
     
        public function  categoriaTablet(){
            $categorie=Categorie::where('category_name','tablete')->first();
            if(!$categorie){
                return redirect()->back()->with('error', 'Categoria não encontrada!');
            }
            $produts=Product::where('categorie_id',$categorie->id)->get();
            return view('front_end.categoriaTablet',['produts'=>$produts]);
        }
      
        public function   categoriaCamera(){
            $categorie=Categorie::where('category_name','cameras')->first();
            if(!$categorie){
                return redirect()->back()->with('error', 'Categoria não encontrada!');
            }
            $produts=Product::where('categorie_id',$categorie->id)->get();
            return view('front_end.categoriaCamera',['produts'=>$produts]);
        }
        public function categoriaPromocao(){
            $produts=Product::where('is_on_sale','1')->get();
            return view('front_end.categoriaPromocao',['produts'=>$produts]);
        }
        // pagina detalhe
        public function detalheProdut($id){
            $detalheProduto=Product::findOrFail($id);
            return view('front_end.detalheProdut',['detalheProduto'=>$detalheProduto]);
        }
      
}
