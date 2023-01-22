<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GameLink extends Component
{

    public $link;
    public $purple;
    public $red;

    public function __construct($purple, $red, $link)
    {
        $this->purple = $purple;
        $this->red = $red;
        $this->link = $link;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.game-link');
    }
}
