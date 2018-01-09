@extends('layouts.appadmin')

@section('content')

<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('home')}}">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('pedidos.create')}}">Pedido</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('pedidos.aberto')}}">Em aberto</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('itenspedido.index',['pedido'=>$pedido])}}">Itens</a>
        </li>
        <li class="breadcrumb-item active">Novo</li>
    </ol>
    <div class="col-lg-12">
        <h1>Novo Item</h1>
        <hr>
        <div class="row">
            <div class="col-xl-12">
                <div class="card bg-default o-hidden h-100">
                    <div class="card-header">
                        <i class="fa fa-fw fa-cart-arrow-down"></i> Coloque os dados do Item abaixo
                    </div>
                    {!! Form::open(['route' => ['itenspedido.store', 'pedido'=>$pedido], 'method' => 'post']) !!}
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-cart-arrow-down"></i>
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
