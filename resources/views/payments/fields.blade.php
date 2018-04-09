<div class="form-group row">
    <!-- Member Id Field -->
    <div class="col-sm-6">
        {!! Form::label('member_id', 'Miembro:') !!}
        {!! Form::select('member_id', $members,null,['class' => 'form-control']) !!}
    </div>
    
    <!-- Amount Field -->
    <div class="col-sm-6">
        {!! Form::label('amount', 'Monto:') !!}
        {!! Form::number('amount', null, ['class' => 'form-control']) !!}
    </div>    
</div>

<div class="form-group row">
    @if (!empty($payment))
        <div class="col-sm-6">
            {!! Form::label('status', 'Estado:') !!}
            <p>{{$payment->status}}</p>
        </div>
    @else
        {{ Form::hidden('status','PAYED')}}
    @endif
    <div class="col-sm-6">
        {!! Form::label('notes', 'Notas:') !!}
        {!! Form::textarea('notes', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-group row">
    <div class="col-sm-12">
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
        <a href="{!! route('payments.index') !!}" class="btn btn-default">Cancelar</a>
    </div>
</div>
