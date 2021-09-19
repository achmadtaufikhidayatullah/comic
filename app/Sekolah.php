<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{

	protected $table = 'sekolah';
	protected $fillable =['nama_sekolah','id_tingkat'];

	public function peserta(){
    	return $this->hasMany(Peserta::class);
	}

	public function tingkat(){
		return $this->hasOne(Tingkat::class);
	}
}
