<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PacotesRequest;
use App\Repositories\PacotesRepository;

class PacotesController extends Controller
{

    protected $repository;

    public function __construct(PacotesRepository $repository){
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacotes = $this->repository->orderBy('titulo')->findWhere(['status'=>1]);
        return view('pacotes.index', compact('pacotes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pacotes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->repository->create($request->all());
        //$url = $request->get('redirect_to', route('pacotes.show'));
        $request->session()->flash('message', 'Pacote cadastrado com sucesso.');
        return redirect()->to(route('pacotes.show'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $pacotes = $this->repository->orderBy('titulo')->all();
        return view('pacotes.show', compact('pacotes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pacote = $this->repository->find($id);
       // dd($pacote);
        return view('pacotes.edit', compact('pacote'));
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
        return redirect()->action('PacotesController@show');
    }

    public function updatestatus(Request $request)
    {
        $this->repository->update(['status' => $request->status], $request->id);
       // $request->session()->flash('message', ' Dados atualizados com sucesso.');

        return \Response::json($request->id); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->delete($id);
        \Session::flash('message', 'Pacote excluído com sucesso.');
        //$url = $request->get('redirect_to', route('pacotes.show'));

        return  redirect()->to(route('pacotes.show'));
    }
}
