<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Peserta extends Model
{
   protected $table = 'peserta';
   protected $fillable = ['nama_peserta','id_sekolah','id_matalomba'];


   public function sekolah(){
   	return $this->belongsTo(Sekolah::class);
   }

   public function pesertalomba(){
   	return $this->belongsTo(PesertaLomba::class);
   }
}
