<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\About;
use App\Core;
use App\Management;

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

    public function management()
    {
        $data = Management::where('deleted_at', '=', null)->get();
        return view('management', compact('data'));
    }
}
