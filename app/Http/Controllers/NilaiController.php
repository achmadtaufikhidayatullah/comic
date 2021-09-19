<?php

namespace App\Http\Controllers;

use App\Nilai;
use App\JuriLomba;
use App\Juri;
use App\Lomba;
use App\Peserta;
use App\PesertaLomba;
use App\Kriteria;
use DB;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = auth()->user()->id;
        $juri = Juri::where('id_user', $data)->first();
        $jurilomba = JuriLomba::where('id_juri', $juri->id)->get();
        $lomba =  Lomba::select(DB::raw('lomba.*, tingkat_sekolah.tingkat'))
            ->leftJoin('tingkat_sekolah','lomba.id_tingkat','=','tingkat_sekolah.id')
            ->get();

        return view('nilai/index', compact('lomba', 'jurilomba'));
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
        $juri = Juri::where('id_user', auth()->user()->id)->first();
        $jurilomba = JuriLomba::where(['id_juri' => $juri->id, 'id_lomba' => $request->id_lomba])->first();
        $lomba = Lomba::find($jurilomba->id_lomba);

        $id_jurilomba = $jurilomba->id;
        $id_lomba = $lomba->id;

        $nilai = $request->all();

        // dd($nilai);

        $kriteria = Kriteria::where('id_lomba', $id_lomba)->get();

        foreach($kriteria as $k) {
            foreach($nilai as $key => $value) {
                if($k->id == $key){
                    // $bobot = $value * ($k->persentase / 100);

                    // input nilai
                    Nilai::create([
                        'id_pesertalomba' => $request->id_pesertalomba,
                        'id_jurilomba' => $id_jurilomba,
                        'id_kriteria' => $k->id,
                        'nilai' => $value
                    ]);
                }
            }
        }


         return redirect()->back()->with('status','Nilai Berhasil Disimpan!');   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function show(Lomba $nilai)
    {
        $rank1 = [3,30,31];
        $lomba = $nilai;

        if(in_array($lomba->id, $rank1)){
            $status = 0;
            $lomba = Lomba::findOrFail($lomba->id);

            $peserta_clear = [];
            $peserta_lanjut = [];
            $babak = 1;

            $juri = Juri::where('id_user', auth()->user()->id)->first();
            $jurilomba = JuriLomba::where(['id_juri' => $juri->id, 'id_lomba' => $lomba->id])->first();
            $kriteria = Kriteria::where('id_lomba',$lomba->id)->get();
            $kriteria_lomba = 0;

            // dd($kriteria);
            $id_jurilomba = $jurilomba->id;

            $peserta = PesertaLomba::select(DB::raw('peserta_lomba.* , peserta.nama_peserta'))
                ->join('peserta','peserta.id','=','peserta_lomba.id_peserta')
                ->where('id_lomba', $lomba->id)
                ->get();

            $jumlah_peserta = count($peserta);

            $nilai = Nilai::select('id_pesertalomba')
                ->join('peserta_lomba','peserta_lomba.id','nilai.id_pesertalomba')
                ->groupBy('id_pesertalomba')
                ->where([
                    'peserta_lomba.id_lomba' => $lomba->id,
                    'nilai.id_jurilomba' => $id_jurilomba,
                ])
                ->get();

            foreach($nilai as $value) {
                $peserta_clear[] = $value->id_pesertalomba;
            }

            foreach($kriteria as $value) {
                $nilai_peserta = Nilai::select(DB::raw('nilai.*, peserta_lomba.* , peserta.nama_peserta'))
                ->join('peserta_lomba','peserta_lomba.id','=','nilai.id_pesertalomba')
                ->join('peserta','peserta.id','=','peserta_lomba.id_peserta')
                ->where([
                    'peserta_lomba.id_lomba' => $lomba->id,
                    'nilai.id_jurilomba' => $id_jurilomba,
                    'id_kriteria' => $value->id
                ])
                ->get();

                $jumlah_nilai = count($nilai_peserta);

                if($jumlah_peserta == $jumlah_nilai){
                    $peserta_clear = [];
                    $peserta_lanjut = [];

                    foreach($nilai_peserta as $value) {
                        if($value->nilai == 100){
                            $peserta_lanjut[] = $value->id_pesertalomba;
                        }
                    }

                    $babak++;
                } else if(count($peserta_lanjut) == $jumlah_nilai && $babak == 3) {
                    $peserta_clear = [];

                    $nilai = Nilai::select('id_pesertalomba')
                    ->join('peserta_lomba','peserta_lomba.id','nilai.id_pesertalomba')
                    ->groupBy('id_pesertalomba')
                    ->where([
                        'peserta_lomba.id_lomba' => $lomba->id,
                        'nilai.id_jurilomba' => $id_jurilomba,
                    ])
                    ->whereIn('id_pesertalomba', $peserta_lanjut)
                    ->orderBy('nilai','DESC')
                    ->limit(3)
                    ->get();

                    // dd($nilai);

                    $peserta_lanjut = [];

                    foreach($nilai as $value) {
                        $peserta_lanjut[] = $value->id_pesertalomba;
                    }

                    $babak++;
                } else if(count($peserta_lanjut) == $jumlah_nilai && $babak == 4) {
                    $babak++;
                } else if(count($peserta_lanjut) == $jumlah_nilai && $babak != 1){
                    $peserta_clear = [];
                    $peserta_lanjut = [];

                    foreach($nilai_peserta as $value) {
                        if($value->nilai == 100){
                            $peserta_lanjut[] = $value->id_pesertalomba;
                        }
                    }

                    $babak++;
                } else {
                    $kriteria = Kriteria::where('id', $value->id)->get();
                    $kriteria_lomba = $value->id;
                    break;
                }
            }

            // dd($kriteria_lomba);

            if($babak == 1){
                // dd($kriteria);
                $peserta = PesertaLomba::select(DB::raw('peserta_lomba.* , peserta.nama_peserta'))
                ->join('peserta','peserta.id','=','peserta_lomba.id_peserta')
                ->whereNotIn('peserta_lomba.id', $peserta_clear)
                ->where('id_lomba', $lomba->id)
                ->get();

                $nilai_peserta = Nilai::select(DB::raw('nilai.*, peserta_lomba.* , peserta.nama_peserta'))
                    ->join('peserta_lomba','peserta_lomba.id','=','nilai.id_pesertalomba')
                    ->join('peserta','peserta.id','=','peserta_lomba.id_peserta')
                    ->whereIn('id_pesertalomba', $peserta_clear)
                    ->where([
                        'peserta_lomba.id_lomba' => $lomba->id,
                        'nilai.id_jurilomba' => $id_jurilomba
                    ])
                    ->get();

            } else if($babak == 2) {
                // dd($kriteria);
                $nilai_peserta = Nilai::select(DB::raw('nilai.*, peserta_lomba.* , peserta.nama_peserta'))
                    ->join('peserta_lomba','peserta_lomba.id','=','nilai.id_pesertalomba')
                    ->join('peserta','peserta.id','=','peserta_lomba.id_peserta')
                    ->whereIn('id_pesertalomba', $peserta_lanjut)
                    ->where([
                        'peserta_lomba.id_lomba' => $lomba->id,
                        'nilai.id_jurilomba' => $id_jurilomba,
                        'id_kriteria' => $kriteria_lomba
                    ])
                    ->get();

                foreach($nilai_peserta as $value) {
                    $peserta_clear[] = $value->id_pesertalomba;
                }

                // dd($peserta_clear);

                $peserta = PesertaLomba::select(DB::raw('peserta_lomba.* , peserta.nama_peserta'))
                ->join('peserta','peserta.id','=','peserta_lomba.id_peserta')
                ->whereNotIn('peserta_lomba.id', $peserta_clear)
                ->whereIn('peserta_lomba.id', $peserta_lanjut)
                ->where('id_lomba', $lomba->id)
                ->get();
            } else if($babak == 3) {
                // dd($kriteria);
                $nilai_peserta = Nilai::select(DB::raw('nilai.*, peserta_lomba.* , peserta.nama_peserta'))
                    ->join('peserta_lomba','peserta_lomba.id','=','nilai.id_pesertalomba')
                    ->join('peserta','peserta.id','=','peserta_lomba.id_peserta')
                    ->whereIn('id_pesertalomba', $peserta_lanjut)
                    ->where([
                        'peserta_lomba.id_lomba' => $lomba->id,
                        'nilai.id_jurilomba' => $id_jurilomba,
                        'id_kriteria' => $kriteria_lomba
                    ])
                    ->get();

                foreach($nilai_peserta as $value) {
                    $peserta_clear[] = $value->id_pesertalomba;
                }

                // dd($peserta_clear);

                $peserta = PesertaLomba::select(DB::raw('peserta_lomba.* , peserta.nama_peserta'))
                ->join('peserta','peserta.id','=','peserta_lomba.id_peserta')
                ->whereNotIn('peserta_lomba.id', $peserta_clear)
                ->whereIn('peserta_lomba.id', $peserta_lanjut)
                ->where('id_lomba', $lomba->id)
                ->get();
            } else if($babak == 4) {
                // dd($kriteria);
                $nilai_peserta = Nilai::select(DB::raw('nilai.*, peserta_lomba.* , peserta.nama_peserta'))
                    ->join('peserta_lomba','peserta_lomba.id','=','nilai.id_pesertalomba')
                    ->join('peserta','peserta.id','=','peserta_lomba.id_peserta')
                    ->whereIn('id_pesertalomba', $peserta_lanjut)
                    ->where([
                        'peserta_lomba.id_lomba' => $lomba->id,
                        'nilai.id_jurilomba' => $id_jurilomba,
                        'id_kriteria' => $kriteria_lomba
                    ])
                    ->get();

                foreach($nilai_peserta as $value) {
                    $peserta_clear[] = $value->id_pesertalomba;
                }

                // dd($peserta_clear);

                $peserta = PesertaLomba::select(DB::raw('peserta_lomba.* , peserta.nama_peserta'))
                ->join('peserta','peserta.id','=','peserta_lomba.id_peserta')
                ->whereNotIn('peserta_lomba.id', $peserta_clear)
                ->whereIn('peserta_lomba.id', $peserta_lanjut)
                ->where('id_lomba', $lomba->id)
                ->get();
            } else if($babak == 5) {
                $status = 1;
            }
        } else {
            $status = 0;
            $peserta_clear = [];

            $juri = Juri::where('id_user', auth()->user()->id)->first();
            $jurilomba = JuriLomba::where(['id_juri' => $juri->id, 'id_lomba' => $lomba->id])->first();

            // dd($juri);
            $id_jurilomba = $jurilomba->id;

            $nilai = Nilai::select('id_pesertalomba')
                ->join('peserta_lomba','peserta_lomba.id','nilai.id_pesertalomba')
                ->groupBy('id_pesertalomba')
                ->where([
                    'peserta_lomba.id_lomba' => $lomba->id,
                    'nilai.id_jurilomba' => $id_jurilomba
                ])
                ->get();

            foreach($nilai as $value) {
                $peserta_clear[] = $value->id_pesertalomba;
            }

            $peserta = PesertaLomba::select(DB::raw('peserta_lomba.* , peserta.nama_peserta'))
                ->join('peserta','peserta.id','=','peserta_lomba.id_peserta')
                ->whereNotIn('peserta_lomba.id', $peserta_clear)
                ->where('id_lomba', $lomba->id)
                ->get();

            $nilai_peserta = Nilai::select(DB::raw('nilai.*, peserta_lomba.* , peserta.nama_peserta'))
                ->join('peserta_lomba','peserta_lomba.id','=','nilai.id_pesertalomba')
                ->join('peserta','peserta.id','=','peserta_lomba.id_peserta')
                ->whereIn('id_pesertalomba', $peserta_clear)
                ->where([
                    'peserta_lomba.id_lomba' => $lomba->id,
                    'nilai.id_jurilomba' => $id_jurilomba
                ])
                ->get();

            $kriteria = Kriteria::where('id_lomba',$lomba->id)->get();
        }

        return view('nilai/input', compact('lomba', 'peserta', 'kriteria', 'nilai', 'peserta_clear', 'nilai_peserta','status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function edit(Nilai $nilai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nilai $nilai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nilai $nilai)
    {
        //
    }
}
