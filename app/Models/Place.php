<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Place extends Model implements Transformable
{
    use TransformableTrait;

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

}
