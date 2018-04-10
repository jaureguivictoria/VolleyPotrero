<table class="table table-responsive" id="payments-table">
    <thead>
        <tr>
            <th>Miembro</th>
            <th>Fecha</th>
            <th>Monto</th>
            <th colspan="3">Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($payments as $payment)
        <tr>
            <td><a href="{{route('members.show',$payment->member_id)}}">{!! $payment->member->getFullName() !!}</a></td>
            <td>{!! $payment->created_at->format('d/m/Y H:i') !!}</td>
            <td>$ {!! $payment->amount !!}</td>
            <td>
                {!! Form::open(['route' => ['payments.destroy', $payment->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('payments.show', [$payment->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('payments.edit', [$payment->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Va a eliminar el pago. ¿Está seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>