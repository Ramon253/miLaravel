@props(['vinyl'])
<x-card>
    <div class="flex">
        <img class="hidden w-48 mr-6 md:block"
             src="{{asset('/images/no-image.png')}}" alt=""/>
        <div>
            <h3 class="text-2xl">
                <a href="/vinyls/{{$vinyl->id}}">{{$vinyl->name}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">Stock : {{$vinyl->stock}}</div>
            <div class="text-xl font-bold mb-4">Price : {{$vinyl->price}}</div>
            <div class="text-xl font-bold mb-4">Duration : {{$vinyl->duration}}</div>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i>
            </div>
        </div>
    </div>
</x-card>
