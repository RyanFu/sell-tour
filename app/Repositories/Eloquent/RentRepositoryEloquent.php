<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\RentRepository;
use App\Models\Rent;
use App\Validators\RentValidator;

/**
 * Class RentRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class RentRepositoryEloquent extends BaseRepository implements RentRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Rent::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
