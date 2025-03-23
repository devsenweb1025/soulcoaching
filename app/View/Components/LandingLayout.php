<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LandingLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render()
    {
        return view('layout/landing/master');
    }
}
