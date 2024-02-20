<x-layout>
    @foreach($vinyls as $vinyl)
        <x-vinyl_card :vinyl="$vinyl"/>
    @endforeach
</x-layout>
