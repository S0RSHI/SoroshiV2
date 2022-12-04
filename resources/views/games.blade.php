<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($games as $item)
                {{$item->name}} <br>
            @endforeach
        </div>
        {{ $games->nextPageUrl() }}

    </div>
</x-app-layout>
