@extends('layouts.appadmin')

@section('content')

<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('home')}}">Home</a>
        </li>
        <li class="breadcrumb-item active">Pacotes</li>
    </ol>
    <div class="col-lg-12">
        <h1>Pacotes</h1>
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
                <a class="card-footer text-white clearfix small z-1" data-toggle="modal" data-target="#DescricaoPacote" onclick="pacote_conteudo('{{$pacote->titulo}}','{{$pacote->descricao}}')">
                    <span class="float-left">Mais Detalhes</span>
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
<!-- Logout Modal-->
<div class="modal fade" id="DescricaoPacote" tabindex="-1" role="dialog" aria-labelledby="DescricaoPacoteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="DescricaoPacoteLabel"></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
        <div class="modal-body" id="DescricaoPacoteDescricao"></div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function pacote_conteudo(titulo, conteudo){
        $("#DescricaoPacoteLabel").html(titulo);
        $("#DescricaoPacoteDescricao").html(conteudo);
    }
</script>
@endsection
