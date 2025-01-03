<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Program_event;

class ProgrammeItemController extends Controller
{
    public function AllEvents()
    {
        return view('all-events', [
            'featuredEvents' => $this->featuredEvents()
        ]);
    }

    public function featuredEvents()
    {
        $programmes = [
            [
                'bgColor' => 'bg-orange-300',
                'title' => 'Mastering the Art of Cooking',
                'thumb' => 'https://www.biblesociety.sg/wp-content/uploads/2024/09/API-Workshops-Gen-Z-Generic-TN.jpg',
                'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
                'price' => 100,
                'programCode' => 'ewqwe131',
            ],
            [
                'bgColor' => 'bg-zinc-300',
                'title' => 'Mastering the Art of Running',
                'thumb' => 'https://www.biblesociety.sg/wp-content/uploads/2024/08/TN-D6-2025-updated.jpg',
                'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
                'price' => 40,
                'programCode' => 'vdfgdf323',
            ],
            [
                'bgColor' => 'bg-indigo-300',
                'title' => 'Mastering the Art of Yoga',
                'thumb' => 'https://www.biblesociety.sg/wp-content/uploads/2015/05/FA-Generic-TN-At-the-Crossroads.jpg',
                'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos.',
                'price' => 40,
                'programCode' => 'vdfgdf323',
            ],
        ];

        return $programmes;
    }

    //  ADMIN: Show the event profile
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
