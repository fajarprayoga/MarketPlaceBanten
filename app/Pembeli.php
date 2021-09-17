<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    protected $fillable =[
    	'name',
    	'email',
    	'phone_no',
    	'address',
    	'password',
    	'origin_image'
    ];

    public function order()
    {
    	return $this->hasMany('App\Order','pembeli_id');
    }
}
