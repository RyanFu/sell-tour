<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Cviebrock\EloquentSluggable\Sluggable;

class Hotel extends Model implements Transformable
{
    use TransformableTrait;

    use Sluggable;
	protected $table = 'hotels';
    protected $fillable = [
        'place_id' ,'name', 'price', 'address', 'rating', 'lat', 'lng',
    ];
    public function place(){
    	return $this->belongsTo('App\Models\Place');
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
