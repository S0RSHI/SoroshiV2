<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                {{$name}}
            </h2>
            @if(count($games) > 0)
                <div class="grid xl:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 justify-items-center gap-12">
                    @foreach ($games as $game)
                        <x-game-tile :isLink=false :item="$game->game">
                            <div class="vc__tile-buttons absolute flex justify-between items-center top-0 left-0 p-10 w-full h-full flex-col py-20">
                                <x-game-link :purple="false" :red="false" :link="route('game', ['id' => $game->game->id])">Show game</x-game-link>
                                <x-game-link :purple="true" :red="false" :link="route('my-game', ['id' => $game->game->id])">Show your info</x-game-link>
                                <x-game-link :purple="false" :red="true" :link="route('list-remove', ['id' => $game->id])">Remove from list</x-game-link>
                            </div>
                        </x-game-tile>
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
