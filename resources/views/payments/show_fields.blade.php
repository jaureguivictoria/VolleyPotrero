<div class="form-group row">
    <!-- Id Field -->
    <div class="col-sm-6">
        {!! Form::label('id', 'ID:') !!}
        <p>{!! $payment->id !!}</p>
    </div>

    <!-- Member Id Field -->
    <div class="col-sm-6">
        {!! Form::label('member_id', 'Miembro :') !!}
        <p>{!! $payment->member->getFullName() !!}</p>
    </div>
</div>

<div class="form-group row">
    <!-- Amount Field -->
    <div class="col-sm-6">
        {!! Form::label('amount', 'Monto:') !!}
        <p>$ {!! $payment->amount !!}</p>
    </div>
    
    
    <!-- Created At Field -->
    <div class="col-sm-6">
        {!! Form::label('created_at', 'Fecha de creación:') !!}
        <p>{!! $payment->created_at->format('d/m/Y') !!}</p>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-6">
        {!! Form::label('notes', 'Notas:') !!}
        <p>{!! $payment->notes !!}</p>
    </div>
    <div class="col-sm-6">
        {!! Form::label('status', 'Estado:') !!}
        <p>{!! $payment->status !!}</p>
    </div>

<div class="form-group row">
    <!-- Updated At Field -->
    <div class="col-sm-6">
        {!! Form::label('updated_at', 'Última actualización:') !!}
        <p>{!! $payment->updated_at->format('d/m/Y') !!}</p>
    </div>
    <div class="col-sm-6">
        <div class="col-sm-6">
            <a href="{!! route('payments.index') !!}" class="btn btn-primary">Atrás</a>
        </div>
    </div>
</div>