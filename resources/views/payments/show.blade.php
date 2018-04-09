@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-group row">
            <div class="col-sm-12">
                <h1>
                    Pago
                </h1>
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-sm-12">
                @include('payments.show_fields')
            </div>
        </div>
    </div>
@endsection
