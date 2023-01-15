<a href="{{$href}}"

class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest transition ease-in-out duration-150
@if($green) bg-green-600 text-white hover:bg-green-500 @elseif ($red) text-white bg-red-600 hover:bg-red-500 @else bg-gray-200 text-gray-800 hover:bg-white @endif">
    {{ $slot }}
</a>

