<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\PedidosRequest;
use App\Repositories\PedidosRepository;
use App\Repositories\PacotesRepository;


class PedidosController extends Controller
{

    protected $repository;
    private $pacotesrepository;


    public function __construct(PedidosRepository $repository, PacotesRepository $pacotesrepository){
        $this->repository = $repository;
        $this->pacotesrepository = $pacotesrepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = $this->repository->scopeQuery(function($query){
            return $query->WhereIn('status',[2,3,4,5,6]);
        })->findWhere(['user_id'=>Auth::user()->id]);
       
        return view('pedidos.index', compact('pedidos'));
    }

    public function aberto()
    {
        $pedidos = $this->repository->scopeQuery(function($query){
            return $query->WhereIn('status',[0,1]);
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

       // $pedidos = $this->repository->findWhereIn('status',[0,1,2])->findWhere(['user_id'=>Auth::user()->id]);
        return redirect()->to(route('pedidos.index'));
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
    public function destroy($id)
    {
        //
    }
}
