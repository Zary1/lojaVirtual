@extends('layout.mainAdmin')
@section('title','BellaCase')
@section('content')
<section class="flex justify-center items-center mt-9">
    <div class="w-[500px] p-6 rounded-lg shadow-lg bg-gray-100">
        <h1 class="text-3xl font-semibold text-center mb-6">Adicionar Produtos</h1>
        <form method="POST" action="/addProduts" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <!-- Nome do Produto -->
            <div class="flex flex-col">
                <label for="name" class="text-lg font-medium">Nome do Produto:</label>
                <input type="text" name="name" required class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Descrição -->
            <div class="flex flex-col">
                <label for="description" class="text-lg font-medium">Descrição:</label>
                <textarea name="description" class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>

            <!-- Preço -->
            <div class="flex flex-col">
                <label for="price" class="text-lg font-medium">Preço:</label>
                <input type="number" name="price" step="0.01" required class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Categoria -->
            <div class="flex flex-col">
                <label for="category" class="text-lg font-medium">Categoria:</label>
                <select name="category" class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="telefone">Telefone</option>
                    <option value="computador">Computador</option>
                    <option value="tablete">Tablete</option>
                </select>
            </div>

            <!-- Promoção -->
            <div class="flex items-center space-x-2">
                <label for="is_on_sale" class="text-lg font-medium">Está em promoção?</label>
                <input type="checkbox" name="is_on_sale" value="1" class="h-5 w-5">
            </div>

            <!-- Desconto -->
            <div class="flex flex-col">
                <label for="discount_percentage" class="text-lg font-medium">Desconto (%):</label>
                <input type="number" name="discount_percentage" step="0.01" class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Imagem do Produto -->
            <div class="flex flex-col">
                <label for="image" class="text-lg font-medium">Imagem do Produto:</label>
                <input type="file" name="image" accept="image/*" class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit" class="w-full p-3 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Salvar Produto</button>
        </form>
    </div>
</section>
@endsection
