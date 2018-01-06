<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PedidosRepository;
use App\Models\Pedido;
use App\Validators\PedidosValidator;

/**
 * Class PedidosRepositoryEloquent
 * @package namespace App\Repositories;
 */
class PedidosRepositoryEloquent extends BaseRepository implements PedidosRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Pedido::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
