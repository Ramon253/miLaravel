<x-layout class="items-center bg-gray-300 pt-20 pb-20 ">
    <header class="text-start font-medium w-1/2 self-end  text-3xl drop-shadow-2xl">
        <h1 class="border-b-2 border-gray-400 pb-5 w-1/2">{{$vinyl->name}}</h1>
    </header>

    <div class="flex w-full flex-row justify-center items-start space-x-10 ">
        <div class="w-1/2 flex p-0 justify-end items-start mt-1">
            <img class="hidden mr-6 sm:flex w-3/5  rounded"
                 src="{{$vinyl->imageStyle ? asset($vinyl->imageStyle) : asset('/images/no-image.jpg')}}" alt=""/>
        </div>
        <main class="w-1/2 h-90vh min-h-dvh">
            <form class="pt-5 flex  flex-col space-y-10" method="post" action="/cart/{{$vinyl->id}}">
                @csrf
                {{--Price--}}
                <div class="text-5xl font-medium text-red-600">
                    <h2>{{$vinyl->price}} € </h2>
                </div>

                <div class="text-lg flex flex-col space-y-10">
                    {{--Quantity and buttons--}}
                    <label for="quantity" class="font-medium ">
                        Quantity :
                        <select name="quantity" class="ml-4 h-10 border-2 border-gray-400" id="quantity">
                            @for($i = 1; $i <= $vinyl->stock; $i++ )
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                            @error('quantity')
                            @enderror
                        </select>
                    </label>
                    <div class="flex space-x-10">
                        <x-submit_button>
                            {{ session()->has('addToCart')? session()->get('addToCart'): 'buy'}}
                        </x-submit_button>
                        <x-button onclick="">
                            Add to cart
                        </x-button>
                    </div>
                    {{--Desciption--}}
                    <div>
                        <p class="w-1/2"><strong>Description</strong> : {{$vinyl->description}}</p>
                    </div>
                    <div>
                        <p class="w-1/2"><strong>Duration</strong> : {{$vinyl->duration}} mins</p>
                    </div>
                    {{--Songs--}}

                    <x-song.songs_card :songs="$songs"/>

                </div>
            </form>
        </main>
    </div>
</x-layout>
