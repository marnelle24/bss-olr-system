<?php

namespace App\View\Components\utilities;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class calendarScheduleDate extends Component
{
    public $startDate;
    public $endDate;
    public $startTime;
    public $endTime;
    public $customDate;
    public $month;
    public $day;
    /**
     * Create a new component instance.
     */
    public function __construct($startDate, $endDate, $startTime, $endTime, $customDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
        $this->customDate = $customDate;
        $this->month = \Carbon\Carbon::parse($startDate)->format('M');
        $this->day = \Carbon\Carbon::parse($startDate)->format('d');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.utilities.calendar-schedule-date');
    }
}
