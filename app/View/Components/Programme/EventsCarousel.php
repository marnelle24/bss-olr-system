<?php

namespace App\View\Components\Programme;

use Illuminate\View\Component;

class EventsCarousel extends Component
{
    public $events;

    public function __construct($events)
    {
        $this->events = $events;
    }

    public function render()
    {
        return view('components.programme.events-carousel');
    }
}
