<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
	protected $table = 'experiences';
    public function places()
    {
        return $this->morphToMany('App\Place', 'placeable');
    }
}
