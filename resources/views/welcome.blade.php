@extends('layout.main')
@section('title','BellaCase')
@section('content')
<!-- section slide -->
<section class="w-full h-[640px]  relative">
    <div class=" absolute mt-[200px] w-[400px] ml-[100px]  
    flex flex-col items-center justify-center text-center text-black-500 z-10 space-y-2">
        <h1 class="text-3xl text-justify">Preços incríveis para todos os seus favoritos</h1>
        <p class="text-lg text-justify">  Compre mais por menos em marcas selecionadas</p>
        <a class="btn bg-blue-800 hover:bg-blue-500 
        text-white p-3 text-lg mr-[230px] mt-3 rounded-lg hover:cursor-pointer">
    Compre agora
     </a>


    </div>
  <img class="mySlides w-full h-full object-cover" src="/img/slide1.png">
  <img class="mySlides w-full h-full object-cover" src="/img/slide2.png">
</section>

<!-- section mais vendidos -->
 <section>

 </section>
 <!-- section mais categoia -->
 <section>
    
 </section>

 <!-- section mais promocao e novidades  -->
 <section>
    
 </section>
@endsection