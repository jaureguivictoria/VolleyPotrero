<div class="card">
    <div class="card-header">
        <h3 class="pull-left">Pagos</h3>
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
        <div class="row form-group">
            <div class="col-sm-12 text-center">
                {{ $payments->links() }}
            </div>
        </div>
    </div>
</div>