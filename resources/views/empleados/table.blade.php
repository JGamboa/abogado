<table class="table table-responsive" id="empleados-table">
    <thead>
        <tr>
        <th>Usuario</th>
        <th>Nombres</th>
        <th>Apellido Paterno</th>
        <th>Apellido Materno</th>
        <th>Admin</th>
        <th colspan="">Action</th>
        <th>Asignar Usuario</th>
        </tr>
    </thead>
    <tbody>
    @foreach($empleados as $empleado)

        <tr>
            <td>{!! $empleado->user ? $empleado->user->email : '' !!}</td>
            <td>{!! $empleado->nombres !!}</td>
            <td>{!! $empleado->apellido_paterno !!}</td>
            <td>{!! $empleado->apellido_materno !!}</td>
            <td>{!! $empleado->admin == true ? '<i class="glyphicon glyphicon-check"></i>' : '' !!}</td>
            <td>
                {!! Form::open(['route' => ['empleados.destroy', $empleado->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('empleados.show', [$empleado->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('empleados.edit', [$empleado->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
            <td>
                <a href="{!! route('empleados.asignar-usuario', [$empleado->id]) !!}" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-user"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>