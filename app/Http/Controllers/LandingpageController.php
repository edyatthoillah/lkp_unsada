<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Testimonial;

class LandingpageController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->take(5)->get();
        $news = News::latest()->paginate(10);

        return view('welcome', compact('news', 'testimonials'));
    }
}
