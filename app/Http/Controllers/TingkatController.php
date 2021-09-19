<?php

namespace App\Http\Controllers;

use App\Tingkat;
use Illuminate\Http\Request;

class TingkatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tingkat = Tingkat::all();

        return view('tingkat/index',compact('tingkat'));
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
        $tingkat = new Tingkat;
        $tingkat->tingkat = $request->tingkat;
        $tingkat->save();

        return redirect('/tingkat')->with('status','Data Berhasi Ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tingkat  $tingkat
     * @return \Illuminate\Http\Response
     */
    public function show(Tingkat $tingkat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tingkat  $tingkat
     * @return \Illuminate\Http\Response
     */
    public function edit(Tingkat $tingkat)
    {
        return view('tingkat/edit',compact('tingkat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tingkat  $tingkat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tingkat $tingkat)
    {
        Tingkat::where('id', $tingkat->id)->update([
            'tingkat' => $request->tingkat,
        ]);

        return redirect('/tingkat')->with('status','Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tingkat  $tingkat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tingkat $tingkat)
    {
        Tingkat::destroy($tingkat->id);

        return redirect('/tingkat')->with('status','Data Berhasil Dihapus!');
    }
}
