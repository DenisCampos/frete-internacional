@extends('layouts.appadmin')

@section('content')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('home')}}">Home</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('usuarios.index')}}">Usuários</a>
    </li>
    <li class="breadcrumb-item active">Editar usuário</li>
    </ol>
    <div class="col-lg-12">
        <h1>Editar Dados</h1> 
        <hr>
        <div class="row">
            <div class="col-xl-12">
                <div class="card bg-default o-hidden h-100">
                    <div class="card-header">
                        <i class="fa fa-fw fa-pencil-square-o"></i> Edite os dados do abaixo
                    </div>
                    {!! Form::model($usuario,['route' => ['usuarios.update', 'id'=>$usuario->id],'class' => 'form', 'method' => 'PUT']) !!}
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-pencil-square-o"></i>
                        </div>
                        <div class="list-group list-group-flush">
                            @include('usuarios._form')
                        </div>
                    </div>
                    <div class="card-footer" align="center">
                        {!! Form::submit('Salvar', ['class' => 'btn btn-primary btn-block']) !!}                       
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection




