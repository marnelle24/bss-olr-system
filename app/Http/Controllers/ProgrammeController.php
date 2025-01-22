<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Category;
use App\Models\Programme;
use Illuminate\Http\Request;

class ProgrammeController extends Controller
{
    public function index($programmeType)
    {
        $type = '';

        if($programmeType == 'course' || $programmeType == 'courses')
            $type = 'course';
        else if($programmeType == 'event' || $programmeType == 'events')
            $type = 'event';

        $programType = Program::where('name', $type)->first();

        if(!$programType)
            abort(404);
        
        $programmes = Programme::where('programmeType', $programType->slug)->get();

        $categories = Category::all();

        if($programType->slug == 'course')
            $view = 'courses.index';
        else
            $view = 'events.index';
        
        return view($view, compact('programmes', 'categories'));
    }
}
