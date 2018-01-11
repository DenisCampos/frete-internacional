{!! Form::hidden('redirect_to', URL::previous()) !!}
<div class="list-group-item list-group-item-action">
@if(Auth::user()->tipo==1) 
    {!! Form::label('rastreio', 'Rastreio', ['class' => 'control-label']) !!}
    {!! Form::text('rastreio', null, ['class' => 'form-control']) !!}
    {!! Form::label('obs_admin', 'Observação', ['class' => 'control-label']) !!}
    {!! Form::textarea('obs_admin', null, ['class' => 'form-control']) !!}
    {!! Form::label('status', 'Status', ['class' => 'control-label']) !!}<br>
    {!! Form::radio('status', '2', true); !!}{!! Form::label('em analise', 'Em análise', ['class' => 'control-label']) !!}
    {!! Form::radio('status', '3'); !!}{!! Form::label('aceito', 'Aceito', ['class' => 'control-label']) !!}
    {!! Form::radio('status', '4'); !!}{!! Form::label('transporte', 'Transporte', ['class' => 'control-label']) !!}
    {!! Form::radio('status', '5'); !!}{!! Form::label('finalizado', 'Finalizado', ['class' => 'control-label']) !!}
    {!! Form::radio('status', '6'); !!}{!! Form::label('cancelado', 'Cancelado', ['class' => 'control-label']) !!}
@else
    {!! Form::label('pacote_id', 'Pacotes', ['class' => 'control-label']) !!}
    {!! Form::select('pacote_id', $pacotes, null, ['class' => 'form-control']) !!}
    {!! Form::label('obs_cliente', 'Observação', ['class' => 'control-label']) !!}
    {!! Form::textarea('obs_cliente', null, ['class' => 'form-control']) !!}
@endif
</div>








 