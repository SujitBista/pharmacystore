<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillbale = [
    	'qty',
    	'price',
    	'customer_id',
    	'customer_comment',
        'addmedicine_id',
    ];

    protected $guarded = [
        'medicinename'
    ];

    public function customer(){
    	return $this->belongsTo('App\Customer');
    }

    public function addmedicine(){
        return $this->belongsTo('App\AddMedicine');
    }
}
