@extends('layout.mainAdmin')
@section('title','BellaCase')
@section('content')
<section class="flex justify-center items-center mt-9">
    <div class="w-[500px] p-6 rounded-lg shadow-lg bg-gray-100">
        <h1 class="text-2xl font-semibold text-gray-700 text-center mb-4">
            Actualização dos dados</h1>
        <form action="/edit/allAdmin/{{$admin->id}}" method="post" class="flex flex-col space-y-3">
    @csrf
    @method('PUT')

    <!-- Nome -->
    <input type="text" name="nome" placeholder="Seu nome" value="{{$admin->nome}}"
        class="w-full p-2 border border-gray-300 rounded 
        focus:outline-none focus:ring-2 focus:ring-blue-500">

    <!-- Email -->
    <input type="email" name="email" placeholder="Seu email" value="{{$admin->email}}"
        class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
   

    <!-- Telefone -->
    <input type="text" name="phone" placeholder="Seu telefone" value="{{$admin->phone}}"
        class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
  
 

    <!-- Botão de Enviar -->
    <button type="submit" 
        class="w-full bg-blue-500 text-white py-2 rounded-lg font-semibold hover:bg-blue-600 transition duration-300">
        Enviar
    </button>
</form>

    </div>
</section>

@endsection