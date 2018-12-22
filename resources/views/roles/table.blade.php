<table class="table table-bordered table-striped table-hover" id="data-table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Guard</th>
        <th>Permisos</th>
        <th>Fecha Creaci&oacute;n</th>
        @can('editar roles', 'borrar roles')
            <th class="text-center">Acciones</th>
        @endcan
    </tr>
    </thead>
    <tbody>
    @foreach($result as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->guard_name }}</td>
            <td>{{ $item->permissions->implode('name', ', ') }}</td>
            <td>{{ $item->created_at->toFormattedDateString() }}</td>

            @can('editar roles')
                <td class="text-center">
                    @include('shared._actions', [
                        'entity' => 'roles',
                        'id' => $item->id
                    ])
                </td>
            @endcan
        </tr>
    @endforeach
    </tbody>
</table>

<div class="text-center">
    {{ $result->links() }}
</div>