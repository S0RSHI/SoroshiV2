@if($isLink)
    <a class="block" href="{{route('game', ['id' => $item->id])}}">
@else
    <div class="block">
@endif
        <div class="h-80 w-64 bg-gradient-to-b from-sky-600/70 to-indigo-600/70 rounded-md flex flex-col-reverse relative">
                <img class="rounded-md w-full h-full object-cover opacity-70" src="{{$item->image}}" alt="Game cover">
                {{ $slot }}
        </div>
        <h3 class="text-lg text-white w-64">{{Str::limit($item->name, 68, ' (...)')}}</h3>
@if($isLink)
    </a>
@else
    </div>
@endif
