<?php

namespace App\Http\Controllers;

use App\Models\Program_event;
use Illuminate\Http\Request;

class ProgrammeItemController extends Controller
{
    //  Show the event profile
    public function show($programCode)
    {
        $bss_event = Program_event::where('programCode', $programCode)
            ->with('categories')
            ->with('partner')
            ->withCount('registrants')
            ->firstOrFail();
        return view('admin.programme.events-profile', [
            'bss_event' => $bss_event 
        ]);
    }

    public function eventProgramme($programCode) 
    {
        $event = Program_event::where('programCode', '=', $programCode)
            ->with('promotions', function ($query) {
                    return $query->where('startDate', '<=', now())
                        ->where('endDate', '>=', now())
                        ->where('isActive', true)
                        ->orderBy('arrangement', 'asc');
                })
            ->with('categories', function ($query) {
                return $query->select('name');
            })
            ->with('speakers')
            ->with('trainers')
            ->with('partner')
            ->first();

        return view('event-single', [ 
            'event' => $event, 
            'programType' => request()->segment(1)
        ]);
    }
}
