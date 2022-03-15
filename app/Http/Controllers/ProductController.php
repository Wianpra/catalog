<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\SocialMedia;
use App\mainCategories;
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

    public function getMain()
    {
        $data1 = mainCategories::all();
        $data2 = Category::all();
        $data = [$data1, $data2];
        return response()->json($data);
    }

    public function index()
    {
        return view('product');
    }

    public function detail($id)
    {
        Product::findOrFail($id);

        $seen = Product::where('id', $id)->select('seen')->first();

        $id_main = Product::select('categories.main_category as id_main')
            ->join('categories', 'categories.id', '=' ,'products.category')
            ->first();
        $recomendation = Product::select('products.name as name', 'categories.category as category', 'products.img as img')
            ->join('categories', 'categories.id', '=' ,'products.category')
            ->where('categories.main_category', $id_main->id_main)
            ->take(4)
            ->get();
        Product::where('id', $id)->update([
            'seen' => $seen->seen+1,
        ]);
        $data = SocialMedia::all();
        $product = Product::where('id', $id)->first();
        $category = Category::all();
        return view('product-detail', compact('product', 'category', 'data', 'recomendation'));
    }
}
