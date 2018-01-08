@extends('layouts.appadmin')

@section('content')

<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('home')}}">Home</a>
        </li>
        <li class="breadcrumb-item active">Pedido</li>
    </ol>
    <div class="col-lg-12">
        <h1>Pedidos</h1>
        <hr>
        <div class="row">
            @foreach($pacotes as $pacote)
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-primary o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-folder"></i>
                        </div>
                    <div class="mr-5">{{$pacote->titulo}}</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{route('pedidos.store', ['pacote' => $pacote->id])}}">
                    <span class="float-left">Selecionar</span>
                    <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
