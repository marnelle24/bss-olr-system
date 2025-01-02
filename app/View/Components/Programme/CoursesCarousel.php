<?php

namespace App\View\Components\Programme;

use Illuminate\View\Component;

class CoursesCarousel extends Component
{
    public $courses;

    public function __construct($courses)
    {
        $this->courses = $courses;
    }

    public function render()
    {
        return view('components.programme.courses-carousel');
    }
}
