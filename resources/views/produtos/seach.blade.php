@extends('layout.mainAdmin')
@section('title','BellaCase')
@section('content')
<section class="flex justify-center items-center mt-9">

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
   @if(isset($seach)) 
        <p class="text-center text-red-500">{{ $seach }}</p>
    @endif
    @if(isset($seachVazia)) 
        <p class="text-center text-red-500">{{ $seachVazia }}</p>
    @endif
            @foreach($produts as $produt)
                <div class="bg-white shadow-md rounded-lg p-4">
                    <img src="{{ asset('img/fotos/' . $produt->image) }}" 
                    alt="{{ $produt->name }}" class="w-full h-40 object-cover rounded-lg">
                    <h2 class="text-lg font-semibold mt-3">{{ $produt->name }}</h2>
                    <p class="text-sm text-gray-500">{{ ucfirst($produt->category) }}</p>
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
                    <div class="mt-3 flex justify-between">
                    
                        <a href="" class="flex items-center px-3 py-2 text-blue-500 rounded-lg">
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

</section>
@endsection
