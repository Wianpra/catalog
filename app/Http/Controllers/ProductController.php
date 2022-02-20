<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
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
