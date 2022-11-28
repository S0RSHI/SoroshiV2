<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-12">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                </div>
            </div>
            @if (Auth::user()->is_admin)
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight mb-6">
                        Add new game
                    </h2>
                    <form method="POST" action="{{ route('dashboard') }}">
                        @csrf
                        <div class="mb-8">
                            <x-input-label class="text-base" for="game-name" value="Name" />
                            <x-text-input id="game-name" class="block mt-1 w-full" type="text" name="game-name" required autofocus />
                            <x-input-error :messages="$errors->get('game-name')" class="mt-2" />
                        </div>
                        {{-- <div class="mb-8">
                            <x-input-label class="text-base" for="game-image" value="Image" />
                            <x-text-input id="game-image" class="block mt-1 w-full" type="text" name="game-image" required/>
                            <x-input-error messages="Filed required" class="mt-2" />
                        </div>
                        <div class="mb-8">
                            <x-input-label class="text-base" for="game-desc" value="Description" />
                            <x-textarea id="game-desc" name="game-desc" class="block mt-1 w-full" required />
                            <x-input-error messages="Filed required" class="mt-2" />
                        </div> --}}
                        <div class="flex justify-end w-full">
                            <x-primary-button>Save</x-primary-button>
                        </div>
                    </form>
                    {{dd($errors)}}
                </div>
            </div>
            @endif
        </div>
        
    </div>
</x-app-layout>
