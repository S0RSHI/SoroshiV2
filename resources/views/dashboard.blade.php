<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                    Played
                </h2>
                <div class="flex gap-4 flex-wrap">
                    @foreach ($lists_played as $list)
                            <a href="game/{{$list->id_game}}">
                                <img class="rounded-md opacity-70 h-80 w-64 object-cover" src="{{$list->game->image}}" alt="banner-game">
                            </a>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                    Playing
                </h2>
                <div class="flex gap-4 flex-wrap">
                    @foreach ($lists_playing as $list)
                            <a href="game/{{$list->id_game}}">
                                <img class="rounded-md opacity-70 h-80 w-64 object-cover" src="{{$list->game->image}}" alt="banner-game">
                            </a>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                    Want to play
                </h2>
                <div class="flex gap-4 flex-wrap">
                    @foreach ($lists_toPlay as $list)
                    <a href="game/{{$list->id_game}}">
                        <img class="rounded-md opacity-70 h-80 w-64 object-cover" src="{{$list->game->image}}" alt="banner-game">
                    </a>
            @endforeach
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            @if (Auth::user()->is_admin)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <a href="/create-game" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Add new game</a>
                    </div>
                </div>
            @endif
        </div>
    </div>


    @if(session('status') == 'game created')
        <div class="fast-alert fixed right-2 top-2 p-4 bg-green-700 shadow-sm">
            <h3 class="text-white">Gra została pomyślnie utworozna</h3>
        </div>
        <script>
            let allAlert = document.querySelectorAll('.fast-alert');
            allAlert.forEach((e, i) => {
                setTimeout(() => {
                    e.style.display = 'none';
                }, (i * 500 + 2000))
            });
        </script>
    @endif
</x-app-layout>
