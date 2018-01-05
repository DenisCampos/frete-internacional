<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PacotesRepository;
use App\Models\Pacote;
use App\Validators\PacotesRepositoryValidator;

/**
 * Class PacotesRepositoryRepositoryEloquent
 * @package namespace App\Repositories;
 */
class PacotesRepositoryEloquent extends BaseRepository implements PacotesRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Pacote::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
