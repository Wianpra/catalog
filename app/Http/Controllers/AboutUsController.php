<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\About;
use App\Core;
use App\Management;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class AboutUsController extends Controller
{
    public function index()
    {
        $about = About::select('*')->first();
        $count = About::count();
        $core = Core::all();
        $count_b = Core::count();
        return view('_about-us', compact('about', 'count', 'core', 'count_b'));
    }

    public function getDataCore($id)
    {
        $data = Core::findOrFail($id);
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:65535',
            'text' => 'required|max:255',
        ]);
        $data = [
            'name' => $request->input('name'),
            'text' => $request->input('text'),
        ];
        DB::transaction(function () use($data) {
            Core::create($data);
        });
        Alert::success('Success', 'Data added successfully');
        return response()->json();
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:65535',
            'text' => 'required|max:255',
        ]);
        $data = [
            'name' => $request->input('name'),
            'text' => $request->input('text'),
        ];
        DB::transaction(function () use($data, $id) {
            Core::findOrFail($id)->update($data);
        });
        Alert::success('Success', 'Data update successfully');
        return response()->json();
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

    public function indexManagement()
    {
        $data = Management::where('deleted_at', null)->get();
        return view('_management', compact('data'));
    }

    public function storeManagement(Request $request)
    {
        $request->validate([
            'imgs' => 'required',
        ]);
        $img = serialize($request->imgs);

        $founder = new Management;
        $founder->img = $img;
        $founder->save();
        return response()->json();
    }

    public function editManagement($id)
    {
        $data = Management::findOrFail($id);
        return view('_editManagement', compact('data'));
    }

    public function updateManagemnt(Request $request, $id)
    {
        $img = serialize($request->imgs);
        $data = [
            'img' => $img,
        ];
        
        DB::transaction(function () use($data, $id) {
            Management::findOrFail($id)->update($data);
        });

        return response()->json();
    }

    public function destroyManagement($id)
    {
        $management = Management::findOrFail($id);

        $img = unserialize($management->img);
        if ($img != null) {
            for ($i=0; $i < count($img); $i++) { 
                $fileName = public_path('images/').$img[$i];
                unlink($fileName);
            }
        }
        
        DB::transaction(function () use ($management) {
            $management->delete();
        });

        Alert::success('Deleted', 'Data deleted successfully');
        return redirect('index-management');
    }

    public function getManagementImg($id)
    {
        $data = Management::findOrFail($id)->img;
        $data = unserialize($data);
        return response()->json($data);
    }
}
