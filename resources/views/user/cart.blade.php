<x-layout>
    <form action="/vinyl/buy" method="post" class="flex flex-wrap w-9/10 space-x-4 justify-center items-center space-y-4" >
        @csrf
        @foreach($vinyls as $vinyl)
            <x-vinyl_card :vinyl="$vinyl">
                <div class="text-xl font-bold">Quantity : {{ $vinyl->quantity}}</div>
                <form method="post" action="/user/cart">
                    @csrf
                    @method('delete')
                    <button type="submit">
                        Delete
                    </button>
                </form>
            </x-vinyl_card>
        @endforeach
        <button type="submit">
            Comprar
        </button>
    </form>
</x-layout>
