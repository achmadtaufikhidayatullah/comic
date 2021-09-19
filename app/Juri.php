<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Juri extends Model
{
    protected $table = 'juri';
    protected $fillable = ['nama_juri','id_user'];

    public function jurilomba(){
    	return $this->hasMany(JuriLomba::class);
    }
}
