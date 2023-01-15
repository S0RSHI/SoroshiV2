<x-app-layout>
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
                        <x-link href="/p" :green="true" :red="false" :active="true">Dodaj do listy</x-link>
                        <x-link href="/ok" :green="false" :red="true" :active="true">Usuń z listy</x-link>
                        @if (Auth::user()->is_admin)
                            <x-link href="/dsada" :green="false" :red="false">Edytuj</x-link>
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
</x-app-layout>
