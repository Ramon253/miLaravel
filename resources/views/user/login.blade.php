<x-layout>
    <x-card class="p-10 w-1/2 mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Login</h2>
            <p class="mb-4">Log into your account to post gigs</p>
        </header>

        <form class="flex flex-col space-y-10" method="POST" action="/users/authenticate">
            @csrf

            <div class="flex flex-col space-y-2">
                <label for="email" class="text-lg mb-2">Email</label>
                <input type="email" id="email" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{old('email')}}" />

                @error('email')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="flex flex-col space-y-2">
                <label for="password" class="text-lg mb-2">
                    Password
                </label>
                <input id="password" type="password" class="border border-gray-200 rounded p-2 w-full" name="password"
                       value="{{old('password')}}" />

                @error('password')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div>
                <x-submit_button>
                    Log in
                </x-submit_button>
            </div>

            <div>
                <p>
                    Don't have an account?
                    <a href="/register" class="text-laravel">Register</a>
                </p>
            </div>
        </form>
    </x-card>
</x-layout>
