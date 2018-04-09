@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row form-group">
            <div class="col-sm-10">
                <h1 class="pull-left">Miembros</h1>
            </div>
            <div class="col-sm-2">
                <h1 class="pull-right">
                    <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('members.create') !!}">Agregar</a>
                </h1>
            </div>
        </div>
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
                {{ $members->links() }}
            </div>
        </div>
    </div>
@endsection

