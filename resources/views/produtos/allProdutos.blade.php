@extends('layout.mainAdmin')

@section('title', 'BellaCase')

@section('content')
<section class="container mx-auto mt-9 px-10">
    <h1 class="text-2xl font-bold text-center mb-6">Lista de Produtos</h1>
    <!-- info sobre as vendas e produtos -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    <div class="bg-blue-400 shadow-md rounded-lg p-6 ">
    <i class="fa-solid fa-cart-shopping text-white text-xl"></i>
    <h1 class="text-white text-2xl">13 Vendas</h1>
    <p class="text-white text-lg">Quantidade de vendas realizadas</p>
    </div>
    <div class="bg-blue-500 shadow-md rounded-lg p-6 ">
    <i class="fa-solid fa-euro-sign text-white text-xl"></i>
    <h1 class="text-white text-2xl">130000 €</h1>
    <p class="text-white text-lg">Valor faturado do mês</p>
    </div>

    <div class="bg-blue-600 shadow-md rounded-lg p-6 ">
    <i class="fa-solid fa-boxes-stacked text-white text-xl"></i>
    <h1 class="text-white text-2xl">130000 €</h1>
    <p class="text-white text-lg">Quantidade de produtos vendidos esse mês</p>
    </div>
    <div class="bg-blue-700 shadow-md rounded-lg p-6 ">
    <i class="fas fa-chart-line text-white text-xl"></i>
    <h1 class="text-white text-2xl">0 produtos</h1>
    <p class="text-white text-lg">Quantidade de produtos com baixo estoque</p>
    </div>
    </div>

    <!-- tabelas de produtos e vendas -->
    @if($produts->isEmpty())
        <p class="text-center text-gray-500">Nenhum produto disponível.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($produts as $produt)
                <div class="bg-white shadow-md rounded-lg p-4">
                    <img src="{{ asset('img/fotos/' . $produt->image) }}" 
                    alt="{{ $produt->name }}" class="w-full h-40 object-cover rounded-lg">
                    <h2 class="text-lg font-semibold mt-3">{{ $produt->name }}</h2>
                    <p class="text-sm text-gray-500">{{ ucfirst($produt->categorie_id) }}</p>
                    <p class="text-lg font-bold text-green-600 mt-2">
                        @if($produt->is_on_sale)
                            <span class="line-through text-red-500">
                                 {{ number_format($produt->price, 2, ',', '.') }}€</span>
                            <span class="ml-2">
                {{ number_format($produt->price * (1 - $produt->discount_percentage / 100), 2, 
                    ',', '.') }}€</span>
                        @else
                             {{ number_format($produt->price, 2, ',', '.') }}€
                        @endif
                    </p>
                    <div class="flex flex-col">
           
                <p class="text-sm text-gray-500">    {{ $produt->description }} </p>  
       
            </div>
                    <div class="mt-3 flex justify-between">
                    
                        <a href="/edit/{{$produt->id}}" class="flex items-center px-3 py-2 text-blue-500 rounded-lg">
                        <i class="fa-solid fa-pen-to-square"></i></a>

                        <form action="/delete/{{$produt->id}}" method="POST" 
                        onsubmit="return confirm('Tem certeza que deseja excluir este produto?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                            class="flex items-center px-3 py-2text-white rounded-lg ">
                            <i class="fa-solid fa-trash  text-red-500 "></i>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</section>
@endsection
