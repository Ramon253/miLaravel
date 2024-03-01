@props(['songs'])
<div class="bg-gray-400 w-1/2 text-center rounded p-2 space-y-4 shadow-xl pb-10">
    <div class=" font-bold w-full italic text-3xl  drop-shadow-2xl">Songs</div>

    <ul class="flex w-full flex-wrap flex-col p-2 items-center mb-10 space-y-4">
        @foreach($songs as $song)
            <li class="bg-gray-300 rounded w-3/4 p-4">
                <span onclick="getSongs({{$song->id}})" class="font-medium cursor-pointer">
                    {{$song->name}}
                </span>

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
