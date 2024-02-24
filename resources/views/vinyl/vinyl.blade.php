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
                    <div class="bg-gray-400 w-1/2 text-center rounded p-2 space-y-4 shadow-xl pb-10">
                        <div class=" font-bold w-full italic text-3xl  drop-shadow-2xl">Songs</div>

                        <ul class="flex w-full flex-wrap flex-col p-2 items-center mb-10 space-y-4">
                            @foreach($songs as $song)

                                <li class="bg-gray-300 rounded w-3/4 p-4">
                                    <span onclick="getSongs({{$song->id}})"
                                          class="font-medium cursor-pointer">{{$song->name}}</span>

                                    <div id="{{$song->id}}" class="hidden">
                                        <ul class="ml-4 flex flex-col items-start space-y-4">
                                            <li>
                                                <span class="font-medium">Artist</span> : {{$song->artist}}
                                            </li>
                                            <li>
                                                <span class="font-medium">Compositor</span> : {{$song->compositor}}
                                            </li>
                                            <li>
                                                <span class="font-medium">Genres</span> : {{$song->genre}}
                                            </li>
                                            <li>
                                                <span class="font-medium">Duration</span> : {{$song->duration}} mins
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                            @endforeach
                        </ul>


                    </div>
                </div>
            </form>
        </main>
    </div>

</x-layout>
