<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JuriLomba extends Model
{
    protected $table = 'juri_lomba';
    protected $fillable = ['id_peserta','id_lomba'];

    public function juri(){
    	return $this->belongsTo(Juri::class);
    }

    public function lomba(){
    	return $this->hasOne(Lomba::class);
    }
}
