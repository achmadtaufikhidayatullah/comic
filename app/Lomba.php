<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lomba extends Model
{
    protected $table = 'lomba';
    protected $fillable = ['mata_lomba'];

    public function pesertalomba(){
    	return $this->belongsTo(PesertaLomba::class);
    }

    public function JuriLomba(){
    	return $this->belongsToMany(JuriLomba::class);
    }

    public function kriteria(){
    	return $this->hasMany(Kriteria::class);
    }
}
