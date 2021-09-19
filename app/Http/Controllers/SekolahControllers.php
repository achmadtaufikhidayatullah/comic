<?php

namespace App\Http\Controllers;

use App\Sekolah;
use App\Tingkat;
use Illuminate\Http\Request;
use DB;

class SekolahControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sekolah = Sekolah::select(DB::raw("sekolah.id,nama_sekolah,tingkat"))
                    ->join('tingkat_sekolah', 'tingkat_sekolah.id','=','sekolah.id_tingkat')
                    ->get();

        $tingkat = Tingkat::all();


        return view('sekolah/index',compact('sekolah','tingkat'));
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
        Sekolah::create($request->all());

        return redirect('/sekolah')->with('status','Data Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function show(Sekolah $sekolah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function edit(Sekolah $sekolah)
    {
        $tingkat = Tingkat::all();

        return view('sekolah/edit', compact('sekolah','tingkat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sekolah $sekolah)
    {
        Sekolah::where('id', $sekolah->id)->update([
            'nama_sekolah' => $request->nama_sekolah,
            'id_tingkat' => $request->id_tingkat,
        ]);

        return redirect('/sekolah')->with('status','Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sekolah  $sekolah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sekolah $sekolah)
    {
        Sekolah::destroy($sekolah->id);

        return redirect('/sekolah')->with('status','Data Berhasil Dihapus!');
    }
}
