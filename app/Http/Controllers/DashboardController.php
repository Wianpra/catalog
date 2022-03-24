<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\mainCategories;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    public function index()
    {
        $main = mainCategories::all();
        $main2 = mainCategories::all();
        $sub = Category::all();
        $sum = Product::sum('seen');
        $seen = number_format($sum, 0, '.', '');
        $count_c = mainCategories::count();
        $count_s = Category::count();
        $count_p = Product::count();
        $product = Product::all();
        $category = Category::all();
        return view('_dashboard', compact('main','main2', 'sub', 'seen', 'count_p', 'count_c', 'count_s', 'product', 'category'));
    }
    
    public function profile()
    {
        return view('_profil');
    }
    public function editProfile($id)
    {
        $data = User::findOrFail($id);
        return response()->json($data);
    }
    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'email' => 'email',
        ]);

        if ($request->input('password') == null) {
            
            $data = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
            ];
        } else {
            
            $data = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ];
        }
        
        DB::transaction(function () use($data, $id) {
            User::findOrFail($id)->update($data);
        });
        Alert::success('Success!', 'Data Update Successfully');
        return redirect('profile-admin');
    }
}
