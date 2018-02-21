<!-- /.box-header -->
<div class="box-body">
    <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
    </div>
    <form method="POST" action="{{ route('sucursales.search') }}">
        {{ csrf_field() }}
        <input type="hidden" name="deletedData" value="{{$deletedData}}">
        @component('layouts.search', ['title' => 'Buscar'])
            @component('layouts.two-cols-search-row', ['items' => ['Name'],
            'oldVals' => [isset($searchingVals) ? $searchingVals['sucursales.nombre'] : '']])
            @endcomponent
        @endcomponent
    </form>
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
        <div class="row">
            <div class="col-sm-12">
                <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                    <thead>
                    <tr role="row">
                        <th>Nombre</th>
                        <th>Direccion</th>
                        <th>Comuna</th>
                        <th>Provincia</th>
                        <th>Tipo</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{$sucursales}}
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
            </div>
        </div>
        <div class="row">
            <div class="col-sm-5">
                <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($sucursales)}} of {{count($sucursales)}} entries</div>
            </div>
            <div class="col-sm-7">
                <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                    {{ $sucursales->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.box-body -->