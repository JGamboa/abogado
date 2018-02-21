<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Nombre</th>
        <th>Direccion</th>
        <th>Comuna</th>
        <th>Provincia</th>
        <th>Tipo</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($sucursales as $sucursal)
            <tr role="row" class="odd">
                <td>{{ $sucursal->nombre }}</td>
                <td>{{ $sucursal->direccion }}</td>
                <td>{{ $sucursal->comuna->nombre }}</td>
                <td>{{ $sucursal->provincia->nombre }}</td>
                <td>{{ $sucursal->getTipoTexto() }}</td>
                <td>
                    @if ($deletedData == 0)
                        <form method="POST" action="{{ route('sucursales.destroy', ['id' => $sucursal->id]) }}" onsubmit = "return confirm('Segurar de eliminar?')">
                            @elseif ($deletedData == 1)
                                <form method="GET" action="{{ route('sucursales.restore', ['id' => $sucursal->id]) }}" onsubmit = "return confirm('Seguro de restaurar?')">
                                    @endif
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    @if ($deletedData == 0)
                                        <a href="{{ route('sucursales.edit', ['id' => $sucursal->id]) }}" class="btn btn-warning btn-xs btn-margin">
                                            <i class="glyphicon glyphicon-edit"></i>
                                        </a>
                                    @endif
                                    <button type="submit" class="btn {{$btn}} btn-margin btn-xs"> <i class="glyphicon {{$text_button}}"></i></button>
                                </form>
                </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th>Nombre</th>
        <th>Direccion</th>
        <th>Comuna</th>
        <th>Provincia</th>
        <th>Tipo</th>
        <th>Acciones</th>
    </tr>
    </tfoot>
</table>