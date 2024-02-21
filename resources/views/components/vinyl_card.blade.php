@props(['vinyl'])
<x-card class="w-2/5 justify-self-center first:ml-5 mt-5">
    <div class="flex w-full">
        <img class="hidden w-48 mr-6 md:block rounded"
             src="{{$vinyl->imageStyle ? asset($vinyl->imageStyle) : asset('/images/no-image.jpg')}}" alt=""/>
        <div>
            <h3 class="text-2xl">
                <a href="/vinyl/{{$vinyl->id}}">{{$vinyl->name}}</a>
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
