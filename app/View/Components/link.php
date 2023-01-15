<?php

namespace App\View\Components;

use Illuminate\View\Component;

class link extends Component
{
    // @return string
    public $href;

    // @return boolean
    public $green;
    public $red;

    public function __construct($href, $green, $red)
    {
        $this->href = $href;
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
        return view('components.link');
    }
}
