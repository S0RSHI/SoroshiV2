<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($games as $game)
                {{$game->name}} <br>
            @endforeach
            <x-pagination :items="$games"/>
        </div>

    </div>
</x-app-layout>
