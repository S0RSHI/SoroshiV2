<?php

namespace App\View\Components;

use Illuminate\View\Component;

class button extends Component
{


    // @return boolean
    public $green;
    public $red;

    public function __construct($green, $red)
    {
        $this->green = $green;
        $this->red = $red;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button');
    }
}
