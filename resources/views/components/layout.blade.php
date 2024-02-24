<!DOCTYPE html>
<html lang="en">
<?php $hover = 'transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 hover:bg-black duration-300' ?>
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="icon" href="images/favicon.ico"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite('resources/css/app.css')
    @vite(['resources/js/app.js'])
    <title> VOST | Vinyls OST</title>
</head>

<body class="mb-48">
<nav class="flex relative flex-col bg-slate-500 p-5 drop-shadow-2xl">

    <div class="flex justify-between  items-center">
        <a href="/"><img class="w-24 " src="{{asset('images/logo.png')}}" alt=""/></a>

        @auth
            <details
                class="absolute top-10 right-10 max-h-full mr-10 flex-col rounded drop-shadow-md p-1 items-start bg-slate-800 w-60 max-w-1/5 self-start">
                <summary class="list-none text-center text-white appearance-none cursor-pointer">
                <span class="font-bold uppercase">
                    Welcome {{ auth()->user()->name}}
                </span>
                </summary>
                <ul class="bg-slate-900 rounded text-white">
                    <li class="border-solid border-b-0  p-1 border-gray-500 border-2 w-full">
                        <a href="/listings/manage" class="hover:text-gray-300"><i class="fa-solid fa-gear"></i> Manage
                            Listings</a>
                    </li>
                    <li class="border-solid  p-1 border-gray-500 border-2 w-full">
                        <form method="POST" action="/logout">
                            @csrf
                            <button class="hover:text-gray-300" type="submit">
                                <i class="fa-solid fa-door-closed"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </details>
        @else
            <ul>
                <li>
                    <a href="/user/create" class="hover:text-red-50"><i class="fa-solid fa-user-plus"></i> Register</a>
                </li>
                <li>
                    <a href="/login" class="hover:text-red-50"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</a>
                </li>
                @endauth
            </ul>
    </div>
    <div class="w-full flex justify-center">
        <ul class="flex bg-slate-800 text-white shadow-2xl  items-center rounded h-10 w-96 justify-evenly space-x-10 justify-self-center self-end">
            <li class="flex rounded items-center h-2/3 p-2 {{$hover}}"><a href="">Tienda</a></li>
            <li class="flex rounded items-center h-2/3 p-2 {{$hover}}"><a href="">Carrito</a></li>
            <li class="flex rounded items-center h-2/3 p-2 {{$hover}}"><a href="">Perfil</a></li>
        </ul>
    </div>
</nav>

<main {{$attributes->merge(["class" => "flex w-full flex-col items-center gap-15"])}} >
    {{$slot}}
</main>
<footer
    class=" w-full space-x-10 flex items-center justify-start font-bold bg-red-500 text-white h-24 opacity-90 md:justify-center">
    <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>

    <a href="/listings/create" class=" bg-black text-white py-2 px-5">Post Job</a>
</footer>

</body>

</html>
