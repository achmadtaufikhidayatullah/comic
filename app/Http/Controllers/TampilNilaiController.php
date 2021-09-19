<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nilai;
use App\JuriLomba;
use App\Juri;
use App\Lomba;
use App\Peserta;
use App\PesertaLomba;
use App\Kriteria;
use DB;

class TampilNilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lomb = Lomba::all();

        return view('user/nilai/index',compact('lomb'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Lomba $id)
    {
        $lomba = $id;
        $lomb = Lomba::all();

        $peserta = PesertaLomba::select(DB::raw('peserta_lomba.* , peserta.nama_peserta'))
            ->join('peserta','peserta.id','=','peserta_lomba.id_peserta')
            ->where('id_lomba', $lomba->id)
            ->get();

        $nilai_peserta = Nilai::select(DB::raw('nilai.*, peserta_lomba.* , peserta.nama_peserta'))
            ->join('peserta_lomba','peserta_lomba.id','=','nilai.id_pesertalomba')
            ->join('peserta','peserta.id','=','peserta_lomba.id_peserta')
            ->where([
                'peserta_lomba.id_lomba' => $lomba->id,
            ])
            ->get();
        
        $kriteria = Kriteria::where('id_lomba',$lomba->id)->get();

        $juri = JuriLomba::where('id_lomba','=',$lomba->id)->get();
        $jumlah_juri = count($juri);

        $nilai_kriteria = [];

        // mendapat nilai per kriteria dengan di jumlahkan sesaui banyak juri
        foreach($peserta as $p) {
            foreach($kriteria as $k) {
                $nilai_k = 0;
                
                $cek = Nilai::where('id_pesertalomba', $p->id)->get();
                if(count($cek) > 0){
                    foreach($nilai_peserta as $n) {
                        if($p->id == $n->id_pesertalomba){
                            if($k->id == $n->id_kriteria){
                                $nilai_k += $n->nilai;
                                $nilai_kriteria[$n->id_pesertalomba][$k->id] = $nilai_k;
                            }
                        }
                    }
                } else {
                    $nilai_kriteria[$p->id][$k->id] = 0;
                }
            }
        }

        // membagi nilai berdasarkan jumlah juri
        foreach($nilai_kriteria as $key => $value) {
            foreach($value as $k => $v) {
                if($v > 0) $nilai_kriteria[$key][$k] = $v / $jumlah_juri; 
            }
        }

        // dd($nilai_kriteria);

        // membagi nilai dengan bobot/kriteria
        foreach($peserta as $p) {
            $total = 0;
            
            foreach($kriteria as $k) {
                foreach($nilai_kriteria as $key => $n) {
                    $id_pesertalomba = $key;

                    foreach($n as $nk => $v) {
                        if($p->id == $id_pesertalomba){
                            if($k->id == $nk){
                                $v = $v * ($k->persentase / 100);
                                $total += $v;
                            }
                        }
                    }
                }
            }
            $p->total = $total;
        }

        $peserta = collect($peserta)->sortBy('total')->reverse();

        // dd($peserta);
        return view('user/nilai/nilai', compact('peserta','nilai_peserta','kriteria','nilai_kriteria','lomb','lomba'));
    }   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
