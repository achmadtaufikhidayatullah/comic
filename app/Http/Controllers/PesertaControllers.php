<?php

namespace App\Http\Controllers;

use App\Peserta;
use App\Sekolah;
use App\lomba;
use App\PesertaLomba;
use App\Nilai;
use Illuminate\Http\Request;
use DB;

class PesertaControllers extends Controller
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
        $list_lomba = Lomba::all();
        $lomba = Lomba::all();
        $lomba2 = Lomba::all();

        return view('peserta/index',compact('data','lomba','sekolah','peserta_saja','lomba2','list_lomba'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sekolah = Sekolah::all();
        $lomba = Lomba::all();

        return view('peserta/create', compact('sekolah','lomba'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        //create peserta
        $peserta = Peserta::create([
            'nama_peserta' => $request->nama_peserta,
            'id_sekolah' => $request->id_sekolah
        ]);

        //create peserta_lomba
        PesertaLomba::create([
            'id_peserta' => $peserta->id,
            'id_lomba' => $request->id_matalomba
        ]);


         return redirect('/peserta')->with('status','Data Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function show($peserta)
    {
        $id_lomba = $peserta;
        $data = PesertaLomba::select(DB::raw('peserta_lomba.id, nama_peserta, nama_sekolah,mata_lomba'))
            ->join('peserta', 'peserta.id','=','peserta_lomba.id_peserta')
            ->join('sekolah','sekolah.id','=','peserta.id_sekolah')
            ->join('lomba','lomba.id','=','peserta_lomba.id_lomba')
            ->where('id_lomba',$id_lomba)
            ->orderBy('peserta.id','ASC')
            ->get();
        $peserta_saja = Peserta::all();
        $sekolah = Sekolah::all();
        $list_lomba = Lomba::all();
        $lomba = Lomba::all();
        $lomba2 = Lomba::all();

        return view('peserta/index',compact('data','lomba','sekolah','peserta_saja','lomba2','list_lomba'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function edit($p)
    {   
        $peserta_lomba = PesertaLomba::find($p);
        // dd($peserta_lomba);
        $peserta = Peserta::find($peserta_lomba->id_peserta);
        // dd($peserta);

        $sekolah = Sekolah::all();
        $lomba = Lomba::all();
        return view('peserta/edit', compact('peserta_lomba','peserta','sekolah','lomba','p'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peserta $peserta)
    {

        Peserta::where('id', $peserta->id)->update([
            'nama_peserta' => $request->nama_peserta,
            'id_sekolah' => $request->id_sekolah,
        ]);

        PesertaLomba::where('id',$request->id_pesertalomba)->update([
            'id_lomba' => $request->id_matalomba
        ]);


        return redirect('/peserta')->with('status','Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function destroy($p)
    {
        $peserta_lomba = PesertaLomba::find($p);       
        $peserta = Peserta::find($peserta_lomba->id_peserta);
        $nilai = Nilai::where('id_pesertalomba',$peserta_lomba->id)->delete();
        PesertaLomba::destroy($p);
        Peserta::destroy($peserta->id);
        // Peserta::destroy($peserta);

        return redirect('/peserta')->with('status','Data Berhasil Dihapus!');
    }
}
