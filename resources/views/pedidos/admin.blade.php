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
                        <th>Cliente</th>
                        <th>Status</th>
                        <th width="10%">Detalhar</th>
                        <th width="10%">Itens</th>
                        <th width="10%">Pedido</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Pedido</th>
                        <th>Cliente</th>
                        <th>Status</th>
                        <th>Detalhar</th>
                        <th>Itens</th>
                        <th>Pedido</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($pedidos as $pedido)
                    <tr>
                        <td>{{$pedido->id}}</td>
                        <td>{{$pedido->usuario->name}}</td>
                        <td>{{$pedido->getStatus($pedido->status)}}</td>
                        <td><a href="{{route('pedidos.show',['pedido'=>$pedido->id])}}"><i class="fa fa-file-text-o fa-2x"></i></a></td>
                        <td><a href="{{route('pedidos.show',['pedido'=>$pedido->id])}}"><i class="fa fa-shopping-cart fa-2x"></i></a></td>
                        <td><a class="text-warning" href="{{route('pedidos.edit',['pedido'=>$pedido->id])}}"><i class="fa fa-pencil-square-o fa-2x"></i></a></td>
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
