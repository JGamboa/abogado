<table class="table table-responsive" id="estadoscasos-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($estadoscasos as $estadoCaso)
        <tr>
            <td>{!! $estadoCaso->nombre !!}</td>
            <td>
                {!! Form::open(['route' => ['estadoscasos.destroy', $estadoCaso->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('estadoscasos.show', [$estadoCaso->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('estadoscasos.edit', [$estadoCaso->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>