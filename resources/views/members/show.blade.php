@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-group row">
            <div class="col-sm-12">
                <h1>
                    Miembro
                </h1>
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-sm-12">    
                
                @include('members.show_fields')
                
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-sm-12">
                <h3 class="mb-5">Pagos</h3>
                @include('members.payments')
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12">
                <a href="{!! route('members.index') !!}" class="btn btn-primary">Atrás</a>
            </div>
        </div>
    </div>
@endsection