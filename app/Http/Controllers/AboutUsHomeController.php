<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\About;
use App\Core;

class AboutUsHomeController extends Controller
{
    public function index()
    {
        $about = About::select('*')->first();
        $count = About::count();
        return view('about-us', compact('about', 'count'));
    }

    public function core()
    {
        $core = Core::all();
        $count_b = Core::count();
        return view('core-value', compact('core', 'count_b'));
    }
}
