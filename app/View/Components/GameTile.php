<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GameTile extends Component
{
    /**
     * Array of items.
     *
     * @var object
     */
    public $item;

    /**
     * Create a new component instance.
     *
     * @param object
     * @return void
     */
    public function __construct($item)
    {
        $this->item = $item;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.game-tile');
    }
}
