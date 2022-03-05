<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    public function index()
    {
        return view('_dashboard');
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
