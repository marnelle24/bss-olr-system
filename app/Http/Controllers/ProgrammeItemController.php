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
}
