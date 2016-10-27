<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Tour extends Model
{
	use Sluggable;
	protected $table = 'tours';
    public function place(){
    	return $this->belongsTo('App\Place');
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
