<?php

namespace App\Http\Controllers;

use App\Master;
use Illuminate\Http\Request;

class masterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $master = Master::all();
        return view('master.index', compact('master'));
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
    //create peserta
    Master::create([
        'seri' => $request->seri,
        'merk' => $request->merk,
        'layar' => $request->layar,
        'kamera_depan' => $request->kamera_depan,
        'kamera_belakang' => $request->kamera_belakang,
        'tanggal' => $request->tanggal,
    ]);

    return redirect('/master')->with('status','Data Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function show(Master $master)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function edit(Master $master)
    {
        // dd($master);

        return view('master.edit',compact('master'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Master $master)
    {
         Master::where('id', $master->id)->update([
            'seri' => $request->seri,
            'merk' => $request->merk,
            'layar' => $request->layar,
            'kamera_depan' => $request->kamera_depan,
            'Kamera_belakang' => $request->kamera_belakang,
            'tanggal' => $request->tanggal,
        ]);

        return redirect('/master')->with('status','Data Berhasi Diubah!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Master  $master
     * @return \Illuminate\Http\Response
     */
    public function destroy(Master $master)
    {
        Master::destroy($master->id);

        return redirect('/master')->with('status','Data Berhasi Dihapus!');
    }
}
