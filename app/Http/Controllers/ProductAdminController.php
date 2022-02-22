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
        $product = Product::all();
        $category = Category::all();
        return view('_product', compact('product', 'category'));
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
        DB::transaction(function () use($data) {
            Product::create($data);
        });
        
        return response()->json();
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

        $img = serialize($request->imgs);
        $data = [
            'name' => $request->input('name'),
            'category' => $request->input('category'),
            'description' => $request->input('description'),
            'img' => $img,
        ];
        
        
        
        DB::transaction(function () use($data, $id) {
            Product::findOrFail($id)->update($data);
        });
        return redirect('product-admin');
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);

        $img = unserialize($product->img);
        for ($i=0; $i < count($img); $i++) { 
            $fileName = public_path('images/').$img[$i];
            unlink($fileName);
        }
        
        DB::transaction(function () use ($product) {
            $product->delete();
        });
        
        Alert::success('Deleted', 'Data deleted successfully');
        return redirect('product-admin');
    }

    public function updateCategory(Request $request, $id)
    {
        $data = [
            'category' => $request->input('category'),
        ];
        DB::transaction(function () use($data, $id) {
            Product::findOrFail($id)->update($data);
        });
        Alert::success('Success!', 'Data Update Successfully');
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

    public function getImage($id)
    {
        $img = unserialize(Product::findOrFail($id)->img);
        $count = count($img);
        $data = [$img, $count];
        return response()->json($data);

    }

    public function deleteGambar($id, Request $request)
    {
        $product = Product::findOrFail($id);
        $data = unserialize($product->img);
        $imgs = array();
        $j = 0;
        for ($i=0; $i < count($data); $i++) { 
            if ($i != $request->name) {
                $imgs[$j] = $data[$i];
                $j++;
            }else {
                $img = $data[$i];
            }
        }

        $fileName = public_path('images/').$img;
        unlink($fileName);

        $params['img'] = serialize($imgs);
        DB::transaction(function () use ($params, $product) {
            $product->update($params);
        });
        return response()->json();
    }
}
