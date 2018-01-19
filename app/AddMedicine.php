<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddMedicine extends Model
{
    protected $table = 'addmedicines';

    protected $fillable = [ 
    			'code', 
    			'distributor_id',
    			'type',
    			'name',
    			'itemdescription',
    			'qty',
                'rate',
    			'pack',
    			'expdate',
    			'batchnumber',
    			'mrp'
    ];
}
