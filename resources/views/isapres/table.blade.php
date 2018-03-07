<table class="table table-responsive" id="isapres-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($isapres as $isapre)
        <tr>
            <td>{!! $isapre->nombre !!}</td>
            <td>
                {!! Form::open(['route' => ['isapres.destroy', $isapre->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('isapres.show', [$isapre->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('isapres.edit', [$isapre->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>