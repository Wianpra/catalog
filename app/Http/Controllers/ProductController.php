<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\SocialMedia;
use App\mainCategories;
use App\ProductKnowledge;
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
        $id = null;
        $id_sub = null;
        $search_a = null;
        return view('product', compact('id', 'id_sub', 'search_a'));
    }

    public function category($id)
    {
        $id_sub = null;
        $search_a = null;
        return view('product', compact('id', 'id_sub', 'search_a'));
    }

    public function subCategory($id_sub)
    {
        $id = null;
        $search_a = null;
        return view('product', compact('id', 'id_sub', 'search_a'));
    }

    public function search(Request $request)
    {
        $id = null;
        $id_sub = null;
        $search_a = $request->search;
        return view('product', compact('id', 'id_sub', 'search_a'));
    }

    public function detail($id)
    {
        Product::findOrFail($id);

        $seen = Product::where('id', $id)->select('seen')->first();

        $id_main = Product::select('categories.main_category as id_main')
            ->join('categories', 'categories.id', '=' ,'products.category')
            ->first();
        $recomendation = Product::select('products.name as name', 'categories.category as category', 'products.img as img', 'products.id as id')
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

    public function getProduct($id)
    {
        $data = Product::findOrFail($id);
        return response()->json($data);
    }

    public function productKnowledge()
    {
        $seen = ProductKnowledge::where('deleted_at', null)->orderBy('seen', 'desc')->take(8)->get();
        return view('productKnowledge', compact('seen'));
    }

    public function detailKnowledge($id)
    {
        $data = ProductKnowledge::findOrFail($id);
        $seen = $data->seen + 1;
        $data->update([
            'seen' => $seen
        ]);
        $idCategory = Product::join('categories', 'products.category', '=', 'categories.id')->where('products.id', $data->id_product)->first()->main_category;
        $main_category = mainCategories::findOrFail($idCategory);
        $recomendation = ProductKnowledge::join('products', 'products.id', '=', 'product_knowledge.id_product')->join('categories', 'products.category', '=', 'categories.id')->where('product_knowledge.id', '!=', $id)->where('product_knowledge.deleted_at', null)->where('categories.main_category', $idCategory)->select('product_knowledge.id', 'product_knowledge.img', 'product_knowledge.title', 'product_knowledge.created_at')->latest('product_knowledge.created_at')->take(6)->get();
        return view('detailProductKnowledge', compact('data', 'main_category', 'recomendation'));
    }
}
