<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class Produt extends Controller
{
    public function index(){
        return view('produtos.index');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validação da imagem
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|in:telefone,computador,tablete,cameras', // Incluindo a categoria "cameras"
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
            'price.min' => 'O preço não pode ser negativo.',
            'category.required' => 'A categoria do produto é obrigatória.',
            'category.in' => 'A categoria selecionada é inválida.',
            'is_on_sale.boolean' => 'O campo "Está em promoção" deve ser verdadeiro ou falso.',
            'discount_percentage.numeric' => 'O desconto deve ser um valor numérico.',
            'discount_percentage.min' => 'O desconto não pode ser menor que 0%.',
            'discount_percentage.max' => 'O desconto não pode ser maior que 100%.',
        ]);
        $produt= new Product();
     
      
          
        return redirect('index')->with('msg','produto adicionado com sucesso');
    }
}
