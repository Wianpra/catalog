<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\mainCategories;
use App\Product;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryAdminController extends Controller
{
    public function index()
    {
        $category = mainCategories::all();
        return view('_category', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'main_category' => 'required|unique:categories|max:255',
        ]);
        $data = [
            'main_category' => $request->input('category'),
        ];
        DB::transaction(function () use($data) {
            mainCategories::create($data);
        });
        Alert::success('Success!', 'Data added successfully');
        return back();
    }
    

    public function editMain($id)
    {
        $data = mainCategories::findOrFail($id);
        return response()->json($data);
    }

    public function editSub($id)
    {
        $category = Category::select('*')->where('main_category', $id)->get();
        $count = count($category);
        $data = [$category, $count];
        return response()->json($data);
    }

    public function editSubC($id)
    {
        $data = Category::findOrFail($id);
        return response()->json($data);
    }

    public function storeSub(Request $request)
    {
        $data = [
            'category' => $request->input('category'),
            'main_category' => $request->input('main_category'),
        ];
        DB::transaction(function () use($data) {
            Category::create($data);
        });
        Alert::success('Success!', 'Data added successfully');
        return back();
    }

    public function updateSub(Request $request, $id)
    {
        $request->validate([
            'category' => 'required|max:255',
        ]);
        Category::where('id', $id)->update([
            'category' => $request->category,
        ]);
        Alert::success('Success!', 'Data update successfully');
        return back();
    }
    public function updateMain(Request $request, $id)
    {
        $request->validate([
            'main_category' => 'required|max:255',
        ]);
        MainCategories::where('id', $id)->update([
            'main_category' => $request->main_category,
        ]);
        Alert::success('Success!', 'Data update successfully');
        return back();
    }

    public function deleteSub($id)
    {
        Product::findOrFail($id);
        $cek = Product::where('category', $id)->count();
        if ( $cek > 0 ) {
            alert()->showConfirmButton('Oke')
                ->error('Selected category is used! <br> You cant delete it!');
            return back();
        } else {
            $delete = Category::where('id', $id)->delete();
            Alert::success('Deleted', 'Data deleted successfully');
            return redirect('category-admin');
        }
        
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required|unique:categories|max:255',
        ]);
        Category::where('id', $id)->update([
            'category' => $request->category,
        ]);
        return back();
    }

    public function delete($id)
    {
        Product::findOrFail($id);
        $cek = Product::where('category', $id)->count();
        if ( $cek > 0 ) {
            alert()->showConfirmButton('Oke')
                ->error('Selected category is used! <br> You cant delete it!');
            return back();
        } else {
            $delete = Category::where('id', $id)->delete();
            Alert::success('Deleted', 'Data deleted successfully');
            return redirect('category-admin');
        }
        
    }
}
