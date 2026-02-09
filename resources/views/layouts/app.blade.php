<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('styles')
        <title>DevStagram - @yield('titulo')</title>
        @livewireStyles
        <!-- Fonts -->
        @stack('styles')
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,900" rel="stylesheet" />
    </head>



    <body class="bg-gray-100">
        <header class="p-5 border-b bg-white shadow">
            <div class="container mx-auto flex justify-between items-center">
                <a href="{{route('home')}}" class="text-3xl font-black">
                    DevStagram
                </a>
                @auth
                    <nav class="flex gap-2 items-center">
                        <a
                            class="flex items-center gap-2 bg-white border p-2 text-gray-600 rounded text-sm
                            uppercase font-bold cursor-pointer" 
                            href="{{ route('post.create')}}"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>
                            Crear publicación
                        </a>
                        <a 
                            class="font-bold text-gray-600 text-sm" 
                            href="{{ route('post.index', Auth::user()->username)}}"
                        >
                            Perfil
                        </a>
                        <form method="POST" action="{{route('logout')}}">
                            @csrf
                            <button type="submit" class="font-bold uppercase text-gray-600 text-sm" >Cerrar Sesión</button>
                        </form>    
                    </nav>                      
                @endauth
                @guest
                    <nav class="flex gap-2 items-center">
                        <a class="font-bold uppercase text-gray-600 text-sm" href="login">Login</a>
                        <a class="font-bold uppercase text-gray-600 text-sm" href="{{route('register')}}">Crear Cuenta</a>
                    </nav>                    
                @endguest
            </div>
        </header>

        <main class="container mx-auto p-10">
            <h2 class="font-black text-center text-3xl mb-10">
                @yield('titulo')
            </h2>
            @yield('contenido')
        </main>

        <footer class="text-center p-5 text-gray-500 font-bold uppercase">
            DevStagram - Todos los derechos reservados {{now()->year}}
        </footer>
    </body>

</html>

