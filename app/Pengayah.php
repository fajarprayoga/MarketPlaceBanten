<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengayah extends Model
{
    protected $table = 'pengayah';

    protected $fillable = [
    	'name',
    	'email',
    	'phone',
    	'address',
    	'password'
    ];
}
