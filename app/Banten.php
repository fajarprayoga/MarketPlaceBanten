<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banten extends Model
{
    protected $fillable =[
    	'name',
    	'desciption',
        'harga',
    	'sequence',
    	'origin_image',
    ];

    public function order()
    {
    	return $this->hasMany('App\Banten','banten_id');
    }
}
