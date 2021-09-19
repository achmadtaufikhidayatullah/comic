<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peserta;
use App\Sekolah;
use App\lomba;
use App\PesertaLomba;
use App\Nilai;
use DB;


class PesertaLombaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PesertaLomba::select(DB::raw('peserta_lomba.id, nama_peserta, nama_sekolah,mata_lomba'))
            ->join('peserta', 'peserta.id','=','peserta_lomba.id_peserta')
            ->join('sekolah','sekolah.id','=','peserta.id_sekolah')
            ->join('lomba','lomba.id','=','peserta_lomba.id_lomba')
            ->orderBy('peserta.id','ASC')
            ->get();
        $peserta_saja = Peserta::all();
        $sekolah = Sekolah::all();
        $lomba = Lomba::all();
        $lomba2 = Lomba::all();

        return view('peserta/hapuspeserta',compact('data','lomba','sekolah','peserta_saja','lomba2'));
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


        //create peserta_lomba
        PesertaLomba::create([
            'id_peserta' => $request->id_peserta,
            'id_lomba' => $request->id_matalomba
        ]);


         return redirect('/peserta')->with('status','Data Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PesertaLomba  $pesertaLomba
     * @return \Illuminate\Http\Response
     */
    public function show(PesertaLomba $pesertaLomba)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PesertaLomba  $pesertaLomba
     * @return \Illuminate\Http\Response
     */
    public function edit(PesertaLomba $pesertaLomba)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PesertaLomba  $pesertaLomba
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PesertaLomba $pesertaLomba)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PesertaLomba  $pesertaLomba
     * @return \Illuminate\Http\Response
     */
    public function destroy($p)
    {
        $peserta_lomba = PesertaLomba::find($p);       
        $nilai = Nilai::where('id_pesertalomba',$peserta_lomba->id)->delete();
        PesertaLomba::destroy($p);
        // Peserta::destroy($peserta);

        return redirect('/pesertalomba')->with('status','Data Berhasil Dihapus!');
    }
}
