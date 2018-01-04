{!! Form::hidden('redirect_to', URL::previous()) !!}
<div class="list-group-item list-group-item-action">
<div class="row">
    <div class="col-lg-12">
        <h4>Pessoal</h4>
    </div>
    <div class="col-lg-6">
        {!! Form::label('name', 'Nome', ['class' => 'control-label']) !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
    <div class="col-lg-3">
        {!! Form::label('cpf', 'CPF', ['class' => 'control-label']) !!}
        {!! Form::text('cpf', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
    <div class="col-lg-3">
        {!! Form::label('rg', 'RG', ['class' => 'control-label']) !!}
        {!! Form::text('rg', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
    <div class="col-lg-6">
        {!! Form::label('email', 'E-mail', ['class' => 'control-label']) !!}
        {!! Form::text('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
    <div class="col-lg-3">
        {!! Form::label('contato', 'Contato (tel/cel)', ['class' => 'control-label']) !!}
        {!! Form::text('contato', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
</div>
</div>
<div class="list-group-item list-group-item-action">
<div class="row">
    <div class="col-lg-12">
        <h4>Endereço</h4>
    </div>
    <div class="col-lg-4">
        {!! Form::label('endereco', 'Endereço', ['class' => 'control-label']) !!}
        {!! Form::text('endereco', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
    <div class="col-lg-1">
        {!! Form::label('numero', 'Numero', ['class' => 'control-label']) !!}
        {!! Form::text('numero', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
    <div class="col-lg-4">
        {!! Form::label('bairro', 'Bairro', ['class' => 'control-label']) !!}
        {!! Form::text('bairro', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
    <div class="col-lg-3">
        {!! Form::label('complemento', 'Complemento', ['class' => 'control-label']) !!}
        {!! Form::text('complemento', null, ['class' => 'form-control']) !!}
    </div>
    <div class="col-lg-3">
        {!! Form::label('cidade', 'Cidade', ['class' => 'control-label']) !!}
        {!! Form::text('cidade', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
    <div class="col-lg-3">
        {!! Form::label('uf', 'UF', ['class' => 'control-label']) !!}
        {!! Form::text('uf', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
    <div class="col-lg-3">
        {!! Form::label('pais', 'País', ['class' => 'control-label']) !!}
        {!! Form::text('pais', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
    <div class="col-lg-3">
        {!! Form::label('cep', 'CEP', ['class' => 'control-label']) !!}
        {!! Form::text('cep', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
</div>
</div>







