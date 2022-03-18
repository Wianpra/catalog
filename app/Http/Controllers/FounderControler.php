<?php

namespace App\Http\Controllers;

use App\Founder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class FounderControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Founder::where('deleted_at', null)->get();
        return view('_founderIndex', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required|max:255',
        ]);
        $img = serialize($request->imgs);

        $founder = new Founder;
        $founder->name = $request->name;
        $founder->position = $request->position;
        $founder->img = $img;
        $founder->save();
        return response()->json();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Founder::findOrFail($id);
        return view('_editFounder', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $img = serialize($request->imgs);
        $data = [
            'name' => $request->input('name'),
            'position' => $request->input('position'),
            'img' => $img,
        ];
        
        DB::transaction(function () use($data, $id) {
            Founder::findOrFail($id)->update($data);
        });

        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $founder = Founder::findOrFail($id);

        $img = unserialize($founder->img);
        if ($img != null) {
            for ($i=0; $i < count($img); $i++) { 
                $fileName = public_path('images/').$img[$i];
                unlink($fileName);
            }
        }
        
        DB::transaction(function () use ($founder) {
            $founder->delete();
        });

        Alert::success('Deleted', 'Data deleted successfully');
        return redirect('founder-index');
    }

    public function getFounderImg($id)
    {
        $data = Founder::findOrfail($id)->img;
        $data = unserialize($data);
        return response()->json($data);
    }
}
