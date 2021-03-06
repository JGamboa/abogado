<div class="box-body">
    <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
    </div>
    <form method="POST" action="{{ route('provincias.search') }}">
        {{ csrf_field() }}
        <input type="hidden" name="deletedData" value="{{$deletedData}}">
        @component('layouts.search', ['title' => 'Buscar'])
            @component('layouts.two-cols-search-row', ['items' => ['Name'],
            'oldVals' => [isset($searchingVals) ? $searchingVals['provincias.nombre'] : '']])
            @endcomponent
        @endcomponent
    </form>
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
        <div class="row">
            <div class="col-sm-12">
                <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                    <thead>
                    <tr role="row">
                        <th>Nombre Ciudad</th>
                        <th>Nombre Regi&oacute;n</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{$provincias}}
                    @foreach ($provincias as $ciudad)
                        <tr role="row" class="odd">
                            <td>{{ $ciudad->nombre }}</td>
                            <td>{{ $ciudad->nombre_region }}</td>
                            <td>
                                @if ($deletedData == 0)
                                    <form method="POST" action="{{ route('provincias.destroy', ['id' => $ciudad->id]) }}" onsubmit = "return confirm('Seguro de eliminar?')">
                                        @elseif ($deletedData == 1)
                                            <form method="GET" action="{{ route('provincias.restore', ['id' => $ciudad->id]) }}" onsubmit = "return confirm('Seguro de restaurar?')">
                                                @endif
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                @if ($deletedData == 0)
                                                    <a href="{{ route('provincias.edit', ['id' => $ciudad->id]) }}" class="btn btn-warning btn-xs btn-margin">
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
                        <th>Nombre Ciudad</th>
                        <th>Nombre Regi&oacute;n</th>
                        <th>Acciones</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-5">
                <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($provincias)}} of {{count($provincias)}} entries</div>
            </div>
            <div class="col-sm-7">
                <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                    {{ $provincias->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.box-body -->