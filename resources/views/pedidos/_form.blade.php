{!! Form::hidden('redirect_to', URL::previous()) !!}
<div class="list-group-item list-group-item-action">
    {!! Form::label('pacote_id', 'Pacotes', ['class' => 'control-label']) !!}
    {!! Form::select('pacote_id', $pacotes, null, ['class' => 'form-control']) !!}
    {!! Form::label('obs_cliente', 'Observação', ['class' => 'control-label']) !!}
    {!! Form::textarea('obs_cliente', null, ['class' => 'form-control']) !!}
</div>








 