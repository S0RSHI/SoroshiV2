<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(count($games) > 0)
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                    {{$name}}
                </h2>
                <div class="grid grid-cols-4 justify-items-center gap-12">
                    @foreach ($games as $game)
                        <x-game-tile :item="$game->game"/>
                    @endforeach
                </div>
                <div class="mt-12">
                    <x-pagination :items="$games"/>
                </div>
            @else
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 flex align-middle justify-center">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        Unfortunately no games have been added to this list.
                    </h2>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
