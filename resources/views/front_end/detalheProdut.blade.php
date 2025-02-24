@extends('layout.main')
@section('title','BellaCase')
@section('content')
<section class="flex flex-col justify-center items-center mt-4 mb-[200px]">
   
<div class="bg-red-500 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 w-full px-4 py-6">
    <!-- Card do Produto -->
    <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col items-center">
        <div class="w-90 h-60 bg-gray-200 rounded-lg overflow-hidden flex justify-center items-center">
            <img src="{{ asset('img/fotos/' . $detalheProduto->image) }}" 
            alt="{{ $detalheProduto->name }}" 
            class="w-full h-full object-cover">
        </div>
    </div>

    <!-- Detalhes do Produto -->
    <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col">
        <h2 class="text-lg font-semibold text-center">{{ $detalheProduto->name }}</h2>
        <p class="text-sm text-gray-500 text-center">{{ ucfirst($detalheProduto->category_name) }}</p>
        
        <p class="text-lg font-bold text-green-600 mt-2 text-center">
            @if($detalheProduto->is_on_sale)
                <span class="line-through text-red-500">
                    {{ number_format($detalheProduto->price, 2, ',', '.') }}€
                </span>
                <span class="ml-2">
                    {{ number_format($detalheProduto->price * (1 - $detalheProduto->discount_percentage / 100), 2, ',', '.') }}€
                </span>
            @else
                {{ number_format($detalheProduto->price, 2, ',', '.') }}€
            @endif
        </p>
    </div>
</div>

    
</section>
@endsection