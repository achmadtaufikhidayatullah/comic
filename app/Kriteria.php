<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $table = 'kriteria';
    protected $fillable = ['kriteria','persentase','id_lomba'];

    public function lomba(){
    	return $this->belongsTo(Lomba::class);
    }
}
