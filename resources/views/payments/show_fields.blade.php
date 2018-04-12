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
        {!! Form::label('created_at', 'Periodo:') !!}
        <p>{!! $payment->created_at->format('m/Y') !!}</p>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-6">
        {!! Form::label('notes', 'Notas:') !!}
        <p>{!! $payment->notes !!}</p>
    </div>
    <div class="col-sm-6">
        {!! Form::label('status', 'Estado:') !!}
        <p>{!! $payment->getStatusLabel() !!}</p>
    </div>
</div>

<div class="form-group row">
    <!-- Updated At Field -->
    <div class="col-sm-6">
        {!! Form::label('updated_at', 'Última actualización:') !!}
        <p>{!! $payment->updated_at !!}</p>
    </div>
    <div class="col-sm-6">
        {!! Form::label('created_at', 'Fecha de pago:') !!}
        <p>{!! empty($payment->payed_at) ? null : $payment->payed_at !!}</p>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-12 ">
        <a href="{!! route('payments.index') !!}" class="btn btn-primary">Atrás</a>
    </div>
</div>