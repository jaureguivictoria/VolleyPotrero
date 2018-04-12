<table class="table table-responsive" id="payments-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Periodo</th>
            <th>Fecha de pago</th>
            <th>Monto</th>
            <th>Estado</th>
            <th colspan="3">Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($member->payments as $payment)
        <tr>
            <td>{!! $payment->id !!}</td>
            <td>{!! $payment->created_at->format('m/Y') !!}</td>
            <td>{!! empty($payment->payed_at) ? null : $payment->payed_at->format('d/m/Y H:i') !!}</td>
            <td>$ {!! $payment->amount !!}</td>
            <td>{!! $payment->getStatusLabel()!!}</td>
            <td>
                <div class='btn-group'>
                    <a href="{!! route('payments.show', [$payment->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    @if ($payment->status == 'UNPAYED')
                        {!! Form::open(['route' => ['payments.pay', $payment->id], 'method' => 'patch']) !!}
                            {!! Form::button('<i class="fa fa-money-bill-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-success btn-xs', 'onclick' => "return confirm('Va a registrar el pago. ¿Está seguro?')"]) !!}
                        {!! Form::close() !!}
                    @else
                        <a href="{!! route('payments.edit', [$payment->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                        {!! Form::open(['route' => ['payments.destroy', $payment->id], 'method' => 'delete']) !!}
                            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Va a eliminar el pago. ¿Está seguro?')"]) !!}
                        {!! Form::close() !!}
                    @endif
                </div>
                
            </td>
        </tr>
    @endforeach
    </tbody>
</table>