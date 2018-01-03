<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\User;

/**
 * Class UsuariosRepositoryRepositoryEloquent
 * @package namespace App\Repositories;
 */
class UsuariosRepositoryEloquent extends BaseRepository implements UsuariosRepository
{
    protected $fieldSearchable = [
        'name' => 'like',
        'email' => 'like'
    ];


    public function model()
    {
        return User::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
