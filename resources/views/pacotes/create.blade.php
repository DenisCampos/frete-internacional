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
        <h1>Novo Pacote</h1>
        <hr>
        <div class="row">
            <div class="col-xl-12">
                <div class="card bg-default o-hidden h-100">
                    <div class="card-header">
                        <i class="fa fa-fw fa-folder-o"></i> Edite seus dados abaixo
                    </div>
                    {!! Form::open(['route' => ['pacotes.store'],'class' => 'form', 'method' => 'POST']) !!}
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-folder-o"></i>
                        </div>
                        <div class="list-group list-group-flush">
                            @include('pacotes._form')
                        </div>
                    </div>
                    <div class="card-footer" align="center">
                        {!! Form::submit('Salvar', ['class' => 'btn btn-primary btn-block']) !!}                       
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
