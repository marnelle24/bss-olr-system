<?php

namespace App\Http\Controllers;

use App\Models\Program_event;
use Illuminate\Http\Request;

class ProgrammeItemController extends Controller
{
    public function index($programCode)
    {
        $bss_event = Program_event::where('programCode', $programCode)->first();

        // dd($bss_event);

        return view('admin.programme.events-profile', [
            'bss_event' => $bss_event 
        ]);
    }
}
