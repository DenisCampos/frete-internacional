@extends('layouts.appadmin')

@section('content')

<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('home')}}">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('pedidos.admin',['tipo'=> $tipo])}}">{{ucfirst($tipo)}}</a>
        </li>
        <li class="breadcrumb-item active">Editar</li>
    </ol>
    <div class="col-lg-12">
        <h1>Pedido</h1>
        <hr>
        <div class="row">
            <div class="col-xl-12">
                <div class="card bg-default o-hidden h-100">
                    <div class="card-header">
                        <i class="fa fa-fw fa-pencil-square-o"></i> Coloque os dados do pedido abaixo
                    </div>
                    {!! Form::model($pedido,['route' => ['pedidos.adminupdate','tipo'=>$tipo, 'id'=>$pedido->id],'class' => 'form', 'method' => 'PUT']) !!}
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-pencil-square-o"></i>
                        </div>
                        <div class="row">
                            <div class="col-lg-6  form-control">
                                <strong>Pedido Id:</strong><br>
                                {{$pedido->id}}
                            </div>
                            <div class="col-lg-6  form-control">
                                <strong>Status:</strong><br>
                                {{$pedido->getStatus($pedido->status)}}
                            </div>
                            <div class="col-lg-12 form-control">
                                <strong>Observação do Cliente:</strong><br>
                                {{$pedido->obs_cliente}}
                            </div>
                        </div>
                        <div class="list-group list-group-flush">
                            @include('pedidos._form')
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
