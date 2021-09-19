<?php

namespace App\Http\Controllers;

use App\Lomba;
use App\Tingkat;
use Illuminate\Http\Request;

class LombaControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lomba = Lomba::all();

        return view('lomba/index', compact('lomba'));
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

        $lomba = new Lomba;
        $lomba->mata_lomba = $request->mata_lomba;
        $lomba->id_tingkat = $request->id_tingkat;
        $lomba->save();

        return redirect('/lomba')->with('status','Data Berhasi Ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lomba  $lomba
     * @return \Illuminate\Http\Response
     */
    public function show(Lomba $lomba)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lomba  $lomba
     * @return \Illuminate\Http\Response
     */
    public function edit(Lomba $lomba)
    {
        $tingkat = Tingkat::all();

        return view('lomba/edit', compact('lomba','tingkat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lomba  $lomba
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lomba $lomba)
    {
        Lomba::where('id', $lomba->id)->update([
            'mata_lomba' => $request->mata_lomba,
            'id_tingkat' => $request->id_tingkat
        ]);

        return redirect('/lomba')->with('status','Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lomba  $lomba
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lomba $lomba)
    {
        Lomba::destroy($lomba->id);

        return redirect('/lomba')->with('status','Data Berhasil Dihapus!');
    }

}
