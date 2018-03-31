<table class="table table-responsive" id="intervinientes-table">
    <thead>
        <tr>
            <th>Rut</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Direccion</th>
            <th>Region</th>
            <th>Provincia</th>
            <th>Comuna</th>
            <th>Profesi&oacute;n</th>
            <th>Telefonos</th>
            <th>Correo Electronico</th>
            <th>Isapre</th>
            <th>Observacion</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($intervinientes as $interviniente)
        <tr>
            <td>{!! $interviniente->rut !!}</td>
            <td>{!! $interviniente->nombres !!}</td>
            <td>{!! $interviniente->apellido_paterno . " " . $interviniente->apellido_materno !!}</td>
            <td>{!! $interviniente->direccion !!}</td>
            <td>{!! $interviniente->region->nombre !!}</td>
            <td>{!! $interviniente->provincia->nombre !!}</td>
            <td>{!! $interviniente->comuna->nombre !!}</td>
            <td>{!! $interviniente->oficio !!}</td>
            <td>{!! $interviniente->telefonos !!}</td>
            <td>{!! $interviniente->correo_electronico !!}</td>
            <td>{!! $interviniente->isapre->nombre !!}</td>
            <td>{!! $interviniente->observacion !!}</td>
            <td>
                {!! Form::open(['route' => ['intervinientes.destroy', $interviniente->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('intervinientes.show', [$interviniente->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('intervinientes.edit', [$interviniente->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>