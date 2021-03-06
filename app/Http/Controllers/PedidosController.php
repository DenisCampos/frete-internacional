<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Mail\MailEnvioPedido;
use App\Mail\MailPedidoAtualizado;
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
            return $query->WhereIn('status',[1,2,3,4,5,6,7,8]);
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
            $data['endereco'] = Auth::user()->endereco;
            $data['bairro'] = Auth::user()->bairro;
            $data['numero'] = Auth::user()->numero;
            $data['complemento'] = Auth::user()->complemento;
            $data['cidade'] = Auth::user()->cidade;
            $data['uf'] = Auth::user()->uf;
            $data['pais'] = Auth::user()->pais;
            $data['cep'] = Auth::user()->cep;
            $this->repository->update($data, $id);
            $pedido = $this->repository->find($id);
            Mail::to('marcosdenersoshelp@gmail.com')->send(new MailEnvioPedido(Auth::user(), $pedido));
            \Session::flash('message', 'Pedido enviado com sucesso.');
        }

        return redirect()->action('PedidosController@aberto');

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


    //ADMIN
    public function admin($tipo)
    {
        if($tipo=='enviados'){
            $status = [1,2];
        }elseif($tipo=='andamentos'){
            $status = [3,4,5,6];
        }else{
            $status = [7,8];
        }

        $pedidos = $this->repository->findWhereIn('status',$status);
        return view('pedidos.admin', compact('pedidos','tipo'));
    }

    public function adminshow($tipo, $id)
    {
        $pedido = $this->repository->find($id);
        $itenspedido = $this->itenspedidorepository->findWhere(['pedido_id'=>$id]);
        return  view('pedidos.adminshow', compact('pedido', 'itenspedido', 'tipo'));
    }

    public function adminedit($tipo, $id)
    {
        $pedido = $this->repository->find($id);
        return  view('pedidos.adminedit', compact('pedido', 'tipo'));
    }

    public function adminupdate(Request $request,$tipo,$id)
    {
        $data = $request->all();
        $this->repository->update($data, $id);
        $pedido = $this->repository->find($id);
        Mail::to($pedido->usuario->email)->send(new MailPedidoAtualizado($pedido));
        $request->session()->flash('message', 'Dados atualizados com sucesso.');
        return redirect()->action('PedidosController@admin',['tipo'=>$tipo]);
    }
}
