{!! Form::hidden('redirect_to', URL::previous()) !!}
<div class="row">
    <div class="col-6">
        {!! Form::label('name', 'Nome', ['class' => 'control-label']) !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
    <div class="col-6">
        {!! Form::label('email', 'E-mail', ['class' => 'control-label']) !!}
        {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
</div>





