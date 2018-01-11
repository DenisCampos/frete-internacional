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
        <li class="breadcrumb-item active">Itens</li>
    </ol>
    <div class="col-lg-12">
        <h1>Itens</h1>
        <hr>
        <div class="col-lg-12 card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Itens do Pedido {{$pedido}}
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Descrição</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Link</th>
                        <th>Observação do Cliente</th>
                        <th width="10%">Detalhar</th>
                        <th width="10%">Observação</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Descrição</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Link</th>
                        <th>Observação do Cliente</th>
                        <th>Detalhar</th>
                        <th>Observação</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($itens as $item)
                    <tr>
                        <td>{{$item->descricao}}</td>
                        <td>{{$item->quantidade}}</td>
                        <td>${{$item->preco}}</td>
                        <td><a href="{{$item->link}}" target="_blank">Link</a></td>
                        <td>{{$item->obs}}</td>
                        <td>
                            <a data-toggle="modal" data-target="#DescricaoItem" onclick="item_conteudo('{{$item->cor}}','{{$item->peso}}','{{preg_replace('/\r|\n/', '', nl2br($item->obs))}}')">
                                <i class="fa fa-file-text-o fa-2x"></i>
                            </a>
                        </td>
                        <td><a class="text-warning" href="{{ route('itenspedido.edit', ['tipo' => $tipo ,'pedido' => $pedido ,'id' => $item->id]) }}"><i class="fa fa-pencil-square-o fa-2x"></i></a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
            <div class="card-footer" align="center">
                <a class="btn btn-primary btn-block" href="{{ route('pedidos.aberto')}}">Finalizar</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="DescricaoItem" tabindex="-1" role="dialog" aria-labelledby="DescricaoItemLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="DescricaoItemLabel">Mais Informações</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
            <div class="modal-body" id="DescricaoItemDescricao">
                <div class='row'>
                    <div class="col-lg-1">Peso:</div>
                    <div class="col-lg-11" id="itemPeso"></div>
                    <div class="col-lg-1">Cor:</div>
                    <div class="col-lg-11" id="itemCor"></div><br>
                    <div class="col-lg-12">Observação:</div>
                    <div class="col-lg-12" id="itemObs">Observação:</div>
                </div>
            </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function item_conteudo(peso,cor,obs){
            if(peso==""){
                peso = "não informado";
            }
            if(cor==""){
                cor = "não informado";
            }
            $("#itemPeso").html(peso);
            $("#itemCor").html(cor);
            $("#itemObs").html(obs);
        }
    </script>
<!-- Logout Modal-->

@endsection
