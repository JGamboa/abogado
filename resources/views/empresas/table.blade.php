<!-- /.box-header -->
<div class="box-body">
    <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
    </div>
    <form method="POST" action="{{ route('empresas.search') }}">
        {{ csrf_field() }}
        <input type="hidden" name="deletedData" value="{{$deletedData}}">
        @component('layouts.search', ['title' => 'Buscar'])
            @component('layouts.two-cols-search-row', ['items' => ['Name'],
            'oldVals' => [isset($searchingVals) ? $searchingVals['empresas.razon_social'] : '']])
            @endcomponent
        @endcomponent
    </form>
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
        <div class="row">
            <div class="col-sm-12">
                <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                    <thead>
                    <tr role="row">
                        <th>Rut</th>
                        <th>Razon Social</th>
                        <th>Nombre Fantasia</th>
                        <th>Direcci&oacute;n</th>
                        <th>Comuna</th>
                        <th>Provincia</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{$empresas}}
                    @foreach ($empresas as $empresa)
                        <tr role="row" class="odd">
                            <td>{{ $empresa->rut }}</td>
                            <td>{{ $empresa->razon_social }}</td>
                            <td>{{ $empresa->nombre_fantasia }}</td>
                            <td>{{ $empresa->direccion }}</td>
                            <td>{{ $empresa->comuna->nombre }}</td>
                            <td>{{ $empresa->provincia->nombre }}</td>
                            <td>
                                @if ($deletedData == 0)
                                    <form method="POST" action="{{ route('empresas.destroy', ['id' => $empresa->id]) }}" onsubmit = "return confirm('Segurar de eliminar?')">
                                        @elseif ($deletedData == 1)
                                            <form method="GET" action="{{ route('empresas.restore', ['id' => $empresa->id]) }}" onsubmit = "return confirm('Seguro de restaurar?')">
                                                @endif
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                @if ($deletedData == 0)
                                                    <a href="{{ route('empresas.edit', ['id' => $empresa->id]) }}" class="btn btn-warning btn-xs btn-margin">
                                                        <i class="glyphicon glyphicon-edit"></i>
                                                    </a>
                                                @endif
                                                <button type="submit" class="btn {{$btn}} btn-margin btn-xs"> <i class="glyphicon {{$text_button}}"></i></button>
                                                <button id="empresa-{{$empresa->id}}" type="button" alt="ver sucursales" class="btn btn-info btn-margin btn-xs ver-sucursales"><i class="glyphicon glyphicon-home"></i></button>
                                            </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Rut</th>
                        <th>Razon Social</th>
                        <th>Nombre Fantasia</th>
                        <th>Direcci&oacute;n</th>
                        <th>Comuna</th>
                        <th>Provincia</th>
                        <th>Acciones</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-5">
                <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($empresas)}} of {{count($empresas)}} entries</div>
            </div>
            <div class="col-sm-7">
                <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                    {{ $empresas->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.box-body -->