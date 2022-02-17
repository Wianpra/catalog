<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryAdminController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('_category', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|unique:categories|max:255',
        ]);
        $data = [
            'category' => $request->input('category'),
        ];
        DB::transaction(function () use($data) {
            Category::create($data);
        });
        Alert::success('Success!', 'Data added successfully');
        return back();
    }
    

    public function edit($id)
    {
        $data = Category::find($id);
        $category = Category::select('*')->where('id', '=', $id)->first();
        return view('setup-edit-category', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required|unique:categories|max:255',
        ]);
        Category::where('id', $id)->update([
            'category' => $request->category,
        ]);
    }
}
