@extends('layout.main')
@section('title','BellaCase')
@section('content')
<!-- section slide -->
<section class="w-full h-[640px]  relative">
    <div class=" absolute mt-[200px] w-[400px] ml-[100px]  
    flex flex-col items-center justify-center text-center text-black-500 z-10 space-y-2">
        <h1 class="text-3xl text-justify">Preços incríveis para todos os seus favoritos</h1>
        <p class="text-lg text-justify">  Compre mais por menos em marcas selecionadas</p>
        <a  href="/showAllProdutos"  class="btn bg-blue-800 hover:bg-blue-500  
        text-white p-3 text-lg mr-[230px] mt-3 rounded-lg hover:cursor-pointer">
    Compre agora
     </a>


    </div>
  <img class="mySlides w-full h-full object-cover" src="/img/slide1.png">
  <img class="mySlides w-full h-full object-cover" src="/img/slide2.png">
</section>

<!-- section mais vendidos -->
<section class="flex flex-col justify-center items-center mt-4">
    <h1 class="text-2xl font-bold text-center mb-6">Produtos mais vendidos</h1>

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
        <a  href="/showAllProdutos"  class="btn bg-blue-800 hover:bg-blue-500  
        text-white text-center p-4 w-1/5 text-lg mr-[10px] mt-9 rounded-full hover:cursor-pointer">
      Ver todos
     </a>

    @endif
    
</section>




 
 <!-- section mais categoia -->
<!-- section mais vendidos -->
<section class="flex flex-col justify-center items-center mt-9 bg-gray-100" id="categorias">
    <h1 class="text-3xl font-bold text-center mt-2">Categoria</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-9  p-9">
    
        <div class="bg-white shadow-lg rounded-full p-4 flex flex-col items-center justify-center
         w-60 h-50">
         <a href="/categoryCp">
            <img src="/img/pc/pc1.jpg" alt=""
             class="w-40 h-24 object-cover rounded-lg mb-4">
            <p class="text-lg text-black-500 text-center">Computador</p>
            </a>
        </div>
        <div class="bg-white shadow-lg rounded-full p-4 flex flex-col items-center justify-center
         w-60 h-50">
         <a href="/categoryTelefone">
            <img src="/img/telefone/iphone2.jpg" alt=""
             class="w-40 h-24 object-cover rounded-lg mb-4">
            <p class="text-lg text-black-500 text-center">Telefone</p>
            </a>
        </div>
        <div class="bg-white shadow-lg rounded-full p-4 flex flex-col items-center justify-center
         w-60 h-50">
         <a href="/categoriaTablet">
            <img src="/img/tabletes/tablete1.jpg" alt=""
             class="w-40 h-24 object-cover rounded-lg mb-4">
            <p class="text-lg text-black-500 text-center">Tablets</p>
            </a>
        </div>
        <div class="bg-white shadow-lg rounded-full p-4 flex flex-col items-center justify-center
         w-60 h-50">
         <a href="/categoriaCamera">
            <img src="/img/cameras/camera2.jpg" alt=""
             class="w-40 h-24 object-cover rounded-lg mb-4">
            <p class="text-lg text-black-500 text-center">Câmeras</p>
            </a>
        </div>
    </div>
</section>



 <!-- section mais promocao e novidades  -->
 <section class="flex flex-col sm:flex-row justify-center items-center 
 mt-4 space-y-8 sm:space-y-0 sm:space-x-8" id="pro_end_new">
  <div class="relative w-full sm:w-[45%]">
    <div class="absolute top-1/2 left-1/4 transform -translate-x-1/2 
    -translate-y-1/2 text-white text-center px-4">
      <p class="text-xl font-semibold">Ofertas da Páscoa</p>
      <h1 class="text-3xl font-bold mt-2">Até 50% de desconto</h1>
      <a href="/categoriaPromocao" class="btn  mr-9 inline-block mt-4 px-6 py-3
       bg-blue-800 text-white rounded-md hover:bg-blue-500 transition duration-300">Comprar</a>
    </div>
    <img src="/img/promocaoTelefone.png" alt="Imagem Promoção" class="w-full h-auto rounded-lg">
  </div>
  <div class="relative w-full sm:w-[45%]">
  <div class="absolute top-1/2 left-1/4 transform -translate-x-1/2 
    -translate-y-1/2 text-white text-center px-4">
      <p class="text-xl font-semibold">Novidades</p>
      <h1 class="text-xl font-bold mt-2">Produtos com altas tecnologia</h1>
      <a href="/categoriaCamera" class="btn  mr-9 inline-block mt-4 px-6 py-3
       bg-blue-800 text-white rounded-md hover:bg-blue-500 transition duration-300">Comprar</a>
    </div>
    <img src="/img/fundoAuriculares.png" alt="Imagem Promoção" class="w-full h-auto rounded-lg">
  </div>
</section>


 <!-- envio -->
<!-- section envio -->
<section class="flex flex-col justify-center items-center mt-9 bg-gray-100">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-9 p-9">
        
        <!-- Retirada disponível -->
        <div class="bg-white shadow-lg rounded-lg p-4 flex flex-col items-center justify-center w-60 h-50">
            <i class="fas fa-store-alt text-4xl text-blue-500 mb-3"></i>
            <p class="text-lg text-black-500 text-center">Retirada disponível</p>
        </div>

        <!-- Frete grátis -->
        <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col items-center justify-center w-60 h-50">
            <i class="fas fa-truck text-4xl text-blue-500 mb-3"></i>
            <p class="text-lg text-black-500 text-center">Frete grátis acima de 40€</p>
        </div>

        <!-- Garantia de preços baixos -->
        <div class="bg-white shadow-lg rounded-lg p-4 flex flex-col items-center justify-center w-60 h-50">
            <i class="fas fa-tags text-4xl text-blue-500 mb-3"></i>
            <p class="text-lg text-black-500 text-center">Garantia de preços baixos</p>
        </div>

        <!-- Disponível 24/7 -->
        <div class="bg-white shadow-lg rounded-lg p-4 flex flex-col items-center justify-center w-60 h-50">
            <i class="fas fa-clock text-4xl text-blue-500 mb-3"></i>
            <p class="text-lg text-black-500 text-center">Disponível para você 24/7</p>
        </div>

    </div>
</section>


@endsection