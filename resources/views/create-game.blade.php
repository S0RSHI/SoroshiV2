<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="w-full">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Add new game') }}
                            </h2>
                        </header>

                        <form method="POST" action="{{ route('games.store') }}" class="mt-6 space-y-6">
                            @csrf

                            <div class="max-w-xl">
                                <x-input-label for="name" :value="__('Game name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" placeholder="Mario" autofocus/>
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <div class="max-w-xl">
                                <x-input-label for="date_relase" :value="__('Game relase date')" />
                                <x-input-date id="date_relase" class="block mt-1 w-full" type="text" name="date_relase" placeholder="DD-MM-YYYY"/>
                                <x-input-error :messages="$errors->get('date_relase')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="image" :value="__('Link to game image')" />
                                <x-text-input id="image" class="block mt-1 w-full" type="text" name="image" placeholder="https://example.com/image.jpg"/>
                                <x-input-error :messages="$errors->get('image')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="description" :value="__('Game description')" />
                                <x-textarea id="description" class="block mt-1 w-full" type="text" name="description" placeholder="This game is about something"/>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('SUBMIT') }}</x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
