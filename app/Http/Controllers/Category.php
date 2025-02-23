<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;

class Category extends Controller
{
    // 
    public function addCategory(){
        $categories=Categorie::all();
        return view('categories.addCategory',[ 'categories'=> $categories]);
    }
    public function storeCategory(Request $request){
        $request->validate([
            'category_name' => 'required|string',
            'codigo' => 'required|string|regex:/^[a-zA-Z0-9_-]+$/',
            'description' => 'required|string',
        ], [
            'category_name.required' => 'Seleciona uma categoria.',
            'codigo.required' => 'Códio deve ter apenas numero e letras.',
            'description.required' => 'Descrição para a categoria',
        ]);
        
        
       
         $categories= new Categorie();
         $categories->category_name= $request->category_name;
         $categories->codigo= $request->codigo;
         $categories->description= $request->description;
         $categories->save();

        return redirect('addCategory')->with('addSucess','Categoria adcionada');
    }
    //  deletar categoria
    public function destroy($id){
        $categories=Categorie::findOrFail($id);
        $categories->delete();
        return redirect('addCategory')->with('delete','Categoria apagada');
    }
    // update categoria
   
    public function showEditCategorie($id){
        $categorie=Categorie::findOrFail($id);
        return view('categories.editCategoria',[ 'categorie'=> $categorie]);
    }
    
   
      public function  updateCategorie(Request $request,$id){
        $data=$request->all();
        Categorie::findOrFail($id)->update($data);
        return redirect('addCategory');
    }
}
