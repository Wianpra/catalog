<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Product;
use RealRashid\SweetAlert\Facades\Alert;

class ProductAdminController extends Controller
{
    public function index()
    {
        $product = Product::select('products.name as name', 'products.img as img', 'products.id as id', 'categories.category as category', 'products.description', 'products.seen')
            ->join('categories', 'categories.id', '=', 'products.category')
            ->get();
        return view('_product', compact('product'));
    }
    public function create()
    {
        $category = Category::all();
        return view('_createProduct', compact('category'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'category' => 'required|max:255',
            'description' => 'required|max:65535',
        ]);
        $data = [
            'name' => $request->input('name'),
            'category' => $request->input('category'),
            'description' => $request->input('description'),
        ];
        DB::transaction(function () use($data) {
            Product::create($data);
        });
        Alert::success('Success!', 'Data added successfully');
        return redirect('product-admin');
    }
}
