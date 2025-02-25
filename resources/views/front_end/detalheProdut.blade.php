@extends('layout.main')
@section('title','BellaCase')
@section('content')
<section class="flex  justify-center items-center mt-4 mb-[200px] gap-9 mt-9">
   

    <!-- Card do Produto -->
    <form action="/cart/add/{{$detalheProduto->id}}" method="post" class="flex w-full justify-center items-center">
    @csrf
    <div class="bg-white shadow-full rounded-lg p-6 flex flex-col items-center w-1/4 ">
        <div class="w-full h-60 bg-gray-200 rounded-lg overflow-hidden flex justify-center items-center">
            <img src="{{ asset('img/fotos/' . $detalheProduto->image) }}" 
            alt="{{ $detalheProduto->name }}" 
            class="w-full h-full object-cover">
    </div> 
    </div> 

    <!-- Detalhes do Produto -->
    <div class="  rounded-sm  p-6 flex flex-col gap-4 items-start w-full sm:w-1/2 md:w-1/3 lg:w-1/4 shadow-sm">
    <h2 class="text-lg font-semibold text-black">
        {{ $detalheProduto->name }}
    </h2>
    <p class="text-lg font-bold text-green-200 mt-2">
        @if($detalheProduto->is_on_sale)
            <span class="line-through text-black">
                {{ number_format($detalheProduto->price, 2, ',', '.') }}€
            </span>
            <span class="ml-2 text-black">
                {{ number_format($detalheProduto->price *
                     (1 - $detalheProduto->discount_percentage / 100), 2, ',', '.') }}€
            </span>
        @else
         <span class="ml-2 text-black text-lg"> {{ number_format($detalheProduto->price, 2, ',', '.') }} €</span>  
        @endif
    </p>
 
     <label for="">Quantidade </label>
    <input type="number" placeholder="1" name="quantity" value="1"
        class="w-16 text-center border border-gray-300 rounded-md py-2 focus:outline-none focus:ring-2 focus:ring-green-500">

    <div class="flex gap-4">
    <button type="submit"
        class="bg-blue-700  font-semibold py-2 px-4 rounded-md hover:bg-blue-500  
        text-white
        ">
        Adicionar
        </button>
        <form  action="/favorito/{{$detalheProduto->id}}" method="post">
    <button  
    class="bg-blue-700  font-semibold py-2 px-4 rounded-md hover:bg-blue-500  
        text-white"><i class="fa-solid fa-heart"></i>
      </button>    
      </form>

    </div>
    <p class="text-sm text-black">
        {{ ucfirst($detalheProduto->description) }}
    </p>

</div>

</form>
</section>
@endsection