<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peserta;
use App\Sekolah;
use App\lomba;
use App\PesertaLomba;
use App\Nilai;
use DB;


class DashboardController extends Controller
{
    public function index(){
    	$lomba = Lomba::all();
    	$PesertaLomba = PesertaLomba::all();

    	$count_lomba = count($lomba);
    	$count_peserta = count($PesertaLomba);
    	$categories = [];
    	$data = [];

    	foreach($lomba as $lomba){
    		$jumlah_data = [];
    		$categories[] = $lomba->mata_lomba;
    		$jumlah = PesertaLomba::select(DB::raw('peserta_lomba.*'))
    			->where('id_lomba',$lomba->id)
    			->get();
    		foreach($jumlah as $j){
    			$jumlah_data[] = $j->id; 
    		}
    		$count = count($jumlah_data);
    		$data[] = $count;
    	}


    	// dd($count_peserta);

    	return view('welcome',compact('categories','data','count_lomba','count_peserta'));
    }
}
