<div class="form-group row">
    <!-- Id Field -->
    <div class="col-sm-6">
        {!! Form::label('id', 'ID:') !!}
        <p>{!! $member->id !!}</p>
    </div>

    <!-- Name Field -->
    <div class="col-sm-6">
        {!! Form::label('name', 'Nombre:') !!}
        <p>{!! $member->name !!}</p>
    </div>
</div>

<div class="form-group row">
    <!-- Surname Field -->
    <div class="col-sm-6">
        {!! Form::label('surname', 'Apellido:') !!}
        <p>{!! $member->surname !!}</p>
    </div>

    <!-- Birthday Field -->
    <div class="col-sm-6">
        {!! Form::label('birthday', 'Fecha de nacimiento:') !!}
        <p>{!! empty($member->birthday) ? null : $member->birthday->format('d/m/Y') !!}</p>
    </div>
</div>

<div class="form-group row">
    <!-- Dni Field -->
    <div class="col-sm-6">
        {!! Form::label('dni', 'DNI:') !!}
        <p>{!! $member->dni !!}</p>
    </div>

    <!-- Phone Field -->
    <div class="col-sm-6">
        {!! Form::label('phone', 'Teléfono:') !!}
        <p>{!! $member->phone !!}</p>
    </div>
</div>

<div class="form-group row">
    <!-- Email Field -->
    <div class="col-sm-6">
        {!! Form::label('email', 'Email:') !!}
        <p>{!! $member->email !!}</p>
    </div>

    <!-- Created At Field -->
    <div class="col-sm-6">
        {!! Form::label('created_at', 'Fecha de creación:') !!}
        <p>{!! $member->created_at->format('d/m/Y') !!}</p>
    </div>
</div>

<div class="form-group row">
    <!-- Updated At Field -->
    <div class="col-sm-6">
        {!! Form::label('updated_at', 'Última actualización:') !!}
        <p>{!! $member->updated_at->format('d/m/Y') !!}</p>
    </div>
    <div class="col-sm-6">
        <a href="{!! route('members.index') !!}" class="btn btn-primary">Atrás</a>
    </div>
</div>
