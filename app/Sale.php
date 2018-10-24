<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillbale = [
    	'medicinename',
    	'qty',
    	'price',
    	'customer_id',
    	'customer_comment',
    ];

    public function customer(){
    	return $this->belongsTo('App\Customer');
    }
}
