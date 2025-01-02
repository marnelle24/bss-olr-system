<?php

namespace App\Http\Controllers;

use App\Models\Program_event;
use Illuminate\Http\Request;

class FrontpageController extends Controller
{

    public function index()
    {
        // get the latest 5 active events
        $programEvents = Program_event::where('status', 'active')
            ->where('activeUntil', '>=', date('Y-m-d'))
            ->where('searchable', 1)
            ->where('publishable', 1)
            ->with('promotions')
            ->orderBy('startDate', 'desc')
            ->limit(5)
            ->get();


        // get the latest 5 active courses
        $programCourses = Program_event::where('status', 'active')
            ->where('activeUntil', '>=', date('Y-m-d'))
            ->where('searchable', 1)
            ->where('publishable', 1)
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
