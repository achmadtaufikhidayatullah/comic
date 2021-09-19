<?php

namespace App\Http\Controllers;

use App\Kriteria;
use App\Lomba;
use DB;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriteria = Kriteria::select(DB::raw('kriteria.id, kriteria , persentase , mata_lomba'))
            ->join('lomba', 'lomba.id','=', 'kriteria.id_lomba')
            ->orderBy('lomba.id','ASC')
            ->get();

        $lomba = Lomba::all();

        return view('kriteria/index', compact('kriteria','lomba'));
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
        Kriteria::create($request->all());

        return redirect('/kriteria')->with('status','Data Berhasi Ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function show(Kriteria $kriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function edit(Kriteria $kriteria)
    {
        $lomba = Lomba::all();

        return view('kriteria/edit', compact('lomba','kriteria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kriteria $kriteria)
    {
        Kriteria::where('id', $kriteria->id)->update([
            'kriteria' => $request->kriteria,
            'persentase' => $request->persentase,
            'id_lomba' => $request->id_lomba
        ]);

        return redirect('/kriteria')->with('status','Data Berhasi Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kriteria $kriteria)
    {
        Kriteria::destroy($kriteria->id);

        return redirect('/kriteria')->with('status','Data Berhasi Dihapus!');
    }
}
