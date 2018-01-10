<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\PedidosRequest;
use App\Repositories\PedidosRepository;
use App\Repositories\PacotesRepository;
use App\Repositories\ItensPedidoRepository;


class PedidosController extends Controller
{

    protected $repository;
    private $pacotesrepository;
    private $itenspedidorepository;


    public function __construct(PedidosRepository $repository, PacotesRepository $pacotesrepository, ItensPedidoRepository $itenspedidorepository){
        $this->repository = $repository;
        $this->pacotesrepository = $pacotesrepository;
        $this->itenspedidorepository = $itenspedidorepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = $this->repository->scopeQuery(function($query){
            return $query->WhereIn('status',[1,2,3,4,5,6]);
        })->findWhere(['user_id'=>Auth::user()->id]);
       
        return view('pedidos.index', compact('pedidos'));
    }

    public function aberto()
    {
        $pedidos = $this->repository->scopeQuery(function($query){
            return $query->WhereIn('status',[0]);
        })->findWhere(['user_id'=>Auth::user()->id]);
        return view('pedidos.abertos', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pacotes = $this->pacotesrepository->orderBy('titulo')->findWhere(['status'=>1]);
        return view('pedidos.create', compact('pacotes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($pacote)
    {
        $data['pacote_id'] = $pacote;
        $data['user_id'] = Auth::user()->id;
        $this->repository->create($data);
        \Session::flash('message', 'Pedido criado com sucesso.');

        return redirect()->to(route('pedidos.aberto'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedido = $this->repository->find($id);
        $itenspedido = $this->itenspedidorepository->findWhere(['pedido_id'=>$id]);
        return  view('pedidos.show', compact('pedido', 'itenspedido'));
    }

    public function enviar($id)
    {
        if($this->itenspedidorepository->findWhere(['pedido_id'=> $id])->count() > 0){
            $data['status'] = 1;
            $this->repository->update($data, $id);
            \Session::flash('message', 'Pedido enviado com sucesso.');
            return redirect()->action('PedidosController@aberto');
        }else{
            return redirect()->action('PedidosController@aberto');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pedido = $this->repository->find($id);
        $pacotes = $this->pacotesrepository->orderBy('titulo')->pluck('titulo', 'id');
        return view('pedidos.edit', compact('pedido', 'pacotes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $this->repository->update($data, $id);
        $request->session()->flash('message', ' Dados atualizados com sucesso.');
        return redirect()->action('PedidosController@aberto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->itenspedidorepository->deleteWhere(['pedido_id' => $id]);
        $this->repository->delete($id);
        \Session::flash('message', 'Pedido excluído com sucesso.');
        //$url = $request->get('redirect_to', route('pacotes.show'));

        return  redirect()->to(route('pedidos.aberto'));
    }
}
