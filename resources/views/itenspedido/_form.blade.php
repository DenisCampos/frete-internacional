{!! Form::hidden('redirect_to', URL::previous()) !!}
<div class="list-group-item list-group-item-action">
    <div class="row">
    <div class="col-lg-12">
        {!! Form::label('descricao', 'Descrição', ['class' => 'control-label']) !!}
        {!! Form::text('descricao', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
    <div class="col-lg-12">
        {!! Form::label('link', 'Link', ['class' => 'control-label']) !!}
        {!! Form::text('link', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
    <div class="col-lg-3">
        {!! Form::label('quantidade', 'Quantidade', ['class' => 'control-label']) !!}
        {!! Form::number('quantidade', 1, ['min' => 1, 'class' => 'form-control', 'required' => 'required']) !!}
    </div>
    <div class="col-lg-3">
        {!! Form::label('preco', 'Preço a unidade($)', ['class' => 'control-label']) !!}
        {!! Form::number('preco', null, ['min' => '0.01', 'class' => 'form-control', 'required' => 'required', 'step' => '0.01']) !!}
    </div>
    <div class="col-lg-3">
        {!! Form::label('cor', 'Cor', ['class' => 'control-label']) !!}
        {!! Form::text('cor', null, ['class' => 'form-control']) !!}   
    </div>
    <div class="col-lg-3">
        {!! Form::label('peso', 'Peso a unidade(kg)', ['class' => 'control-label']) !!}
        {!! Form::number('peso', null , ['class' => 'form-control','step' => '0.001']) !!}
    </div>
    <div class="col-lg-12">
        {!! Form::label('obs_cliente', 'Observação', ['class' => 'control-label']) !!}
        {!! Form::textarea('obs_cliente', null, ['class' => 'form-control']) !!}
    </div>  
</div>  
</div>


 