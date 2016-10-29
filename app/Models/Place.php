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
    	return $this->hasMany('App\Models\Tour');
    }

    public function hotels(){
    	return $this->hasMany('App\Models\Tour');
    }

    public function experiences(){
    	return $this->morphedByMany('App\Models\Experience', 'placeable');
    }

    public function foods(){
    	return $this->morphedByMany('App\Models\Food', 'placeable');
    }

}
