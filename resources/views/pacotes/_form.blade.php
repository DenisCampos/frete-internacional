{!! Form::hidden('redirect_to', URL::previous()) !!}
<div class="list-group-item list-group-item-action">
    {!! Form::label('titulo', 'Titulo', ['class' => 'control-label']) !!}
    {!! Form::text('titulo', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! Form::label('descricao', 'Descrição', ['class' => 'control-label']) !!}
    {!! Form::textarea('descricao', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! Form::radio('status', '0', true); !!}{!! Form::label('desativado', 'Desativado', ['class' => 'control-label']) !!}
    {!! Form::radio('status', '1'); !!}{!! Form::label('ativado', 'Ativado', ['class' => 'control-label']) !!}
</div>








 