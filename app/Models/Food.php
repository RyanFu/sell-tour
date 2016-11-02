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
    protected $fillable = [
        'place_id' ,'name', 'price', 'address', 'description', 'rating', 'lat', 'lng', 'slug', 'meta_description', 'meta_keywords',
    ];
    public function places()
    {
        return $this->morphToMany('App\Models\Place', 'placeable');
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
