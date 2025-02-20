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
                        <li><a href="">Loja</a></li>
                        <li><a href="">Coleção</a></li>
                        <li><a href="">Promoção</a></li>
                        <li><a href="">Nossa história</a></li>
                        <li><a href="">Contacto</a></li>
                    </ul>
                </nav>

                </div>
           </header>


           <main>  @yield('content')</main>

        <script src="https://cdn.jsdelivr.net/npm/heroicons@1.0.5/outline/index.js"></script>
        <script src="js/index.js"></script>
    
    </body>
</html>
