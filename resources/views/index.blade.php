<x-layout class="space-y-10">
   <x-flash_message/>
    <main class="flex flex-wrap w-3/4 space-x-4 justify-center items-center space-y-4" >
    @foreach($vinyls as $vinyl)
        <x-vinyl_card :vinyl="$vinyl"/>
    @endforeach
    </main>
</x-layout>
