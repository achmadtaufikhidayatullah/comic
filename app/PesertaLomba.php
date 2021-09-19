<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PesertaLomba extends Model
{
    protected $table = 'peserta_lomba';
    protected $fillable = ['id_peserta','id_lomba'];

    public function peserta(){
    	$this->hasOne(Peserta::class);
    }

    public function lomba(){
    	$this->hasOne(Lomba::class);
    }
}
