<div class="h-80 w-64 bg-gradient-to-b from-sky-600/70 to-indigo-600/70 rounded-md flex flex-col-reverse relative">
        <img class="absolute z-0 top-0 left-0 w-full h-full object-cover opacity-50" src="{{$item->image}}" alt="Game cover">
        <div class="p-5 bg-gray-900/80 z-10 h-1/3 flex items-center">
            <h3 class="text-lg text-white">{{Str::limit($item->name, 68, ' (...)')}}</h3>
        </div>

    {{-- {{$item}} --}}
</div>
