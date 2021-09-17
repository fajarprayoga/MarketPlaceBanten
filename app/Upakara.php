<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upakara extends Model
{
    protected $fillable =[
    	'name',
    	'description',
    	'sequence',
    	'origin_image'
    ];
}
