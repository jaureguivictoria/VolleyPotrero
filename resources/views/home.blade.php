@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-2">
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-primary">Pagos</strong>
                    <h3 class="mb-0">
                        <a class="text-dark" href="{{route('payments.index')}}">Administrar pagos</a>
                    </h3>
                    <p class="card-text mb-auto">Ver deudores, agregar nuevos pagos, administrar valor cuota.</p>
                    <a href="{{route('payments.index')}}">Ir a pagos</a>
                </div>
                <img class="card-img-right flex-auto d-none d-md-block" src="{{asset('/img/payments.jpeg')}}" alt="Pagos">
            </div>
        </div>
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-success">Participantes</strong>
                    <h3 class="mb-0">
                    <a class="text-dark" href="{{route('members.index')}}">Equipo</a>
                </h3>
                
                <p class="card-text mb-auto">Editar detalles de contacto de un participante. Agregar nuevos participantes. Quitar participantes.</p>
                <a href="{{route('members.index')}}">Ir a Equipo</a>
                </div>
                <img class="card-img-right flex-auto d-none d-md-block" src="{{asset('/img/match.png')}}" alt="Participantes">
            </div>
        </div>
    </div>
</div>

@endsection
