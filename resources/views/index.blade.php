<x-layout  class="space-y-10">
    @foreach($vinyls as $vinyl)
        <x-vinyl_card :vinyl="$vinyl"/>
    @endforeach
</x-layout>
