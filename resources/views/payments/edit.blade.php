@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row form-group">
            <div class="col-sm-12">
                <h1>
                    Pago
                </h1>
            </div>
        </div>
    
        <div class="row form-group">
            <div class="col-sm-12">
                @include('adminlte-templates::common.errors')
            </div>
        </div>
            
        <div class="row form-group">
            <div class="col-sm-12">
               {!! Form::model($payment, ['route' => ['payments.update', $payment->id], 'method' => 'patch']) !!}
                    
                    <div class="form-group row">
                        <div class="col-sm-6">
                            {!! Form::label('id', 'ID:') !!}
                            <p>{!! $payment->id !!}</p>
                        </div>
                        <div class="col-sm-6">
                            {!! Form::label('created_at', 'Periodo:') !!}
                            <p>{!! $payment->created_at !!}</p>
                        </div>
                    </div>
                    @include('payments.fields')

               {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection