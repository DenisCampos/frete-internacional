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
        <div class="col-lg-12 card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Pacotes cadastrados
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Descrição</th>
                        <th>Status</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Titulo</th>
                        <th>Descrição</th>
                        <th>Status</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($pacotes as $pacote)
                    <tr>
                        <td>{{$pacote->titulo}}</td>
                        <td>{{$pacote->descricao}}</td>
                        <td onclick="mudar_evento_status('{{$pacote->id}}')">
                            @if($pacote->status==1)
                            <i id="{{$pacote->id}}" style="color:#5cb85c" class="fa fa-toggle-on fa-2x"></i>
                            @else
                            <i id="{{$pacote->id}}" style="color:#d9534f" class="fa fa-toggle-off fa-2x"></i>
                            @endif
                        </td>
                        <td><a class="btn btn-warning" href="{{ route('pacotes.edit', ['id' => $pacote->id]) }}"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td>{{$pacote->id}}</td>
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
<script>
    function mudar_evento_status(pacote) {
        
        var classe = document.getElementById(pacote).getAttribute('class');
        var pstatus;
        
        if (classe == 'fa fa-toggle-on fa-2x'){
            document.getElementById(pacote).setAttribute('class', 'fa fa-toggle-off fa-2x');
            document.getElementById(pacote).setAttribute('style', 'color:#d9534f');
            pstatus = 0;
        }else{
            document.getElementById(pacote).setAttribute('class', 'fa fa-toggle-on fa-2x');
            document.getElementById(pacote).setAttribute('style', 'color:#5cb85c');

            pstatus = 1;
        }

        jQuery.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:"POST",
            url: "{{route('pacotes.updatestatus')}}",
            data: { id: pacote, status: pstatus},
            dataType: 'json',
            success: function (res)
            {  
                if(res)
                {
                                           
                }
            }
        });	
    };
</script>
@endsection
