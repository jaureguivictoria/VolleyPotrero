@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row form-group">
            <div class="col-sm-6">
                <h1 class="pull-left">Miembros</h1>
            </div>
            <div class="col-sm-6">
                <h1 class="pull-right">
                    <a class="btn btn-warning pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('members.index',['juniors' => true]) !!}">Juveniles</a>
                    <a class="btn btn-success pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('members.index',['seniors' => true]) !!}">Mayores</a>
                    <a class="btn btn-danger pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('members.index',['withTrashed' => true]) !!}">Eliminados</a>
                    <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('members.create') !!}">Agregar</a>
                </h1>
            </div>
        </div>
        
        {!! Form::open(['route' => ['members.search'], 'method' => 'post']) !!}
        <div class="row form-group">
            <div class="col-sm-8">
                {{Form::text('search', null,['placeholder' => 'Buscar miembro','class' => 'form-control required','required' => 'required'])}}
            </div>
            <div class="col-sm-4">
                {!! Form::button('<i class="fa fa-search"></i>', ['type' => 'submit', 'class' => 'btn btn-primary btn-xs']) !!}
                <a class="btn btn-danger" href="{!! route('members.index') !!}"><i class="fa fa-times-circle"></i></a>
            </div>
        </div>
        {!! Form::close() !!}
        
        <div class="row form-group">
            <div class="col-sm-12">
                <div class="clearfix"></div>
            
                @include('flash::message')
            
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-sm-12">
                @include('members.table')   
            </div>
        </div>
        <div class="row form-group">
            <div class="col-sm-12 ">
                <span>Total: {{ $members->count()}}</span>
            </div>
        </div>
    </div>
@endsection

