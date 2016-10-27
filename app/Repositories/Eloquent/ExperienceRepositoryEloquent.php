<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\ExperienceRepository;
use App\Models\Experience;
use App\Validators\ExperienceValidator;

/**
 * Class ExperienceRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class ExperienceRepositoryEloquent extends BaseRepository implements ExperienceRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Experience::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
