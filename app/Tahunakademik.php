<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tahunakademik extends Model
{
    protected $table = 'tahunakademik';
    protected $fillable = ['kode_tahun_akademik','tahun_akademik','status'];

    function getStatusAttribute($value){
    	return $value=='y'?'Aktif' : 'Tidak Aktif';
    }
}
