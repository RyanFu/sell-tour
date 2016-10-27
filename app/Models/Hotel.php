<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
	protected $table = 'foods';
    public function place(){
    	return $this->belongsTo('App\Place');
    }
}
