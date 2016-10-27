<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Experience extends Model
{
	use Sluggable;
	protected $table = 'experiences';


    public function places()
    {
        return $this->morphToMany('App\Place', 'placeable');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
