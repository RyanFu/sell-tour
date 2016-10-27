<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Cviebrock\EloquentSluggable\Sluggable;

class Food extends Model implements Transformable
{
    use TransformableTrait;

    use Sluggable;
	protected $table = 'foods';
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
