<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Banner::where('deleted_at', null)->get();
        return view('_banner', compact('data'));
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
            'imgs' => 'required',
        ]);
        $img = serialize($request->imgs);

        $founder = new Banner;
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
        $data = Banner::findOrFail($id);
        return view('_editBanner', compact('data'));
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
            'img' => $img,
        ];
        
        DB::transaction(function () use($data, $id) {
            Banner::findOrFail($id)->update($data);
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
        $banner = Banner::findOrFail($id);

        $img = unserialize($banner->img);
        if ($img != null) {
            for ($i=0; $i < count($img); $i++) { 
                $fileName = public_path('images/').$img[$i];
                unlink($fileName);
            }
        }
        
        DB::transaction(function () use ($banner) {
            $banner->delete();
        });

        Alert::success('Deleted', 'Data deleted successfully');
        return redirect('index-banner');
    }

    public function getBannerImg($id)
    {
        $data = Banner::findOrFail($id)->img;
        $data = unserialize($data);
        return response()->json($data);
    }
}
