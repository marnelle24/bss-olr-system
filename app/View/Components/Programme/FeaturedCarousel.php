<?php

namespace App\View\Components\Programme;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FeaturedCarousel extends Component
{
    public $programmes;

    public function __construct($programmes)
    {
        $this->programmes = $programmes;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.programme.featured-carousel');
    }
}
