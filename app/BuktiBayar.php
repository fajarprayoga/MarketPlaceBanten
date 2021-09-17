<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuktiBayar extends Model
{
    protected $table = 'order_bukti_bayar';

    protected $fillable = [
    	'order_ids',
    	'images'
    ];
}
