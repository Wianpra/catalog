<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\About;

class AboutUsHomeController extends Controller
{
    public function index()
    {
        $about = About::select('*')->first();
        $count = About::count();
        return view('about-us', compact('about', 'count'));
    }
}
