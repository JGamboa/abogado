<table class="table table-responsive" id="materias-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Color</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($materias as $materia)
        <tr>
            <td>{!! $materia->nombre !!}</td>
            <td>{!! $materia->color !!} <button type="button" class="btn btn-primary btn-xs" style="background-color:{!! $materia->color !!}">Color</button></td>
            <td>
                {!! Form::open(['route' => ['materias.destroy', $materia->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('materias.show', [$materia->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('materias.edit', [$materia->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>