<?php

namespace App\View\Components\utilities;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class venueLocation extends Component
{
    public $venue;
    /**
     * Create a new component instance.
     */
    public function __construct($venue)
    {
        $this->venue = $venue;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.utilities.venue-location');
    }
}
