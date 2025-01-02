<?php

namespace App\View\Components\Programme;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EventCard extends Component
{
    public $event;

    public function __construct($event)
    {
        $this->event = $event;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.programme.event-card');
    }
}
