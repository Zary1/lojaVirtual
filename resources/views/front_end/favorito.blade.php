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

           <section class="flex flex-col lg:flex-row justify-center items-start gap-9 mt-9 
           mb-[200px] w-full px-4">
    <!-- Carrinho de Compras -->
    <div class="w-full lg:w-3/4 bg-white  rounded-lg p-6">
        @if($cartItems->isEmpty())
            <p class="mt-4 text-gray-500 text-center text-lg">Seu carrinho está vazio.</p>
        @else
            @foreach($cartItems as $item)
            <div class="flex flex-col sm:flex-row items-center bg-gray-100 shadow-md rounded-lg p-6 mb-6">
                <!-- Imagem do Produto -->
                <div class="w-full sm:w-1/3 h-40 flex justify-center items-center">
                    <img src="{{ asset('img/fotos/' . $item->product->image) }}" 
                         class="w-full h-full object-cover rounded-lg shadow-sm">
                </div>

                <!-- Detalhes do Produto -->
                <div class="w-full sm:w-2/3 p-4 flex flex-col">
                    <h2 class="text-lg font-semibold">{{ $item->product->name }}</h2>
                    <p class="text-sm text-gray-500">{{ ucfirst($item->product->category_name) }}</p>
                    <p class="text-lg font-bold text-green-600 mt-2">
                        {{ number_format($item->product->price, 2, ',', '.') }}€
                    </p>

                    <!-- Controles de Quantidade e Remoção -->
                    <div class="flex items-center gap-4 mt-4">
                        <form action="/cart/add/{{ $item->id }}" method="POST" class="flex items-center">
                            @csrf
                            @method('PUT')
                            <input type="number" name="quantity" value="{{ $item->quantity }}" 
                                   class="w-16 text-center border border-gray-300 rounded-md py-1">
                            <button onclick="event.preventDefault(); this.closest('form').submit()" 
                                    type="submit" 
                                    class="ml-2 bg-blue-700 text-white py-1 px-3 rounded-md hover:bg-blue-800 transition">
                                <i class="fa-solid fa-check"></i>
                            </button>
                        </form>

                        <form action="/cart/add/{{ $item->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="event.preventDefault(); this.closest('form').submit()"
                                    type="submit" 
                                    class="bg-red-600 text-white py-1 px-3 rounded-md hover:bg-red-700 transition">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    </div>

    <!-- Resumo do Pedido -->
    <div class="w-full lg:w-1/4 bg-gray-100 shadow-md rounded-lg p-6">
        <h1 class="text-xl font-semibold text-center mb-4">Resumo do Pedido</h1>
        <p class="text-gray-700"><strong>Preço do varejo:</strong> 400€</p>
        <p class="text-gray-700"><strong>Total a pagar:</strong> 500€</p>
        <p class="text-gray-700"><strong>Promoções:</strong> Nenhuma</p>
        <button type="button" 
                class="w-full bg-green-600 text-white font-semibold py-2 rounded-md mt-4 hover:bg-green-700 transition">
            Finalizar Pagamento
        </button>

        <!-- Métodos de Pagamento -->
        <div class="mt-6 text-center">
            <h3 class="text-lg font-semibold mb-2">Métodos de Pagamento</h3>
            <div class="flex justify-center gap-4 text-2xl">
                <i class="fab fa-cc-visa text-blue-700"></i>
                <i class="fab fa-cc-mastercard text-red-600"></i>
                <i class="fab fa-paypal text-blue-500"></i>
                <i class="fab fa-google-wallet text-green-600"></i>
                <i class="fas fa-barcode text-gray-600"></i>
            </div>
        </div>
    </div>
</section>




           <script src="js/index.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/heroicons@1.0.5/outline/index.js"></script>
      
    
    </body>
</html>
