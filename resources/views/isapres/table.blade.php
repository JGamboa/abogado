<!-- /.box-header -->
<div class="box-body">
    <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
    </div>

    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
        <div class="row">
            <div class="col-sm-12">
                <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                    <thead>
                    <tr role="row">
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($isapres as $isapre)
                        <tr role="row" class="odd">
                            <td>{{ $isapre->nombre }}</td>
                            <td>
                                {!! Form::open(['route' => ['isapres.destroy', $isapre->id], 'method' => 'delete']) !!}
                                    <a href="{!! route('isapres.show', [$isapre->id]) !!}" class='btn btn-info btn-margin btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                                    <a href="{!! route('isapres.edit', [$isapre->id]) !!}" class='btn btn-warning btn-xs btn-margin'><i class="glyphicon glyphicon-edit"></i></a>
                                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-5">
                <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($isapres)}} of {{count($isapres)}} entries</div>
            </div>
            <div class="col-sm-7">
                <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                    {{ $isapres->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.box-body -->
