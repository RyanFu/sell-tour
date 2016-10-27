<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
	protected $table = 'foods';
    public function places()
    {
        return $this->morphToMany('App\Place', 'placeable');
    }
}
