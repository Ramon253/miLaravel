<x-layout>
    <div class="flex flex-col bg-slate-200 shadow-2xl w-full space-y-4 items-center pb-4">
        <div class="flex flex-wrap w-9/10 space-x-4 justify-center items-center space-y-4">
            @foreach($vinyls as $vinyl)
                <x-vinyl_card :vinyl="$vinyl">
                    <div class="text-xl font-bold">Quantity : {{ $vinyl->quantity}}</div>
                    <form action="/order" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="rounded bg-red-500 p-2 text-white transition ease-in-out duration-200 hover:-translate-y-2 hover:scale-110 ">
                            Delete
                        </button>
                    </form>
                </x-vinyl_card>
            @endforeach
        </div>
        <form action="/vinyl/buy" method="post"
            @foreach($vinyls as $vinyl)
                <input type="hidden" name="id_vinyls[]" value="{{$vinyl->id}}">
                <input type="hidden" name="quantity[{{$vinyl->id}}]" value="{{$vinyl->quantity}}">
            @endforeach

            <button type="submit"
                    class="bg-slate-500 text-white w-fit py-2 px-4 rounded shadow-2xl transition ease-in-out duration-200 hover:-translate-y-2 hover:scale-110 hover:bg-slate-900 ">
                buy
            </button>
        </form>
    </div>
</x-layout>
