<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Product;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
        $img = serialize($request->imgs);

        $data = [
            'name' => $request->input('name'),
            'category' => $request->input('category'),
            'description' => $request->input('description'),
            'img' => $img,
        ];
        $saved = false;
        $saved = DB::transaction(function () use($data) {
            Product::create($data);
            return true;
        });
        if ($saved) {
            Alert::success('Success!', 'Data added successfully');
            return redirect('product-admin');
        } else {
            Alert::error('gagal!', 'data gagal di upload');
            return back();
        }
    }

    public function edit($id)
    {
        Product::findOrFail($id);
        $category = Category::all();
        $product = Product::where('id', $id)->select('*')->first();
        return view('_editProduct', compact('product', 'category'));
    }

    public function update(Request $request, $id)
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
        
        DB::transaction(function () use($data, $id) {
            Product::findOrFail($id)->update($data);
        });
        return redirect('product-admin');
    }

    public function storeGambar(Request $request)
    {
        $image = $request->file('file');
        $imageName = $image->getClientoriginalName();
        $image->move(public_path('images'), $imageName);
        return response()->json(['name' => $imageName]);
    }

    public function removeGambar(Request $request)
    {
        $fileName = public_path('images/').$_POST['name'];
        unlink($fileName);
        return response()->json(['name' => $_POST['name']]);
    }
    public function showImg($id)
    {
        $data = Product::findOrFail($id);
        $img = Product::select('*')->where('id', '=', $id)->first();
        return view('show-img', compact('img'));
    }
}
