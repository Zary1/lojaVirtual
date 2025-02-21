@extends('layout.mainAdmin')
@section('title','BellaCase')
@section('content')
<section class="flex justify-center items-center mt-9">
    <div class="w-[500px] p-6 rounded-lg shadow-lg bg-gray-100">
        <h1 class="text-2xl font-semibold text-gray-700 text-center mb-4">
            Login</h1>
        <form action="/loginAdmin" method="post" class="flex flex-col space-y-3">
    @csrf

    <!-- Email -->
    <input type="email" name="email" placeholder="Seu email" 
        class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
    @error('email')
    <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror


    <!-- Senha -->
    <input type="password" name="password" id="password" placeholder="Palavra-passe" 
        class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
    @error('password')
    <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror

    <!-- Confirmação de Senha -->
    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirme a palavra-passe" 
        class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
    @error('password_confirmation')
    <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror

    <!-- Botão de Enviar -->
    <button type="submit" 
        class="w-full bg-blue-500 text-white py-2 rounded-lg font-semibold hover:bg-blue-600 transition duration-300">
        Enviar
    </button>
</form>

    </div>
</section>

@endsection