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
  
        <header class="  w-full">
            <button class="sm:hidden "> <i class="fas fa-bars text-2xl"></i></button>
           <!-- div pesquisa e users -->
            <div class="flex p-7 justify-between items-center w-full">
            
             <div class="flex  space-x-4">
                <div class="ml-9 flex items-center justify-center">
                <h1 class="text-blue-500 text-2xl">TechZary</h1>
                </div>
               
                <form action="/seach" method="post" class="flex rounded-lg" >
                @csrf
                      <div class=" w-[300px] rounded-lg">
                        <input type="search" class=" bg-gray-100 w-full rounded-l-lg p-2 text-lg"
                         name="seach" id="" placeholder="Busca">  </div> 
                      <button type="submit" class="bg-blue-500 w-[80px] rounded-r-lg flex items-center justify-center">
                      <i class="fa-solid fa-magnifying-glass text-white text-lg"></i>
                      </button>
                     
                    </form>
                   
             </div>
             <div class="mr-[90px] flex text-xl  text-blue-500 items-center space-x-4 relative">
                <i class="fa-solid fa-user hover:cursor-pointer" id="utente"></i>
                <div id="show_users" class="hidden absolute right-0 top-full mt-2 bg-blue-500
                 p-4 w-[150px] shadow-lg rounded-lg">
              <ul class="utentes">
                <div>
                  @if(Auth::guard('admin')->check())
            <p class="nome_admin text-white">{{Auth::guard('admin')->user()->nome}}</p>
            @endif
          </div>
        <li class="nav-item">
          <a class=" text-white" href="/registro">Registrar</a>
        </li>
        <li class="nav-item">
          <a class=" text-white" href="/loginAdmin">Login</a>
        </li>
      
        <li class="nav-item">
          <form action="/logoutAdmin" method="post">
            @csrf
          <a class="text-white hover:cursor-pointer" onclick="event.preventDefault(); this.closest('form').submit()">Sair</a>
          </form>
        
        </li>
             </ul> 
         </div>
                 </div>
           
                
            </div>
        
            
               
                    <!--div nav-bar  -->
                    <div class="flex bg-gray-100 p-3 items-center ">
                <nav class="max-auto">
                    <ul class="flex mt-2 ml-[500px] justify-center  
                    text-xl items-center space-x-9 text-blue-700" >
                        <li><a href="/allProdutos">Home</a></li>
                        <li><a href="/addProduts">Adicionar Produtos</a></li>
                        <li><a href="/addCategory">Adicionar Categoria</a></li>
           <!-- Categoria (Dropdown) -->
           <li class="relative group">
                <a href="#" class="hover:text-blue-500 px-4 py-2">Categoria</a>
                <!-- Dropdown -->
                <ul class="absolute left-2 hidden bg-white shadow-lg rounded-lg mt-2 py-2 w-40 group-hover:block">
                    <li><a href="/categoria/telefone" class="block px-4 py-2 hover:bg-blue-100">Telefone</a></li>
                    <li><a href="/categoria/computador" class="block px-4 py-2 hover:bg-blue-100">Computador</a></li>
                    <li><a href="/categoria/tablete" class="block px-4 py-2 hover:bg-blue-100">Tablete</a></li>
                    <li><a href="/categoria/cameras" class="block px-4 py-2 hover:bg-blue-100">Câmeras</a></li>
                    <li><a href="/categoria/promocao" class="block px-4 py-2 hover:bg-blue-100">Promoção</a></li>
                </ul>
            </li>

                        <li><a href="/allAdmin">Administradores</a></li>
                        
                    </ul>
                </nav>

                </div>
           
              
           </header>


           <main>  @yield('content')</main>

        <script src="https://cdn.jsdelivr.net/npm/heroicons@1.0.5/outline/index.js"></script>
        <script src="js/index.js"></script>
    
    </body>
</html>
