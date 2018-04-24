@extends('layouts.app')

@section('content')
<div class="container">
    @include('payments.payments_index')
    
    <br>
    
    <div class="card">
        <div class="card-header">
            <div class="row">
                <h3 class="col-sm-8">{{count($debtors)}} Deudores</h3>
                <h5 class="col-sm-4">Periodo: <strong>{{$from}}</strong> al <strong>{{$to}}</strong></h5>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach ($debtors->chunk(10) as $debtorsSplit)
                    <div class="col-sm-4">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Miembro</th>
                                    <th>Monto</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($debtorsSplit as $debtor)
                                    <tr>
                                        <td>
                                            <a href="{{route('members.show',$debtor->member_id)}}">{{$debtor->member->getFullName()}}</a>
                                        </td>
                                        <td>$ {{$debtor->amount}}</td>
                                        <td>
                                            {!! Form::open(['route' => ['payments.pay', $debtor->id], 'method' => 'patch']) !!}
                                            <div class='btn-group'>
                                                {!! Form::button('<i class="fa fa-money-bill-alt"></i>&nbsp;Pagar cuota', ['type' => 'submit', 'class' => 'btn btn-success btn-xs', 'onclick' => "return confirm('Está a punto de registrar un pago. ¿Desea continuar?')"]) !!}
                                            </div>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection

