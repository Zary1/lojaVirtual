@extends('layout.mainAdmin')
@section('title','BellaCase')
@section('content')
<section class="flex justify-center items-center mt-9">
  
    <div class="w-[500px] p-6 rounded-lg shadow-lg bg-gray-100">
    
        <h1 class="text-3xl font-semibold text-center mb-6">Editar Produtos</h1>
        <form method="POST" action="/edit/{{$produt->id}}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            <!-- Nome do Produto -->
            <div class="flex flex-col">
                <label for="name" class="text-lg font-medium">Nome do Produto:</label>
                <input type="text" value="{{ $produt->name }}" name="name" required class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Descrição -->
            <div class="flex flex-col">
                <label for="description" class="text-lg font-medium">Descrição:</label>
                <textarea name="description" class="p-3 border border-gray-300 rounded-md 
                focus:outline-none focus:ring-2 focus:ring-blue-500">         {{ $produt->description }}</textarea>
       
            </div>

            <!-- Preço -->
            <div class="flex flex-col">
                <label for="price" class="text-lg font-medium">Preço:</label>
                <input type="number" value="{{ $produt->price }}" name="price" step="0.01" required class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Categoria -->
            <div class="flex flex-col">
                <label for="category" class="text-lg font-medium">Categoria:</label>
                <select name="categorie_id" class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                   
                </select>
            </div>

            <!-- Promoção -->
            <div class="flex items-center space-x-2">
                <label for="is_on_sale" class="text-lg font-medium">Está em promoção?</label>
                <input type="checkbox"   name="is_on_sale" value="1" class="h-5 w-5">
            </div>

            <!-- Desconto -->
            <div class="flex flex-col">
                <label for="discount_percentage" class="text-lg font-medium">Desconto (%):</label>
                
                <input type="number" value="{{ $produt->discount_percentage }}" name="discount_percentage" step="0.01" class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Imagem do Produto -->
            <div class="flex flex-col">
                <label for="image" class="text-lg font-medium">Imagem do Produto:</label>
                <input type="file" name="image" accept="image/*" class="p-3 border border-gray-300 rounded-md 
                focus:outline-none focus:ring-2 focus:ring-blue-500" >
            </div>

            <button type="submit" class="w-full p-3 bg-blue-500 text-white rounded-md
             hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Actualizar Produto</button>
        </form>
    </div>
</section>
@endsection
