@extends('layouts.appadmin')

@section('content')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('home')}}">Home</a>
    </li>
    <li class="breadcrumb-item active">Editar senha</li>
    </ol>
    <div class="row">
        <div class="col-lg-12">
            <h1>Editar Senha</h1> 
            <hr>
            <div class="row">
                <div class="col-xl-4 col-sm-6 mb-3">
                    <div class="card bg-default o-hidden h-100">
                        <div class="card-header">
                            <i class="fa fa-fw fa-ellipsis-h"></i> Digite sua nova senha a baixo
                        </div>
                        {!! Form::model($usuario,['route' => ['updatepassword'],'class' => 'form', 'method' => 'PUT']) !!}
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-pencil"></i>
                            </div>
                            <div class="mr-5">
                                {!! Form::hidden('redirect_to', URL::previous()) !!}
                                {!! Form::label('email', 'Senha', ['class' => 'control-label']) !!}
                                {!! Form::password('password', ['class' => 'form-control', 'required' => 'required']) !!}
                            </div>
                        </div>
                        <div class="card-footer" align="center">
                            {!! Form::submit('Salvar senha', ['class' => 'btn btn-primary btn-block']) !!}                       
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




