<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite('resources/css/app.css')
    <title> VOST | Vinyls OST</title>
</head>

<body class="mb-48">
<nav class="flex justify-between bg-red-500 p-5 items-center mb-4">
    <a href="/"><img class="w-24 " src="{{asset('images/logo.png')}}" alt=""/></a>
    <ul>
        <li><a href="">Tienda</a></li>
        <li><a href=""></a></li>
    </ul>
    <ul class="flex space-x-6 mr-6 text-lg">
        @auth
            <li>
        <span class="font-bold uppercase">
          Welcome {{auth()->user()->name}}
        </span>
            </li>
            <li>
                <a href="/listings/manage" class="hover:text-laravel"><i class="fa-solid fa-gear"></i> Manage Listings</a>
            </li>
            <li>
                <form class="inline" method="POST" action="/logout">
                    @csrf
                    <button type="submit">
                        <i class="fa-solid fa-door-closed"></i> Logout
                    </button>
                </form>
            </li>
        @else

            <li>
                <a href="/user/create" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i> Register</a>
            </li>
            <li>
                <a href="/login" class="hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</a>
            </li>
        @endauth
    </ul>
</nav>

<main {{$attributes->merge(["class" => "flex w-full flex-col items-center gap-15"])}} >
    {{$slot}}
</main>
<footer
    class=" w-full space-x-10 flex items-center justify-start font-bold bg-red-500 text-white h-24 mt-24 opacity-90 md:justify-center">
    <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>

    <a href="/listings/create" class=" bg-black text-white py-2 px-5">Post Job</a>
</footer>

</body>

</html>
