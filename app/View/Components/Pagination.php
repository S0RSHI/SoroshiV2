<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Pagination extends Component
{
     /**
     * Array of items.
     *
     * @var array
     */
    public $items;

    /**
     * Create a new component instance.
     *
     * @param array
     * @return void
     */
    public function __construct($items)
    {
        $this->items = $items;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.pagination');
    }
}
