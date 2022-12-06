<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-4 justify-items-center gap-12">
                @foreach ($games as $game)
                    <x-game-tile :item="$game"/>
                @endforeach
            </div>
            <div class="mt-12">
                <x-pagination :items="$games"/>
            </div>

        </div>
    </div>
</x-app-layout>
