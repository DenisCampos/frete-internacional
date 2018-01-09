<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ItensPedidoRepository;
use App\Models\ItemPedido;
use App\Validators\ItensPedidoValidator;

/**
 * Class ItensPedidoRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ItensPedidoRepositoryEloquent extends BaseRepository implements ItensPedidoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ItemPedido::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
