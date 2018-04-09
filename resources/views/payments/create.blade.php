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
                {!! Form::open(['route' => 'payments.store']) !!}

                    @include('payments.fields')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
