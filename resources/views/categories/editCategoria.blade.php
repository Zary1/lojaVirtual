@extends('layout.mainAdmin')
@section('title','BellaCase')
@section('content')
<section class="flex-col justify-center items-center mt-1">
  
    <div class="w-full p-6 rounded-lg ">
    
        <form method="POST" action="/editCategoria/{{$categorie->id}}" enctype="multipart/form-data" class=" 
        flex justify-center items-center space-x-2  p-4 bg-blue-300">
        @csrf
        @method('PUT')
            
             <!-- Categoria -->
            <div class="flex flex-col shadow-lg w-1/5">
                <label for="category" class="text-lg font-medium">Categoria:</label>
                <select name="category_name" class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="telefone" >Telefone</option>
                    <option value="computador " >Computador</option>
                    <option value="tablete" >Tablete</option>
                    <option value="cameras" >Câmeras</option>
                </select>
            </div>
                <!-- Preço -->
               <div class="flex flex-col w-1/5  shadow-lg">
                <label for="codigo" class="text-lg font-medium">Código:</label>
                <input type="text" name="codigo" value="{{$categorie->codigo}}" placeholder="Digite o código da categoria" 
                 required class="p-3 border border-gray-300 rounded-md focus:outline-none 
                 focus:ring-2 focus:ring-blue-500">
            </div>
            <!-- Descrição -->
            <div class="flex flex-col w-1/5  shadow-lg">
                <label for="description" class="text-lg font-medium">Descrição:</label>
                <textarea name="description"  placeholder="Digite a descrição da categoria"  
                 class="p-2 border pt-3 border-gray-300 rounded-md focus:outline-none focus:ring-2 
                 focus:ring-blue-500">{{$categorie->description}}</textarea>
            </div>

            <button type="submit" class="shadow-lg p-4 bg-blue-500 text-white text-xl mt-8
            rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
            Aditar categoria</button>
        </form>
    </div>
    
</section>
@endsection
