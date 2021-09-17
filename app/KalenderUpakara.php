<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KalenderUpakara extends Model
{
    protected $table = 'kalender_upakara';

    protected $fillable = [
    	'nama_upakara',
    	'tgl_mulai',
    	'tgl_selesai',
    	'notes'
    ];
}
