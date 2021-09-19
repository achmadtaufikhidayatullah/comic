<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai';
    protected $fillable = ['id_pesertalomba','id_jurilomba','id_kriteria','nilai'];
    public $timestamps = false;
}
