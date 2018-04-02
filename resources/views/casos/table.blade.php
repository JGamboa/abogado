<table class="table table-responsive" id="casos-table">
    <thead>
        <tr>
            <th>Cliente</th>
            <th>Contraparte</th>
            <th>Fecha Recurso</th>
            <th>Fecha Captacion</th>
            <th>Captador</th>
            <th>Rol</th>
            <th>Materia</th>
            <th>Estado</th>
            <th>Corte</th>
            <th>Tribunal</th>
            <th>Responsable Proceso</th>
            <th>Pyp</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($casos as $caso)

        <tr>
            <td>{!! $caso->cliente !!}</td>
            <td>{!! $caso->contraparte !!}</td>
            <td>{!! $caso->fecha_recurso->format('d-m-Y') !!}</td>
            <td>{!! $caso->fecha_captacion->format('d-m-Y') !!}</td>
            <td>{!! $caso->datosCaptador->nombreCompleto !!}</td>
            <td>{!! $caso->rol !!}</td>
            <td>{!! $caso->materia->nombre !!}</td>
            <td>{!! $caso->estadocaso->nombre !!}</td>
            <td>{!! $caso->corte->nombre !!}</td>
            <td>{!! $caso->tribunal !!}</td>
            <td>{!! $caso->datosResponsable->nombreCompleto !!}</td>
            <td>{!! $caso->pyp !!}</td>
            <td>
                {!! Form::open(['route' => ['casos.destroy', $caso->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('casos.show', [$caso->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('casos.edit', [$caso->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>