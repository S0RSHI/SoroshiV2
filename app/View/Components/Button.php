<?php

namespace App\View\Components;

use Illuminate\View\Component;

class button extends Component
{


    // @return boolean
    public $purple;
    public $red;

    public function __construct($purple, $red)
    {
        $this->purple = $purple;
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
