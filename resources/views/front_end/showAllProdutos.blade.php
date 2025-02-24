@extends('layout.main')
@section('title','BellaCase')
@section('content')

<!-- Todos os produtos-->
<section class="flex flex-col justify-center items-center mt-4 mb-[200px]">
    <h1 class="text-2xl font-bold text-center mb-6">Todos os produtos</h1>

    @if($produts->isEmpty())
        <p class="text-center text-gray-500">Nenhum produto disponível.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 w-1/1 px-4">
            @foreach($produts as $produt)
                <div class="bg-white shadow-lg rounded-lg p-9 flex flex-col">
                    <img src="{{ asset('img/fotos/' . $produt->image) }}" 
                    alt="{{ $produt->name }}" class="w-full h-40 object-cover rounded-lg mb-4">
                    
                    <h2 class="text-lg font-semibold text-center">{{ $produt->name }}</h2>
                    <p class="text-sm text-gray-500 text-center">{{ ucfirst($produt->category_name) }}</p>
                    
                    <p class="text-lg font-bold text-green-600 mt-2 text-center">
                        @if($produt->is_on_sale)
                            <span class="line-through text-red-500">
                                 {{ number_format($produt->price, 2, ',', '.') }}€
                            </span>
                            <span class="ml-2">
                                {{ number_format($produt->price * (1 - $produt->discount_percentage / 100), 2, ',', '.') }}€
                            </span>
                        @else
                             {{ number_format($produt->price, 2, ',', '.') }}€
                        @endif
                    </p>
                </div>
            @endforeach
        </div>
    @endif
</section>

@endsection