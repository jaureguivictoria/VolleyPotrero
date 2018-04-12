<div class="row mt-3">
    <div class="col-sm-12 text-center">
        <span><i class="fa fa-clipboard-list" style="font-size:70px;"></i></span><br><br>
    </div>
</div>
<div class="row text-center">
    <div class="col-sm-8 offset-sm-2">
        <h3 class="p-3">Pendientes de pago cuota</h3>
        <h5 class="pb-2">Cantidad de miembros: {{$debtors->count()}}</h5>
        <table class="table">
            <thead>
                <tr>
                    <th>Miembro</th>
                    @if (!empty($showTotal))
                    <th>Total adeudado</th>
                    @endif
                    <th>Cantidad de cuotas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($debtors as $debtor)
                    <tr>
                        <td>
                            @if (!empty($showTotal))
                                <a href="{{route('members.show',$debtor->id)}}">{{$debtor->name}} {{$debtor->surname}}</a>
                            @else
                                {{$debtor->name}} {{$debtor->surname}}
                            @endif
                        </td>
                        @if (!empty($showTotal))
                            <td>$ {{$debtor->total}}</td>
                        @endif
                        <td>{{$debtor->quotas}}</td>
                    </tr>    
                @endforeach
            </tbody>
        </table>
    </div>
</div>