@extends('layout.mainAdmin')
@section('title','BellaCase')
@section('content')
<section class="flex-col justify-center items-center mt-1 ">
  
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
                <input type="text" name="name" placeholder="Digite nome do produto" 
                 required class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <label for="price" class="text-lg font-medium">Preço:</label>
                <input type="number" placeholder="Digite preco do produto" name="price" step="0.01" required class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Descrição -->
            <div class="flex flex-col  w-1/5">
                <label for="description" class="text-lg font-medium">Descrição:</label>
                <textarea name="description" placeholder="Digite a descrição do produto" 
                 class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 
                  focus:ring-blue-500"  required></textarea>
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
                <input type="number"  placeholder="Digite a percetam  do produto" name="discount_percentage" 
                step="0.01" class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 
                focus:ring-blue-500" >
            </div>

            <!-- Imagem do Produto -->
            <div class="flex flex-col  w-1/5 ">
            <label for="price" class="text-lg font-medium"> Quantidade:</label>
            <input type="number" placeholder="Quantidade preco do produto" name="quantidade" step="0.01" required class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <label for="image" class="text-lg font-medium mt-2">Imagem do Produto:</label>
                <input type="file" name="image" accept="image/*" class="p-3 border border-gray-300 rounded-md 
                focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <button type="submit" class=" p-4 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Salvar Produto</button>
        </form>
    </div>
    
   <!-- Tabela de Produtos -->
<div class=" px-9 rounded-lg ">
    @if($produts->isEmpty())
        <p class="text-center text-gray-500">Nenhum produto disponível.</p>
    @else
        <table class="table-auto w-full border bg-gray-300 border-collapse">
            <thead class="bg-gray-300">
                <tr>
                    <th class="border border-gray-100 px-4 py-2 text-left">ID</th>
                    <th class="border border-gray-100 px-4 py-2 text-left">Nome</th>
                    <th class="border border-gray-100 px-4 py-2 text-left">Imagem</th>
                    <th class="border border-gray-100 px-4 py-2 text-left">Descrição</th>
                    <th class="border border-gray-100 px-4 py-2 text-left">Preço Unitário</th>
                    <th class="border border-gray-100 px-4 py-2 text-left">Preço Promocional</th>
                    <th class="border border-gray-100 px-4 py-2 text-left">Promoção</th>
                    <th class="border border-gray-100 px-4 py-2 text-left">Quantidade</th>
                    <th class="border border-gray-100 px-4 py-2 text-left">Categoria</th>
                    <th class="border border-gray-100 px-4 py-2 text-left">Ações</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach($produts as $produt)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2 text-left">{{ $produt->id }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-left">{{ $produt->name }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-left">
                            <img src="{{ asset('/img/fotos/' . $produt->image) }}" alt="Imagem do produto" class="w-16 h-16 object-cover">
                        </td>
                        <td class="border border-gray-300 px-4 py-2 text-left">{{ $produt->description }}</td>
                        
                        <!-- Preço Unitário -->
                        <td class="border border-gray-300 px-4 py-2 text-left">
                            <span class="{{ $produt->is_on_sale ? 'line-through text-red-500' : '' }}">
                                {{ number_format($produt->price, 2, ',', '.') }}€
                            </span>
                        </td>

                        <!-- Preço Promocional -->
                        <td class="border border-gray-300 px-4 py-2 text-left">
                            @if($produt->is_on_sale)
                                <span class="ml-2">
                                    {{ number_format($produt->price * (1 - $produt->discount_percentage / 100), 2, ',', '.') }}€
                                </span>
                            @else
                                <span class="text-gray-500">-</span>
                            @endif
                        </td>

                        <!-- Promoção -->
                        <td class="border border-gray-300 px-4 py-2 text-left">
                            {{ $produt->discount_percentage !== null ? $produt->discount_percentage . '%' :
                                 '-' }}
                        </td>
                        <td class="border border-gray-300 px-4 py-2 text-left">{{ $produt->quantidade }}</td>
                        <td class="border px-4 py-2 text-left">{{ $produt->category->category_name ?? 
                            'Sem categoria' }}</td>

                        <th class="border border-gray-300 px-4 py-2 text-left   ">
                            <div class="flex justify-center items-center">
               <a href="/addProduts/{{$produt->id}}" class="flex items-center px-3
                py-2 text-blue-500 ">
               <i class="fa-solid fa-pen-to-square"></i></a>
               <form action="/addProduts/{{$produt->id}}" method="POST">
               @csrf
             @method('DELETE')
              <button onclick="event.preventDefault(); this.closest('form').submit()" type="submit">
                <i class="fa-solid fa-trash text-red-500"></i>
                       </button>
                  </form>

                  </div>
            </th>

                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
</section>
@endsection
