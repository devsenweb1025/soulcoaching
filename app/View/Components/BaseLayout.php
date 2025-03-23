<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BaseLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render()
    {
        if (theme()->getOption('layout', 'base') === 'docs') {
            return view('layout/docs/master');
        }
        if (theme()->getOption('layout', 'base') === 'landing') {
            return view('layout/landing/master');
        }

        return theme()->getView('layout/master');
    }
}
