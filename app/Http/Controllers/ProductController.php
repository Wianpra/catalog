<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\SocialMedia;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function home()
    {
        $top = Product::orderBy('seen', 'desc')->take(3)->get();
        $new = Product::orderBy('created_at', 'asc')->take(3)->get();
        $data = SocialMedia::all();
        return view('index', compact('top', 'data', 'new'));
    }

    public function index()
    {
        return view('product');
    }

    public function detail($id)
    {
        Product::findOrFail($id);

        $seen = Product::where('id', $id)->select('seen')->first();
        
        Product::where('id', $id)->update([
            'seen' => $seen->seen+1,
        ]);
        $data = SocialMedia::all();
        $product = Product::where('id', $id)->first();
        $category = Category::all();
        return view('product-detail', compact('product', 'category', 'data'));
    }
}
