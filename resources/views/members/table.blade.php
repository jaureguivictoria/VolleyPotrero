<table class="table table-responsive" id="members-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Edad</th>
            <th>DNI</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th colspan="3">Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($members as $member)
        <tr>
            <td>{!! $member->name !!}</td>
            <td>{!! $member->surname !!}</td>
            <td>{!! empty($member->birthday) ? '' : $member->getAge() !!}</td>
            <td>{!! $member->dni !!}</td>
            <td>{!! $member->phone !!}</td>
            <td>{!! $member->email !!}</td>
            <td>
                
                <div class='btn-group'>
                    <a href="{!! route('members.show', [$member->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"></i></a>
                    @if (!$member->trashed())
                        <a href="{!! route('members.edit', [$member->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                        {!! Form::open(['route' => ['members.destroy', $member->id], 'method' => 'delete']) !!}
                            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Va a eliminar a este miembro. ¿Está seguro?')"]) !!}
                        {!! Form::close() !!}
                    @else
                        {!! Form::open(['route' => ['members.restore', $member->id], 'method' => 'patch']) !!}
                            {!! Form::button('<i class="fa fa-undo"></i>', ['type' => 'submit', 'class' => 'btn btn-success btn-xs', 'onclick' => "return confirm('Va a restaurar a este miembro. ¿Está seguro?')"]) !!}
                        {!! Form::close() !!}
                    @endif
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>