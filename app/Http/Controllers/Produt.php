<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categorie;
use Illuminate\Support\Facades\Auth;

class Produt extends Controller
{
    public function index(){
        $produts=Product::all();
        $categories = Categorie::all();  
      
        return view('welcome', [
            'categories' => $categories,
            'produts' => $produts
        ]);
    }
    public function addProdutos(){
        $produts=Product::all();
        $categories = Categorie::all();  
      
        return view('produtos.addProdutos', [
            'categories' => $categories,
            'produts' => $produts
        ]);
        
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'quantidade' => 'required|numeric|min:0',
            'categorie_id' => 'required|exists:categories,id',
            'is_on_sale' => 'nullable|boolean',
            'discount_percentage' => 'nullable|numeric|min:0|max:100',
        ], [
            'name.required' => 'O campo nome do produto é obrigatório.',
            'name.string' => 'O nome do produto deve ser uma string válida.',
            'name.max' => 'O nome do produto não pode exceder 255 caracteres.',
            'image.image' => 'O arquivo deve ser uma imagem válida (jpeg, png, jpg, gif, svg).',
            'image.mimes' => 'A imagem deve ter um dos seguintes formatos: jpeg, png, jpg, gif, svg.',
            'image.max' => 'A imagem não pode ter mais de 2MB.',
            'price.required' => 'O campo preço é obrigatório.',
            'price.numeric' => 'O preço deve ser um valor numérico.',
            'quantidade.numeric' => 'A quantidade deve ser um valor numérico.',
            'price.min' => 'O preço não pode ser negativo.',
            'categorie_id.required' => 'A categoria do produto é obrigatória.',
            'categorie_id.in' => 'A categoria selecionada é inválida.',
            'is_on_sale.boolean' => 'O campo "Está em promoção" deve ser verdadeiro ou falso.',
            'discount_percentage.numeric' => 'O desconto deve ser um valor numérico.',
            'discount_percentage.min' => 'O desconto não pode ser menor que 0%.',
            'discount_percentage.max' => 'O desconto não pode ser maior que 100%.',
        ]);
       
        

        $produt= new Product();
        $produt->name=$request->name;
        $produt->description=$request->description;
        $produt->price=$request->price;
        $produt->categorie_id = $request->categorie_id;
        $produt->quantidade= $request->quantidade;
        $produt->is_on_sale=isset($request->is_on_sale)? 1: 0;
        $produt->discount_percentage=$request->is_on_sale ?  $request->discount_percentage : null;

        //  imagem
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage=$request->image;
            $extension=$requestImage->extension();
            $imageName=md5( $requestImage->getClientOriginalName(). "." .$extension);
            $requestImage->move(public_path('img/fotos'),$imageName);
            $produt->image= $imageName;

        }
        $admin_id=Auth::guard('admin')->user();
        $produt->admin_id=$admin_id->id;

     
        $produt->save();
        return redirect('/addProduts')->with('success', 'Produto cadastrado com sucesso!');

          
       
    }

    public function allProdutos(){
        $produts=Product::all();
        return view('produtos.allProdutos',['produts'=>$produts]);
    }
    
    public function destroy($id){
        $produts=Product::findOrFail($id);
        $produts->delete();
        return redirect('addProduts');
   

    }
// editar os produtos
public function showeditProduts($id){
    $produt=Product::findOrFail($id);
    return view('produtos.edtiProdutos',['produt'=>$produt]);
}
public function editProduts(Request $request,$id){
    $data=$request->all();

    if($request->hasFile('image') && $request->file('image')->isValid()){
        $requestImage=$request->image;
        $extension=$requestImage->extension();
        $imageName=md5( $requestImage->getClientOriginalName(). "." .$extension);
        $requestImage->move(public_path('img/fotos'),$imageName);
        $data['image']= $imageName;
    }
     Product::findOrFail($id)->update($data);
    return redirect('/addProduts');
}
    // categoria dos telefones 
    public function ShowTelefones(){
        $categorie=Categorie::where('category_name','telefone')->first();
        if(!$categorie){
            return redirect()->back()->with('error', 'Categoria não encontrada!');
        }

        $produts=Product::where('categorie_id',$categorie->id)->get();
        return view('produtos.categoriaTelefone',['produts'=>$produts]);
    }
    public function ShowComputador(){
        $categorie=Categorie::where('category_name','computador')->first();
        if(!$categorie){
            return redirect()->back()->with('error', 'Categoria não encontrada!');
        }

        $produts=Product::where('categorie_id',$categorie->id)->get();
        return view('produtos.categoriaComputador',['produts'=>$produts]);
    }
    public function ShowTablete(){
        $categorie=Categorie::where('category_name','tablete')->first();
        if(!$categorie){
            return redirect()->back()->with('error', 'Categoria não encontrada!');
        }
        $produts=Product::where('categorie_id',$categorie->id)->get();
        return view('produtos.categoriaTablete',['produts'=>$produts]);
    }
    public function ShowPromocao(){
        $produts=Product::where('is_on_sale','1')->get();
        return view('produtos.categoriaPromocao',['produts'=>$produts]);
    }
    public function ShowCameras(){
        $categorie=Categorie::where('category_name','cameras')->first();
        if(!$categorie){
            return redirect()->back()->with('error', 'Categoria não encontrada!');
        }
        $produts=Product::where('categorie_id',$categorie->id)->get();
        return view('produtos.categoriaCameras',['produts'=>$produts]);
    }

    // pesquisar produtos
    public function showSeach(){
        return view('produtos.seach');
    }
 
  
    public function seach(Request $request){
        $seach = $request->input('seach'); 
    if ($seach) {
        // Buscando os produtos com o nome similar ao que foi pesquisado
        $produts = Product::where('name', 'like', '%' . $seach . '%')->get();

        // Verificando se não há produtos encontrados
        if ($produts->isEmpty()) {
            return view('produtos.seach', [
                'produts' => [], 
                'seach' => 'Nenhum produto encontrado.'
            ]);
        }

        // Caso haja produtos encontrados, retorna a view com os produtos
        return view('produtos.seach', ['produts' => $produts]);
    } else {
        // Se não houver termo de pesquisa, pode redirecionar de volta ou mostrar algo
        return view('produtos.seach', [
            'produts' => [], 
            'seachVazia' => 'Por favor, insira um termo para a busca.'
        ]);

    }
}



   
}

