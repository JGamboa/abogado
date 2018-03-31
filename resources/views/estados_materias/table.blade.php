<table class="table table-responsive" id="estadosMaterias-table">
    <thead>
        <tr>
            <th>Materia Id</th>
        <th>Estadocaso Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($estadosMaterias as $estadoMateria)
        <tr>
            <td>{!! $estadoMateria->materia->nombre !!}</td>
            <td>{!! $estadoMateria->estadoCaso->nombre !!}</td>
            <td>
                {!! Form::open(['route' => ['estadosMaterias.destroy', $estadoMateria->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('estadosMaterias.show', [$estadoMateria->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('estadosMaterias.edit', [$estadoMateria->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>