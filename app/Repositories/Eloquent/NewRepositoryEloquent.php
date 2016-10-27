<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\NewRepository;
use App\Models\New;
use App\Validators\NewValidator;

/**
 * Class NewRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class NewRepositoryEloquent extends BaseRepository implements NewRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return New::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
