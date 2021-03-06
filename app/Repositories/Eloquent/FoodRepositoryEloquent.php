<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\FoodRepository;
use App\Models\Food;
use App\Validators\FoodValidator;

/**
 * Class FoodRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class FoodRepositoryEloquent extends BaseRepository implements FoodRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Food::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
