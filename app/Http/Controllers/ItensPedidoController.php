<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ItensPedidoRequest;
use App\Repositories\ItensPedidoRepository;
use App\Repositories\PedidosRepository;

class ItensPedidoController extends Controller
{

    protected $repository;
    private $pedidosrepository;

    public function __construct(ItensPedidoRepository $repository, PedidosRepository $pedidosrepository){
        $this->repository = $repository;
        $this->pedidosrepository = $pedidosrepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($pedido)
    {
        $itens = $this->repository->findWhere(['pedido_id' => $pedido]);

        return view('itenspedido.index', compact('itens','pedido'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($pedido)
    {
        return view('itenspedido.create', compact('pedido'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $pedido)
    {
        $request['pedido_id'] = $pedido;
        $this->repository->create($request->all());
        //$url = $request->get('redirect_to', route('pacotes.show'));
        $request->session()->flash('message', 'Item adicionado com sucesso.');
        return redirect()->to(route('itenspedido.index', ['pedido'=> $pedido]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($pedido,$id)
    {
        $this->repository->delete($id);
        \Session::flash('message', 'Item excluído com sucesso.');
        //$url = $request->get('redirect_to', route('pacotes.show'));

        return  redirect()->to(route('itenspedido.index',compact('pedido')));
    }
}
