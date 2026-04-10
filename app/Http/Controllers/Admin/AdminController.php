<?php

namespace App\Http\Controllers\Admin;
use App\Models\News;
use App\Models\Tutor;
use App\Models\Testimonial;
use App\Models\Program;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function dashboard()
    {  
        $countNews = News::count();
        $countTestimonial = Testimonial::count();
        $countTutors = Tutor::count();
        $countPrograms = Program::count();
        return view('admin.dashboard', compact('countNews', 'countTestimonial', 'countTutors', 'countPrograms'));
    }
}
