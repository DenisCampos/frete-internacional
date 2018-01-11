@extends('layouts.appadmin')

@section('content')

<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('home')}}">Home</a>
        </li>
        <li class="breadcrumb-item active">{{ucfirst($tipo)}}</li>
    </ol>
    <div class="col-lg-12">
        <h1>Pedidos</h1>
        <hr>
        <div class="col-lg-12 card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Pedidos {{$tipo}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Pedido</th>
                        <th>Pacote</th>
                        <th>Cliente</th>
                        <th>Status</th>
                        <th width="10%">Detalhar</th>
                        @if($tipo!="finalizados")
                        <th width="10%">Itens</th>
                        <th width="10%">Pedido</th>
                        @endif
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Pedido</th>
                        <th>Pacote</th>
                        <th>Cliente</th>
                        <th>Status</th>
                        <th>Detalhar</th>
                        @if($tipo!="finalizados")
                        <th>Itens</th>
                        <th>Pedido</th>
                        @endif
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($pedidos as $pedido)
                    <tr>
                        <td>{{$pedido->id}}</td>
                        <td>{{$pedido->pacote->titulo}}</td>
                        <td>{{$pedido->usuario->name}}</td>
                        <td>{{$pedido->getStatus($pedido->status)}}</td>
                        <td><a href="{{route('pedidos.adminshow',['tipo'=>$tipo,'pedido'=>$pedido->id])}}"><i class="fa fa-file-text-o fa-2x"></i></a></td>
                        @if($tipo!="finalizados")
                        <td><a href="{{route('itenspedido.admin',['tipo'=>$tipo,'pedido'=>$pedido->id])}}"><i class="fa fa-shopping-cart fa-2x"></i></a></td>
                        <td><a class="text-warning" href="{{route('pedidos.adminedit',['tipo'=>$tipo,'pedido'=>$pedido->id])}}"><i class="fa fa-pencil-square-o fa-2x"></i></a></td>
                        @endif
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
