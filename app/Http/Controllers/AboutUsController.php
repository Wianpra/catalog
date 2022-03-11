<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\About;
use Illuminate\Support\Facades\DB;
use PDF;

class AboutUsController extends Controller
{
    public function index()
    {
        $about = About::select('*')->first();
        $count = About::count();
        return view('_about-us', compact('about', 'count'));
    }
    
    public function getDataVisi($id)
    {
        $data = About::select('visi')->first();
        return response()->json($data);
    }
    public function getDataMisi($id)
    {
        $data = About::select('misi')->first();
        return response()->json($data);
    }
    public function getDataHistory($id)
    {
        $data = About::select('history')->first();
        return response()->json($data);
    }
    
    public function postDataVisi(Request $request, $id)
    {
        $request->validate([
            'visi' => 'required|max:65535',
        ]);
        $data = [
            'visi' => $request->input('visi'),
        ];
        DB::transaction(function () use($data, $id) {
            About::findOrFail($id)->update($data);
        });
        return response()->json();
    }
    public function postDataMisi(Request $request, $id)
    {
        $request->validate([
            'misi' => 'required|max:65535',
        ]);
        $data = [
            'misi' => $request->input('misi'),
        ];
        DB::transaction(function () use($data, $id) {
            About::findOrFail($id)->update($data);
        });
        return response()->json();
    }
    public function postDataHistory(Request $request, $id)
    {
        $request->validate([
            'history' => 'required|max:65535',
        ]);
        $data = [
            'history' => $request->input('history'),
        ];
        DB::transaction(function () use($data, $id) {
            About::findOrFail($id)->update($data);
        });
        return response()->json();
    }
    
    public function pdf()
    {
        $about = About::select('*')->first();
        $count = About::count();
        $pdf = PDF::loadView('history', compact('about', 'count'))->setPaper('A4','potrait');
        return $pdf->stream('history.pdf');
    }
}
