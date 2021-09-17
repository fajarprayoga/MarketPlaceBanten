<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable =[
    	'tgl_order',
    	'tgl_upakara',
    	'upakara_id',
    	'banten_id',
    	'pembeli_id',
        'harga',
    	'note',
    	'status'
    ];

    public function pembeli()
    {
    	return $this->belongsTo('App\Pembeli','pembeli_id');
    }

    public function banten()
    {
    	return $this->belongsTo('App\Banten','banten_id');
    }
}
