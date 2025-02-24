<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
                  <!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

        <!-- Styles -->
           
            @vite(['resources/css/app.css', 'resources/js/app.js'])
       
    </head>
    <body>
  
        <header class="h-1/4  w-full">
            <button class="sm:hidden "> <i class="fas fa-bars text-2xl"></i></button>
           <!-- div pesquisa e users -->
            <div class="flex h-[80px] justify-between items-center w-full">
            
             <div class="flex  space-x-4">
                <div class="ml-9 flex items-center justify-center">
                <h1 class="text-blue-500 text-2xl">TechZary</h1>
                </div>
               
                <form action="" method="post" class="flex rounded-lg" >
                      <div class=" w-[300px] rounded-lg">
                        <input type="search" class=" bg-gray-100 w-full rounded-l-lg p-2 text-lg" name="" id="" placeholder="Busca">  </div> 
                      <div class="bg-blue-500 w-[80px] rounded-r-lg flex items-center justify-center">
                      <i class="fa-solid fa-magnifying-glass text-white text-lg"></i>
                      </div>
                     
                    </form>
                   
             </div>
             <div class="mr-[90px] flex text-xl  text-blue-500 items-center space-x-4">
                <i class="fa-solid fa-user"></i>
                <i class="fa-solid fa-cart-shopping"></i>
                <i class="fa-solid fa-heart"></i>
            </div>
                </div>
                    <!--div nav-bar  -->
                    <div class="flex bg-gray-100 p-3 items-center ">
                <nav >
                    <ul class="flex mt-2 ml-9 justify-center  text-xl items-center space-x-9 text-blue-700" >
                        <li class="" id=""><a href="/">Loja</a></li>
                        <li class="hover:cursor-pointer" id="colecao">Coleção</li>
                        <li class="hover:cursor-pointer" id="promocao">Promoção</li>
                        <li class="hover:cursor-pointer" id="categoria">Categoria</li>
                        <li class="hover:cursor-pointer" id="contacto">Contacto</li>
                    </ul>
                </nav>

                </div>
           </header>


           <main>  @yield('content')</main>


           <footer>
            <!-- div Newsletter -->
            <div class=" mt-2
            flex flex-col w-full max-w-[1400px] mx-auto items-center text-center bg-blue-300 p-6 rounded-lg shadow-md">
  <div class="mb-4">
    <h1 class="text-2xl font-bold text-gray-800">Newsletter</h1>
    <p class="text-gray-600">Assine para receber novidades e ofertas especiais</p>
  </div>
  <div class=" w-1/2">
  <p class="text-black-500 text-xl" id="paragrafo"></p>
    <form action="" method="get" class="flex w-full relative flex-col sm:flex-row items-center gap-2">
   
 
      <input id="send" type="text" name="newsletter" placeholder="Insira seu email aqui"
        class="w-full sm:w-auto flex-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
      <button type="submit" id="enviar"
        class="absolute right-0 px-6 py-2 bg-blue-700 text-white w-1/4
        rounded-md hover:bg-blue-500 transition-all">
        Enviar
      </button>
    </form>
  </div>
</div>

<!-- div contaco -->
<div class="relative flex flex-col mt-9 lg:flex-row items-center 
justify-between w-full max-w-[1400px] mx-auto p-6 gap-6" id="contactos">
    
    <!-- Seção do formulário -->
    <div class="w-[600px] absolute bg-gray-300 p-4">
        <p class="text-lg text-black-700 mb-4">Tem dúvidas? Fale com a Central de Ajuda</p>
        @if(session('send'))
        <p>{{session('send')}}</p>
        @endif
        <form action="/sendContacto" method="post" class="flex flex-col gap-4">
        @csrf
        @error('name')
        <p class="text-red-500">{{$message}}</p>
        @enderror
            <input type="text" name="name" id="" placeholder="Seu nome"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                @error('email')
        <p class="text-red-500">{{$message}}</p>
        @enderror
                <input type="email" name="email" id="" placeholder="Seu email"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                @error('phone')
        <p class="text-red-500">{{$message}}</p>
        @enderror
                <input type="tel" name="phone" id="" placeholder="Seu telefone"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                @error('message')
        <p class="text-red-500">{{$message}}</p>
        @enderror
                <textarea name="message" id="" placeholder="Deixe a sua mensagem"
                class="w-full h-32 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"></textarea>

            <button class="bg-white p-3 hover:bg-blue-500" type="submit">Enviar</button>
        </form>
    </div>

    <!-- Imagem (oculta em telas menores) -->
    <div class="w-[800px] ml-[500px] right-0 hidden lg:block">
        <img src="/img/rodape.png" alt="Imagem Central de Ajuda" 
            class="w-full object-cover rounded-md">
    </div>

</div>


<!-- Rodapé -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6 w-full 
 mx-auto p-9 bg-gray-100 text-gray-700">
    
    <!-- Endereço -->
    <div>
        <h3 class="text-lg font-semibold mb-2">Endereço</h3>
        <p><i class="fas fa-map-marker-alt"></i> 
        Rua Prates, 194 - Bom Retiro</p>
        <p><i class="fas fa-phone "></i> (11) 3456-7890</p>
        <p><i class="fas fa-envelope "></i> info@meusite.com</p>
    </div>

    <!-- Loja -->
    <div>
        <h3 class="text-lg font-semibold mb-2">Loja</h3>
        <ul class="flex flex-col gap-2">
            <a href="#" class="hover:text-green-600">Loja</a>
            <a href="#" class="hover:text-green-600">Promoção</a>
            <a href="#" class="hover:text-green-600">Nova Coleção</a>
        </ul>
    </div>

    <!-- Redes Sociais -->
    <div>
        <h3 class="text-lg font-semibold mb-2">Redes Sociais</h3>
        <div class="flex flex-col gap-4">
            <a href="#" class="text-sm text-gray-600 hover:text-blue-800">
                <i class="fab fa-facebook"></i> Facebook</a>
            <a href="#" class="text-sm text-gray-600 hover:text-pink-700">
                <i class="fab fa-instagram"></i> Instagram</a>
            <a href="#" class="text-sm text-gray-600 hover:text-blue-600">
                <i class="fab fa-twitter"></i> Twitter</a>
        </div>
    </div>

    <!-- Política -->
    <div>
        <h3 class="text-lg font-semibold mb-2">Política</h3>
        <p class="hover:text-green-600 cursor-pointer">Política de Entregas e Devoluções</p>
        <p class="hover:text-green-600 cursor-pointer">Termos e Condições</p>
        <p class="hover:text-green-600 cursor-pointer">Política de Cookies</p>
    </div>

    <!-- Métodos de Pagamento -->
    <div>
        <h3 class="text-lg font-semibold mb-2">Métodos de Pagamento Aceitos</h3>
        <div class="flex gap-4 text-2xl">
            <i class="fab fa-cc-visa text-blue-700"></i>
            <i class="fab fa-cc-mastercard text-red-600"></i>
            <i class="fab fa-paypal text-blue-500"></i>
            <i class="fab fa-google-wallet text-green-600"></i>
            <i class="fas fa-barcode text-gray-600"></i>
        </div>
    </div>


</div>

<!-- Import FontAwesome -->
<script src="https://kit.fontawesome.com/YOUR_KIT_ID.js" crossorigin="anonymous"></script>

           </footer>


           <script src="js/index.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/heroicons@1.0.5/outline/index.js"></script>
      
    
    </body>
</html>
