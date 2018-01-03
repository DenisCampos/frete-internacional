@extends('layouts.appadmin')

@section('content')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{URL::previous()}}">Home</a>
    </li>
    <li class="breadcrumb-item active">Editar senha</li>
    </ol>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <h1>Editar Dados</h1> 
            <hr>
            <div class="row">
                <div class="col-xl-12 col-sm-6 mb-3">
                    <div class="card bg-default o-hidden h-100">
                        <div class="card-header">
                            <i class="fa fa-fw fa-pencil-square-o"></i> Edite seus dados abaixo
                        </div>
                        {!! Form::model($usuario,['route' => ['update'],'class' => 'form', 'method' => 'PUT']) !!}
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-pencil-square-o"></i>
                            </div>
                            <div class="list-group list-group-flush">
                                <div class="list-group-item list-group-item-action">
                                    @include('_form')
                                </div>
                            </div>
                        </div>
                        <div class="card-footer" align="center">
                            {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}                       
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




