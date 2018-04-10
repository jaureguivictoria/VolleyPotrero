<div class="form-group row">
    
    <!-- Name Field -->
    <div class="col-sm-6">
        {!! Form::label('name', 'Nombre:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    
    <!-- Surname Field -->
    <div class="col-sm-6">
        {!! Form::label('surname', 'Apellido:') !!}
        {!! Form::text('surname', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group row">
<!-- Birthday Field -->
<div class="col-sm-6">
    {!! Form::label('birthday', 'Fecha de nacimiento:') !!}
    {!! Form::date('birthday', empty($member) ? null : $member->birthday->format('Y-m-d'), ['class' => 'form-control']) !!}
</div>

<!-- Dni Field -->
<div class="col-sm-6">
    {!! Form::label('dni', 'DNI:') !!}
    {!! Form::number('dni', null, ['class' => 'form-control']) !!}
</div>
</div>
<div class="form-group row">
<!-- Phone Field -->
<div class="col-sm-6">
    {!! Form::label('phone', 'Teléfono:') !!}
    {!! Form::number('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>
</div>
<div class="form-group row">
<!-- Submit Field -->
<div class="col-sm-9"></div>
<div class="col-sm-3 text-right">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('members.index') !!}" class="btn btn-default">Cancelar</a>
</div>
</div>