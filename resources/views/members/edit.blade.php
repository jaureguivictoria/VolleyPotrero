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
                @include('adminlte-templates::common.errors')
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12">    
                {!! Form::model($member, ['route' => ['members.update', $member->id], 'method' => 'patch']) !!}
                
                @include('members.fields')
                
                {!! Form::close() !!}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12">
                <h3 class="mb-5">Pagos</h3>
                @include('members.payments')
            </div>
        </div>
    </div>
@endsection