<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use App\Repositories\UsuariosRepository;
use App\Http\Requests\UserRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Database\QueryException;

class HomeController extends Controller
{

    protected $repository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UsuariosRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function edit(){
        $id = Auth::user()->id;
        $usuario = $this->repository->find($id);

        return view('edit', compact('usuario'));
    }

    public function update(UserRequest $request)
    {
        $data = $request->all();

        $id = Auth::user()->id;

        $this->repository->update($data, $id);
        $request->session()->flash('message', ' Dados atualizado com sucesso.');

        return redirect()->action('HomeController@index');
    }

    public function editpassword(){
        $id = Auth::user()->id;
        $usuario = $this->repository->find($id);

        return view('editpassword', compact('usuario'));
    }

    public function updatepassword(PasswordRequest $request)
    {
        $data['password'] = bcrypt($request->password);
        $id = Auth::user()->id;

        $this->repository->update($data, $id);
        $request->session()->flash('message', ' Senha alterada com sucesso.');

        return redirect()->action('HomeController@index');
    }
}
