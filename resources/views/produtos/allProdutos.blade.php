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
   <!-- Tabela de Produtos -->
<div class=" px-9 rounded-lg mt-9 ">
    @if($produts->isEmpty())
        <p class="text-center text-gray-500">Nenhum produto disponível.</p>
    @else
        <table class="table-auto w-full border bg-gray-300 border-collapse">
            <thead class="bg-gray-300">
                <tr>
                    <th class="border border-gray-100 px-4 py-2 text-left">ID</th>
                    <th class="border border-gray-100 px-4 py-2 text-left">Nome</th>
                    <th class="border border-gray-100 px-4 py-2 text-left">Quantidade</th>
                    <th class="border border-gray-100 px-4 py-2 text-left">Preço Unitário</th>
                    <th class="border border-gray-100 px-4 py-2 text-left">Preço Promocional</th>
               
                    <th class="border border-gray-100 px-4 py-2 text-left">Promoção</th>
                    <th class="border border-gray-100 px-4 py-2 text-left">Valor Total</th>
                    <th class="border border-gray-100 px-4 py-2 text-left">Data de venda</th>
                  
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach($produts as $produt)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2 text-left">{{ $produt->id }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-left">{{ $produt->name }}</td>
                        <td class="border border-gray-300 px-4 py-2 text-left">{{ $produt->quantidade }}</td>
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
                        <td class="border border-gray-300 px-4 py-2 text-left">??</td>
                        <td class="border border-gray-300 px-4 py-2 text-left">??</td>
                 

                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
</section>
@endsection
