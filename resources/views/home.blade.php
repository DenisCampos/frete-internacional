@extends('layouts.appadmin')

@section('content')

<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
    <li class="breadcrumb-item active">
        Home<!--<a href="{{URL::previous()}}"></a>-->
    </li>
    </ol>
    <div class="col-lg-12">
        <h1>Home</h1>
        <hr>
        @if($usuario==0)
        <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                <i class="fa fa-fw fa-exclamation-triangle"></i>
                </div>
                <div class="mr-5">DADOS DO USUÁRIO INCOMPLETOS</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{route('edit')}}">
                <span class="float-left">Preencher agora</span>
                <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                </span>
            </a>
        </div>
        @else
        <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                <i class="fa fa-fw fa-check-square"></i>
                </div>
                <div class="mr-5">USUÁRIO PRONTO PARA REALIZAR PEDIDOS</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{route('pedidos.create')}}">
                <span class="float-left">Realize aqui</span>
                <span class="float-right">
                    <i class="fa fa-angle-right"></i>
                </span>
            </a>
        </div>
        @endif
    </div>
</div>
@endsection
