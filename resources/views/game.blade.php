<x-app-layout>
    @if(session('status'))
    <div class="fast-alert z-50 w-full fixed bottom-0 left-0 p-4 text-center rounded-t-md bg-green-700 shadow-sm">
        <h3 class="text-white">{{(session('status'))}}</h3>
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
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex gap-4">
                <div class="w-80 rounded-md">
                    <div class="bg-gradient-to-b from-sky-600/70 to-indigo-600/70 rounded-md mb-2">
                        <img class="rounded-md h-80 w-80 object-cover opacity-70 object-center" src="{{$game->image}}" alt="game-image">
                    </div>
                    <h3 class="mb-1 text-md text-slate-300">Ogólna ocena: {{$game->score}} / 10</h3>
                    <p class="mb-2 text-md text-slate-300">Data wydania: {{$game->date_release->format('d / m / Y')}}</p>
                    <div class="flex flex-col gap-2">
                        <div onclick="toggle(popup0)" class="w-full">
                            <x-button :purple="true" :red="false" :active="true">
                                @if (!$list)
                                    Dodaj do listy
                                @else
                                    @if($list->list_type == 1)
                                        Played
                                    @elseif ($list->list_type == 2)
                                        Playing
                                    @else
                                        Want to Play
                                    @endif
                                @endif

                            </x-link></div>

                            <x-button :purple="false" :red="true" :active="true">Usuń z listy</x-link>
                            @if (Auth::user() && Auth::user()->is_admin)
                                <x-button :purple="false" :red="false">Edytuj</x-link>
                            @endif
                    </div>
                </div>
                <div class="w-full flex flex-col gap-4 justify-between">
                    <div>
                        <h3 class="text-3xl text-white mb-2">{{$game->name}}</h3>
                        <p class="text-md text-slate-300">{{$game->description}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="popup0" class="fixed hidden flex justify-center items-center w-full h-full top-0 left-0 bg-gray-900/8 backdrop-blur">
        <div class="p-10 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-2/3 h-2/3 flex items-center justify-center relative">
            <div onclick="toggle(popup0)" class="text-white rounded-full flex justify-center items-center w-8 aspect-square bg-slate-600 hover:bg-slate-700 cursor-pointer absolute right-4 top-4">X</div>
            <form method="POST" action="{{ route('review.store')}}" class="mt-6 space-y-6 w-full h-full">
                @csrf
                <p>{{session('status')}}</p>
                <input type="hidden" name="game_id" id="game_id" value="{{ $game->id }}" />

                <div class="w-full">
                    <x-input-label for="list" :value="__('Chose your list')" />
                    <select name="list" id="list" class="mt-1 border-gray-700 focus:border-indigo-600 w-full shadow-sm cursor-pointer border-w bg-gray-900 text-white rounded-md outline-none">
                        <option value="1"  @if($list && $list->list_type == 1) selected="selected" @endif>Played</option>
                        <option value="2"  @if($list && $list->list_type == 2) selected="selected" @endif>Playing</option>
                        <option value="3"  @if($list && $list->list_type == 3) selected="selected" @endif>Want to play</option>
                    </select>
                    <x-input-error :messages="$errors->get('list')" class="mt-2" />
                </div>

                <div class="w-full">
                    <x-input-label for="score" :value="__('Your score (not required)')" />
                    <x-text-input id="score" myv="{{($list && $list->score ) ? $list->score : ''}}" class="block mt-1 w-full" type="number" min="0" max="10" name="score" placeholder="Score 0 - 10" autofocus/>
                    <x-input-error :messages="$errors->get('score')" class="mt-2" />
                </div>

                <div class="w-full">
                    <x-input-label for="message" :value="__('Short message (not required)')" />
                    <x-textarea id="message" value="{{($list && $list->message ) ? $list->message : ''}}" class="block mt-1 w-full" type="text" name="message" placeholder="Your short message"/>
                    <x-input-error :messages="$errors->get('message')" class="mt-2" />
                </div>

                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('SUBMIT') }}</x-primary-button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function toggle(div_id) {
            if(div_id.classList.contains('hidden')) div_id.classList.remove('hidden');
            else div_id.classList.add('hidden');
        }
    </script>
</x-app-layout>
