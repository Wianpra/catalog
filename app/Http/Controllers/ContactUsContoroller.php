<?php

namespace App\Http\Controllers;

use App\mainCategories;
use Illuminate\Http\Request;
use App\SocialMedia;
use Laravel\Ui\Presets\React;
use RealRashid\SweetAlert\Facades\Alert;

class ContactUsContoroller extends Controller
{
    public function index()
    {
        $data = SocialMedia::all();
        return view('contactUs', compact('data'));
    }

    public function admin()
    {
        return view('_sosmed');
    }

    public function getSosmed()
    {
        $sosmed = SocialMedia::all();
        $main_category = mainCategories::all();
        $data = [$sosmed, $main_category];
        return response()->json($data);
    }

    public function storeSosmed(Request $request)
    {
        dd($request->all());
        $request->validate([
            'nama' => 'required',
            'content' => 'required', 
            'user' => 'required',
        ]);

        for ($i=0; $i < count($request->nama) ; $i++) { 
            if ($request->data[$i] != 'new') {
                if ($request->nama[$i] == 'Whatsapp') {
                    SocialMedia::findOrFail($request->data[$i])->update([
                        'nama' => $request->nama[$i],
                        'content' => $request->content[$i],
                        'fungsi' => $request->function[$i],
                        'username' => $request->user[$i],
                    ]);
                }elseif ($request->nama[$i] != 'Whatsapp') {
                    SocialMedia::findOrFail($request->data[$i])->update([
                        'nama' => $request->nama[$i],
                        'content' => $request->content[$i],
                        'username' => $request->user[$i],
                    ]);
                }
            } elseif($request->data[$i] == 'new') {
                $sosmed = new SocialMedia;
                $sosmed->nama = $request->nama[$i];
                $sosmed->content = $request->content[$i];
                $sosmed->fungsi = $request->function[$i];
                $sosmed->username = $request->user[$i];
                $sosmed->save();
            }
        }

        Alert::success('Success!', 'Save Success');
        return back();
    }
}
