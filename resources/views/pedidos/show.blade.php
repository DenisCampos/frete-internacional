@extends('layouts.appadmin')

@section('content')

<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('home')}}">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('pedidos.aberto')}}">Em aberto</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('pedidos.aberto')}}">Realizados</a>
        </li>
        <li class="breadcrumb-item active">Pedido</li>
    </ol>
    <div class="col-lg-12">
        <h1>Pedido {{$pedido->id}}</h1>
        <hr>
        <div class="col-lg-12 card mb-3">
            <div class="card-header">
                <i class="fa fa-user"></i> Cliente
            </div>
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa fa-fw fa-user-o"></i>
                </div>
                <div class="row">
                    <div class="col-lg-6  form-control">
                        <strong>Nome:</strong><br>
                        {{$pedido->usuario->name}}
                    </div>
                    <div class="col-lg-3  form-control">
                        <strong>CPF:</strong><br>
                        {{$pedido->usuario->cpf}}
                    </div>
                    <div class="col-lg-3  form-control">
                        <strong>RG:</strong><br>
                        {{$pedido->usuario->rg}}
                    </div>
                    <div class="col-lg-3  form-control">
                        <strong>E-mail:</strong><br>
                        {{$pedido->usuario->email}}
                    </div>
                    <div class="col-lg-3  form-control">
                        <strong>Contato:</strong><br>
                        {{$pedido->usuario->contato}}
                    </div>
                    <div class="col-lg-12">
                        <br>
                    </div>
                    <div class="col-lg-4 form-control">
                        <strong>Endereço:</strong><br>
                        {{$pedido->usuario->endereco}}
                    </div>
                    <div class="col-lg-1 form-control">
                        <strong>Numero:</strong><br>
                        {{$pedido->usuario->numero}}
                    </div>
                    <div class="col-lg-4 form-control">
                        <strong>Bairro:</strong><br>
                        {{$pedido->usuario->bairro}}
                    </div>
                    <div class="col-lg-3 form-control">
                        <strong>Complemento:</strong><br>
                        {{$pedido->usuario->complemento}}
                    </div>
                    <div class="col-lg-3 form-control">
                        <strong>Cidade:</strong><br>
                        {{$pedido->usuario->cidade}}
                    </div>
                    <div class="col-lg-3 form-control">
                        <strong>UF:</strong><br>
                        {{$pedido->usuario->uf}}
                    </div>
                    <div class="col-lg-3 form-control">
                        <strong>País:</strong><br>
                        {{$pedido->usuario->pais}}
                    </div>
                    <div class="col-lg-3 form-control">
                        <strong>CEP:</strong><br>
                        {{$pedido->usuario->cep}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 card mb-3">
                <div class="card-header">
                    <i class="fa fa-archive "></i> Pedido
                </div>
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-archive "></i>
                    </div>
                    <div class="row">
                        <div class="col-lg-4  form-control">
                            <strong>Pedido Id:</strong><br>
                            {{$pedido->id}}
                        </div>
                        <div class="col-lg-4  form-control">
                            <strong>Status:</strong><br>
                            {{$pedido->getStatus($pedido->status)}}
                        </div>
                        <div class="col-lg-4  form-control">
                            <strong>Rastreio:</strong><br>
                            {{$pedido->rastreio}}
                        </div>
                        <div class="col-lg-12 form-control">
                            <strong>Observação:</strong><br>
                            {{$pedido->obs_cliente}}
                        </div>
                        @if($pedido->obs_admin)
                        <div class="col-lg-12 form-control">
                            <strong>Observação Administrativa:</strong><br>
                            {{$pedido->obs_admin}}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        <div class="col-lg-12 card mb-3">
            <div class="card-header">
                <i class="fa fa-folder"></i> Pacote
            </div>
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa fa-fw fa-folder-o"></i>
                </div>
                <div class="row">
                    <div class="col-lg-12  form-control">
                        <strong>Título:</strong><br>
                        {{$pedido->pacote->titulo}}
                    </div>
                    <div class="col-lg-12  form-control">
                        <strong>Descrição:</strong><br>
                        {{$pedido->pacote->descricao}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 card mb-3">
            <div class="card-header">
                <i class="fa fa-shopping-cart"></i> Itens
            </div>
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa fa-fw fa-shopping-cart"></i>
                </div>
                <div class="list-group list-group-flush">
                    <div class="list-group-item list-group-item-action">
                        @php
                            $cont = 0;
                        @endphp
                        @foreach($itenspedido as $itempedido)
                        @php
                            $cont++;
                        @endphp
                        <div class="row">
                            <div class="col-lg-12 form-control">
                                <strong>Item {{$cont}} - {{$itempedido->descricao}}</strong>
                            </div>
                            <div class="col-lg-12 form-control">
                                <strong>Link:</strong><br>
                                <a href="{{$itempedido->link}}" target="_blank">{{$itempedido->link}}</a>
                            </div>
                            <div class="col-lg-3 form-control">
                                <strong>Quantidade:</strong><br>
                                {{$itempedido->quantidade}}
                            </div>
                            <div class="col-lg-3 form-control">
                                <strong>Preço a unidade($):</strong><br>
                                {{$itempedido->preco}}
                            </div>
                            <div class="col-lg-3 form-control">
                                <strong>Cor:</strong><br>
                                {{$itempedido->cor}}
                            </div>
                            <div class="col-lg-3 form-control">
                                <strong>Peso a unidade(kg):</strong><br>
                                {{$itempedido->peso}}
                            </div>
                            <div class="col-lg-12 form-control">
                                <strong>Observação:</strong><br>
                                {{$itempedido->obs_cliente}}
                            </div>
                            @if($itempedido->obs_admin)
                            <div class="col-lg-12 form-control">
                                <strong>Observação Administrativa:</strong><br>
                                {{$itempedido->obs_admin}}
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
