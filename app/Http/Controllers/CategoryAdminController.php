<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryAdminController extends Controller
{
    public function index()
    {
        return view('_category');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|unique:categorys|max:255',
        ]);
        dd($request->all());
    }
}
