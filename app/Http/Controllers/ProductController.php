<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function home()
    {
        $top = Product::orderBy('seen', 'desc')->take(3)->get();
        $discount = Product::orderBy('seen', 'desc')->take(1)->first();
        $new = Product::orderBy('created_at', 'asc')->take(3)->get();
        $newest = Product::orderBy('created_at', 'asc')->take(1)->first();
        return view('index', compact('top', 'discount', 'new', 'newest'));
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
        
        $product = Product::where('id', $id)->first();
        $category = Category::all();
        return view('product-detail', compact('product', 'category'));
    }
}
