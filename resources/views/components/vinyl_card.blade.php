@props(['vinyl'])
<x-card class="w-2/5 justify-self-center first:ml-5 mt-5">
    <div class="flex w-full">
        <img class="hidden w-48 mr-6 md:block rounded"
             src="{{$vinyl->imageStyle ? asset($vinyl->imageStyle) : asset('/images/no-image.jpg')}}" alt=""/>
        <div class="flex flex-col space-y-4">
            <h3 class="text-2xl">
                <a href="/vinyl/{{$vinyl->id}}">{{$vinyl->name}}</a>
            </h3>
            <div class="text-2xl font-bold text-red-500 ">{{$vinyl->price}} €</div>
            <div class="text-xl font-bold ">Stock : {{$vinyl->stock}}</div>
            <div class="text-xl font-bold ">Duration : {{$vinyl->duration}}</div>
            {{$slot}}
        </div>
    </div>
</x-card>
