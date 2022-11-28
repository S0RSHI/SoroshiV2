<x-app-layout>

	<div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
				<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">Add new game </h2>
				<form method="POST" action="{{ route('games.store') }}">
					@csrf
					<div>
						<x-input-label for="game-name" :value="__('Game name')" />
						<x-text-input id="game-name" class="block mt-1 w-full" type="text" name="game-name" :value="old('game-name')" required autofocus />
						<x-input-error :messages="$errors->get('game-name')" class="mt-2" />
					</div>
		
					<div class="flex items-center justify-end mt-4">
		
						<x-primary-button class="ml-3">
							{{ __('Submit') }}
						</x-primary-button>
					</div>
				</form>
				@if (session('message')) 
					{{session('message')}}
				@endif
			</div>
		</div>
	</div>

</x-app-layout>