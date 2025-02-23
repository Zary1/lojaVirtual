@extends('layout.mainAdmin')
@section('title','BellaCase')
@section('content')
<section class="flex-col justify-center items-center mt-1">
  
    <div class="w-full p-6 rounded-lg ">
    
    @if(session('addSucess'))
    <p class="text-green-500">{{session('addSucess')}}</p>
    @endif
        <form method="POST" action="/addCategory" enctype="multipart/form-data" class=" 
        flex justify-center items-center space-x-2  p-4 bg-blue-300">
            @csrf
            
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
                <input type="text" name="codigo" placeholder="Digite o código da categoria"  required class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <!-- Descrição -->
            <div class="flex flex-col w-1/5  shadow-lg">
                <label for="description" class="text-lg font-medium">Descrição:</label>
                <textarea name="description"  placeholder="Digite a descrição da categoria"  
                 class="p-2 border pt-3 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>

            <button type="submit" class="shadow-lg p-4 bg-blue-500 text-white text-xl mt-8
            rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Adicionar categoria</button>
        </form>
    </div>
    <!-- show categorias -->
    <div class="w-1/2 p-2 rounded-lg mx-auto ">
        @if(session('delete'))
        <p> <p class="text-green-500">{{session('delete')}}</p></p>
        @endif
        <table class="table-auto w-full border bg-gray-300 border-collapse">
            <thead class="bg-gray-300">
                <tr >
                    <th class="border border-gray-100 px-4 py-2 text-left">ID</th>
                    <th class="border border-gray-100 px-4 py-2 text-left">Nome</th>
                    <th class="border border-gray-100 px-4 py-2 text-left">Código</th>
                    <th class="border border-gray-100 px-4 py-2 text-left">Descrição</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Ações</th>
                </tr>
            </thead>
            @foreach( $categories as  $categorie)
            <tbody class="bg-white">
                <tr>
                <th class="border border-white-300 px-4 py-2 text-left">{{$categorie->id}}</th>
                <th class="border border-gray-300 px-4 py-2 text-left">{{$categorie->category_name}}</th>
                <th class="border border-gray-300 px-4 py-2 text-left">{{$categorie->codigo}}</th>
                <th class="border border-gray-300 px-4 py-2 text-left">{{$categorie->description}}</th>
                <th class="border border-gray-300 px-4 py-2 text-left flex justify-center items-center">
               

                    <a href="/editCategoria/{{$categorie->id}}" class="flex items-center px-3
                     py-2 text-blue-500 rounded-lg">
                    <i class="fa-solid fa-pen-to-square"></i></a>
                    <form action="/deleteCategoria/{{$categorie->id}}" method="POST">
                    @csrf
                  @method('DELETE')
    <button onclick="event.preventDefault(); this.closest('form').submit()" type="submit">
        <i class="fa-solid fa-trash text-red-500"></i>
    </button>
</form>

                   
                 </th>



                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
    <!-- show produtos -->
     
</section>
@endsection
