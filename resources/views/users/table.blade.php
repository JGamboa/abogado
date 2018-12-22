<table class="table table-bordered table-striped table-hover" id="data-table">
    <thead>
    <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Roles</th>
        <th>Fecha Creaci&oacute;n</th>
        @can('edit_users', 'delete_users')
            <th class="text-center">Acciones</th>
        @endcan
    </tr>
    </thead>
    <tbody>
    @foreach($result as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->roles->implode('name', ', ') }}</td>
            <td>{{ $item->created_at->toFormattedDateString() }}</td>

            @can('edit_users')
                <td class="text-center">
                    @include('shared._actions', [
                        'entity' => 'usuarios',
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