<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LandingpageController extends Controller
{
    public function index()
    {
        $news = News::latest()->paginate(10);

        return view('welcome', compact('news'));
    }
}
