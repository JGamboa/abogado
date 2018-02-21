<!-- /.box-header -->
<div class="box-body">
    <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
    </div>
    <form method="POST" action="{{ route('regiones.search') }}">
        {{ csrf_field() }}
        <input type="hidden" name="deletedData" value="{{$deletedData}}">
        @component('layouts.search', ['title' => 'Buscar'])
            @component('layouts.two-cols-search-row', ['items' => ['Name'],
            'oldVals' => [isset($searchingVals) ? $searchingVals['regiones.nombre'] : '']])
            @endcomponent
        @endcomponent
    </form>
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
        <div class="row">
            <div class="col-sm-12">
                <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                    <thead>
                    <tr role="row">
                        <th width="20%" rowspan="1" colspan="1">Nombre Pa&iacute;s</th>
                        <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="ciudad: activate to sort column ascending">Nombre Región</th>
                        <th width="30%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="region: activate to sort column ascending">ISO_3166_2_CL</th>
                        <th tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{$regiones}}
                    @foreach ($regiones as $region)
                        <tr role="row" class="odd">
                            <td>{{ $region->pais->nombre }}</td>
                            <td>{{ $region->nombre }}</td>
                            <td>{{ $region->ISO_3166_2_CL }}</td>
                            <td>
                                @if ($deletedData == 0)
                                    <form method="POST" action="{{ route('regiones.destroy', ['id' => $region->id]) }}" onsubmit = "return confirm('Seguro de eliminar?')">
                                        @elseif ($deletedData == 1)
                                            <form method="GET" action="{{ route('regiones.restore', ['id' => $region->id]) }}" onsubmit = "return confirm('Seguro de restaurar?')">
                                                @endif
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                @if ($deletedData == 0)
                                                    <a href="{{ route('regiones.edit', ['id' => $region->id]) }}" class="btn btn-warning btn-xs btn-margin">
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
                        <th width="20%" rowspan="1" colspan="1">Nombre Pa&iacute;s</th>
                        <th width="20%" rowspan="1" colspan="1">Nombre Región</th>
                        <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="state: activate to sort column ascending">ISO_3166_2_CL</th>
                        <th rowspan="1" colspan="2">Acciones</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-5">
                <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($regiones)}} of {{count($regiones)}} entries</div>
            </div>
            <div class="col-sm-7">
                <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                    {{ $regiones->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.box-body -->