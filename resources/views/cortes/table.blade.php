<table class="table table-responsive" id="cortes-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($cortes as $corte)
        <tr>
            <td>{!! $corte->nombre !!}</td>
            <td>
                {!! Form::open(['route' => ['cortes.destroy', $corte->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('cortes.show', [$corte->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('cortes.edit', [$corte->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>