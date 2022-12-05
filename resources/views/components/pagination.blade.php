<?php
    $allPages = ceil($items->total()/1);
    $currentPage = $items->currentPage();
    $lastPage = $items->lastPage();
    $iPagination = $currentPage-2;
    $endPagination = $currentPage+2;
?>
<div class="w-full flex justify-center h-8 items-center">
    <a class="{{$currentPage == 1 ? 'pointer-events-none opacity-40': ''}} rounded-sm active h-full flex justify-center items-center aspect-square bg-gray-800 hover:bg-indigo-600" href="{{ $items->previousPageUrl() }}">
        <svg class="w-5 h-5 fill-gray-200"  viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
        </svg>
    </a>
    <div class="mx-5 h-full flex justify-center items-center gap-1">
        @for ($iPagination; $iPagination <=  $endPagination; $iPagination++)
            @if ($iPagination > 0 && $iPagination <= $allPages)
                <a class="{{$iPagination == $currentPage ? 'bg-indigo-600' : 'bg-gray-800'}} rounded-sm font-bold h-full flex justify-center items-center aspect-square text-gray-200" href="{{$items->url($iPagination)}}">{{$iPagination}}</a>
            @endif
        @endfor
    </div>
    <a class="{{$currentPage == $lastPage ? 'pointer-events-none opacity-40': ''}} rounded-sm h-full flex justify-center items-center aspect-square bg-gray-800 hover:bg-indigo-600" href="{{ $items->nextPageUrl() }}">
        <svg class="w-5 h-5 fill-gray-200" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
        </svg>
    </a>
</div>

