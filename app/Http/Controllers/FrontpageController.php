<?php

namespace App\Http\Controllers;

use App\Models\Programme;
use Illuminate\Http\Request;
use App\Models\Program_event;

class FrontpageController extends Controller
{

    public function index()
    {
        // get the latest 5 active events
        $programEvents = Programme::where('status', 'active')
            ->where('activeUntil', '>=', date('Y-m-d'))
            ->where('searchable', 1)
            ->where('publishable', 1)
            ->where('programmeType', 'event')
            ->orderBy('startDate', 'desc')
            ->with('promotions')
            ->limit(5)
            ->get();

        // get the latest 5 active courses
        $programCourses = Programme::where('status', 'active')
            ->where('activeUntil', '>=', date('Y-m-d'))
            ->where('searchable', 1)
            ->where('publishable', 1)
            ->where('programmeType', 'course')
            ->with('promotions')
            ->orderBy('startDate', 'desc')
            ->limit(5)
            ->get();        

        return view('frontpage', [
            'events' => $programEvents,
            'courses' => $programCourses
        ]);
    }
}
