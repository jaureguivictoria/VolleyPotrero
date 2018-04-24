<div class="card">
    <div class="card-header">
        <div class="row">
            <h3 class="col-sm-8">{{count($payments)}} Pagos</h3>
            <h5 class="col-sm-4">Periodo: <strong>{{$from}}</strong> al <strong>{{$to}}</strong></h5>
        </div>
    </div>
    <div class="card-body">
        <div class="row form-group">
            <div class="col-sm-2">
                <h1 class="pull-right">
                    <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('payments.create') !!}">Registrar</a>
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
                @include('payments.table')
            </div>
        </div>
    </div>
</div>