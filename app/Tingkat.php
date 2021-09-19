<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tingkat extends Model
{
    protected $table = 'tingkat_sekolah';

    protected $fillable = ['tingkat'];
}
