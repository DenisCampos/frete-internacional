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
        <li class="breadcrumb-item active">Em aberto</li>
    </ol>
    <div class="col-lg-12">
        <h1>Pedidos</h1>
        <hr>
        <div class="col-lg-12 card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Pedidos em aberto
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Pedido</th>
                        <th>Cliente</th>
                        <th>Pacote</th>
                        <th>Status</th>
                        <th width="10%">Itens</th>
                        <th width="10%">Enviar</th>
                        <th width="10%">Editar</th>
                        <th width="10%">Excluir</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Pedido</th>
                        <th>Cliente</th>
                        <th>Pacote</th>
                        <th>Status</th>
                        <th>Itens</th>
                        <th>Enviar</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($pedidos as $pedido)
                    <tr>
                        <td>{{$pedido->id}}</td>
                        <td>{{$pedido->usuario->name}}</td>
                        <td>{{$pedido->pacote->titulo}}</td>
                        <td>{{$pedido->status}}</td>
                        <td><a class="text-default" href="{{route('itenspedido.index',['pedido'=>$pedido->id])}}"><i class="fa fa-cart-plus fa-2x"></i></td>
                        <td><a class="text-success" href="{{route('pedidos.enviar',['pedido'=>$pedido->id])}}"><i class="fa fa-sign-in fa-2x"></i></a></td>
                        <td><a class="text-warning" href="#"><i class="fa fa-pencil-square-o fa-2x"></i></a></td>
                        <td><a class="text-danger" href="#"><i class="fa fa-trash fa-2x"></i></a></td>
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
