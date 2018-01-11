@extends('layouts.appadmin')

@section('content')

<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('home')}}">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('pedidos.admin', ['tipo'=>$tipo])}}">{{ucfirst($tipo)}}</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('itenspedido.admin', ['tipo'=>$tipo,'pedido' => $pedido])}}">Itens</a>
        </li>
        <li class="breadcrumb-item active">Editar</li>
    </ol>
    <div class="col-lg-12">
        <h1>Novo Item</h1>
        <hr>
        <div class="row">
            <div class="col-xl-12">
                <div class="card bg-default o-hidden h-100">
                    <div class="card-header">
                        <i class="fa fa-fw fa-shopping-cart"></i> Coloque os dados do Item abaixo
                    </div>
                    {!! Form::model($item,['route' => ['itenspedido.update','tipo' => $tipo ,'pedido' => $pedido ,'id' => $item->id],'class' => 'form', 'method' => 'PUT']) !!}
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-shopping-cart"></i>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 form-control">
                                <strong>Descrição:</strong><br>
                                {{$item->descricao}}
                            </div>
                            <div class="col-lg-12 form-control">
                                <strong>Link:</strong><br>
                                <a href="{{$item->link}}" target="_blank">{{$item->link}}</a>
                            </div>
                            <div class="col-lg-3 form-control">
                                <strong>Quantidade:</strong><br>
                                {{$item->quantidade}}
                            </div>
                            <div class="col-lg-3 form-control">
                                <strong>Preço a unidade($):</strong><br>
                                {{$item->preco}}
                            </div>
                            <div class="col-lg-3 form-control">
                                <strong>Cor:</strong><br>
                                {{$item->cor}}
                            </div>
                            <div class="col-lg-3 form-control">
                                <strong>Peso a unidade(kg):</strong><br>
                                {{$item->peso}}
                            </div>
                            <div class="col-lg-12 form-control">
                                <strong>Observação:</strong><br>
                                {{$item->obs_cliente}}
                            </div>
                        </div>
                        <div class="list-group list-group-flush">
                            @include('itenspedido._form')
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
