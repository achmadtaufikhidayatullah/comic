<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    protected $table = 'master';
    protected $fillable = ['seri','merk','layar','kamera_depan','kamera_belakang','tanggal'];
    public $timestamps = false;
}
