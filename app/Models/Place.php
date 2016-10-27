<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
	protected $table = 'places';
    public function tours(){
    	return $this->hasMany('App\Tour');
    }

    public function hotels(){
    	return $this->hasMany('App\Tour');
    }

    public function experiences(){
    	return $this->morphedByMany('App\Experience', 'placeable');
    }

    public function foods(){
    	return $this->morphedByMany('App\Food', 'placeable');
    }

    public function experiences(){
    	return $this->morphedByMany('App\New', 'placeable');
    }
}
