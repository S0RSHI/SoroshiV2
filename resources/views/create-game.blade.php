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
                                <x-input-label for="date_release" :value="__('Game release date')" />
                                <x-input-date id="date_release" class="block mt-1 w-full" type="text" name="date_release" placeholder="DD-MM-YYYY"/>
                                <x-input-error :messages="$errors->get('date_release')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="image" :value="__('Link to game image')" />
                                <x-text-input id="image" class="block mt-1 w-full" type="text" name="image" placeholder="https://example.com/image.jpg"/>
                                <x-input-error :messages="$errors->get('image')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="description" :value="__('Game description')" />
                                <x-textarea :value="null" id="description" class="block mt-1 w-full" type="text" name="description" placeholder="This game is about something"/>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('SUBMIT') }}</x-primary-button>
                            </div>
                        </form>
                        @if (session('error'))
                            <div id="isExist" class="w-full h-full fixed top-0 left-0 bg-black/[.5] backdrop-blur-sm flex items-center justify-center">
                                <div class="p-4 sm:p-8 bg-red-600 rounded-lg max-w-lg m-5 h-fit relative">
                                    <div id="isExist__close" class="isExist__close absolute bg-gray-100 rounded-full p-2 hover:cursor-pointer hover:opacity-80">
                                        <?xml version="1.0" encoding="utf-8"?><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="16px" height="16px" viewBox="0 0 121.31 122.876" enable-background="new 0 0 121.31 122.876" xml:space="preserve"><g><path fill-rule="evenodd" clip-rule="evenodd" d="M90.914,5.296c6.927-7.034,18.188-7.065,25.154-0.068 c6.961,6.995,6.991,18.369,0.068,25.397L85.743,61.452l30.425,30.855c6.866,6.978,6.773,18.28-0.208,25.247 c-6.983,6.964-18.21,6.946-25.074-0.031L60.669,86.881L30.395,117.58c-6.927,7.034-18.188,7.065-25.154,0.068 c-6.961-6.995-6.992-18.369-0.068-25.397l30.393-30.827L5.142,30.568c-6.867-6.978-6.773-18.28,0.208-25.247 c6.983-6.963,18.21-6.946,25.074,0.031l30.217,30.643L90.914,5.296L90.914,5.296z"/></g></svg>
                                    </div>
                                    <h3 class="text-lg font-bold text-center text-gray-100">A game with that title and release date already exists.</h3>
                                </div>
                                <script>
                                    let overlay_isExist = document.getElementById('isExist');
                                    let closeButton_isExist = document.getElementById('isExist__close');
                                    closeButton_isExist.addEventListener('click', () => {
                                        overlay_isExist.remove();
                                    });
                                </script>
                            </div>
                        @endif
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
