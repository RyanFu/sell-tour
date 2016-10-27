<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class New extends Model
{
	protected $table = 'news';
    public function places()
    {
        return $this->morphToMany('App\Place', 'placeable');
    }
}
