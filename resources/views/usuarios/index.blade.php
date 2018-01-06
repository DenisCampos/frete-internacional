@extends('layouts.appadmin')

@section('content')

<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('home')}}">Home</a>
        </li>
        <li class="breadcrumb-item active">Usuários</li>
    </ol>
    <div class="col-lg-12">
        <h1>Usuários</h1>
        <hr>
        <div class="col-lg-12 card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Usuários cadastrados
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>E-mail</th>
                        <th>Tipo</th>
                        <th>Editar</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>E-mail</th>
                        <th>Tipo</th>
                        <th>Editar</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{$usuario->name}}</td>
                        <td>{{$usuario->cpf}}</td>
                        <td>{{$usuario->email}}</td>
                        <td>    
                        @if($usuario->tipo==0)
                            Cliente
                        @else
                            Admin
                        @endif
                        </td>
                        <td><a class="text-warning" href="{{ route('usuarios.edit', ['id' => $usuario->id]) }}"><i class="fa fa-pencil-square-o fa-2x"></i></a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Logout Modal-->

@endsection
