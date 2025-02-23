@extends('layout.mainAdmin')
@section('title','BellaCase')
@section('content')
<section class="flex justify-center items-center ">
  
    <div class="w-full p-6 rounded-lg ">
    
    @if(session('success'))
    <p class="text-green-500">{{session('success')}}</p>
    @endif

        <form method="POST" action="/addProduts" enctype="multipart/form-data" class=" 
        flex justify-center items-center space-x-4  p-4 bg-blue-300">

            @csrf
            <!-- Nome do Produto -->
            <div class="flex flex-col w-1/5">
                <label for="name" class="text-lg font-medium">Nome do Produto:</label>
                <input type="text" name="name" placeholder="Digite nome do produto"  required class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <label for="price" class="text-lg font-medium">Preço:</label>
                <input type="number" placeholder="Digite preco do produto" name="price" step="0.01" required class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Descrição -->
            <div class="flex flex-col  w-1/5">
                <label for="description" class="text-lg font-medium">Descrição:</label>
                <textarea name="description" placeholder="Digite a descrição do produto"  class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                <label for="category" class="text-lg font-medium">Categoria:</label>
                <select name="categorie_id" class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>


            <!-- Promoção -->
            <div class="flex flex-col  w-1/5  ">
                <div class="flex space-x-2">
                <label for="is_on_sale" class="text-lg font-medium mt-9">Está em promoção?</label>
                <input type="checkbox" name="is_on_sale" value="1" class="mt-9 w-5">
                </div><br>
                <label for="discount_percentage" class="text-lg font-medium">Desconto (%):</label>
                <input type="number" placeholder="Digite a percetam  do produto" name="discount_percentage" step="0.01" class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Imagem do Produto -->
            <div class="flex flex-col  w-1/5 ">
                <label for="image" class="text-lg font-medium">Imagem do Produto:</label>
                <input type="file" name="image" accept="image/*" class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit" class=" p-4 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Salvar Produto</button>
        </form>
    </div>
</section>
@endsection
