<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;
class CourseController extends Controller
{
    // public route for frontend
    // List of all courses
    public function index()
    {
        $courses = Course::latest()->paginate(10);
        $categories = Category::all();
        return view('courses.index', compact('courses', 'categories'));
    }
}
