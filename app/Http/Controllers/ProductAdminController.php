<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\ProductKnowledge;
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

    public function viewDescription($id)
    {
        $data = Product::findOrFail($id);
        return response()->json($data);
    }

    public function saveDescription(Request $request, $id)
    {
        $request->validate([
            'description' => 'required|max:65535',
        ]);
        $data = [
            'description' => $request->input('description'),
        ];
        DB::transaction(function () use($data, $id) {
            Product::findOrFail($id)->update($data);
        });
        return response()->json();
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
        if ($img != null) {
            for ($i=0; $i < count($img); $i++) { 
                $fileName = public_path('images/').$img[$i];
                unlink($fileName);
            }
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

    public function getProduct()
    {
        $data = Product::all();
        return response()->json($data);

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

    public function productKnowledge()
    {
        $data = ProductKnowledge::all();
        return view('_productKnowledge', compact('data'));
    }

    public function storeKnowledge(Request $request)
    {
        $request->validate([
            'id_product' => 'required',
            'title' => 'required|max:255',
            'description' => 'required|max:65535',
        ]);
        $img = serialize($request->imgs);

        $knowledge = new ProductKnowledge;
        $knowledge->id_product = $request->id_product;
        $knowledge->title = $request->title;
        $knowledge->article = $request->description;
        $knowledge->img = $img;
        $knowledge->save();
        return response()->json();
    }

    public function editKnowledge($id)
    {
        $data = ProductKnowledge::findOrFail($id);
        return view('_editProductKnowledge', compact('data'));
    }

    public function updateKnowledge(Request $request, $id)
    {
        $img = serialize($request->imgs);
        $data = [
            'id_product' => $request->input('id_product'),
            'title' => $request->input('title'),
            'article' => $request->input('description'),
            'img' => $img,
        ];
        
        DB::transaction(function () use($data, $id) {
            ProductKnowledge::findOrFail($id)->update($data);
        });

        return response()->json();
    }

    public function deleteKnowledge($id)
    {
        $knowledge = ProductKnowledge::findOrFail($id);

        $img = unserialize($knowledge->img);
        if ($img != null) {
            for ($i=0; $i < count($img); $i++) { 
                $fileName = public_path('images/').$img[$i];
                unlink($fileName);
            }
        }
        
        DB::transaction(function () use ($knowledge) {
            $knowledge->delete();
        });
        
        Alert::success('Deleted', 'Data deleted successfully');
        return redirect('productKnowledge');
    }

    public function getKnowledge($id)
    {
        $data = ProductKnowledge::findOrFail($id);
        return response()->json($data);
    }

    public function getKnowledgeImg($id)
    {
        $data = ProductKnowledge::findOrFail($id);
        $data = unserialize($data->img);
        return response()->json($data);
    }
}
