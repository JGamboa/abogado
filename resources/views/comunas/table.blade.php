<div class="box-body">
    <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
    </div>
    <form method="POST" action="{{ route('comunas.search') }}">
        {{ csrf_field() }}
        <input type="hidden" name="deletedData" value="{{$deletedData}}">
        @component('layouts.search', ['title' => 'Search'])
            @component('layouts.two-cols-search-row', ['items' => ['Name'],
            'oldVals' => [isset($searchingVals) ? $searchingVals['comunas.nombre'] : '']])
            @endcomponent
        @endcomponent
    </form>
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
        <div class="row">
            <div class="col-sm-12">
                <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                    <thead>
                    <tr role="row">
                        <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="comunas: activate to sort column ascending">Nombre Comuna</th>
                        <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="pais: activate to sort column ascending">Nombre Provincia</th>
                        <th tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($states as $state)
                        <tr role="row" class="odd">
                            <td>{{ $state->nombre }}</td>
                            <td>{{ $state->nombre_provincia }}</td>
                            <td>
                                @if ($deletedData == 0)
                                    <form method="POST" action="{{ route('comunas.destroy', ['id' => $state->id]) }}" onsubmit = "return confirm('Are you sure?')">
                                        @elseif ($deletedData == 1)
                                            <form method="GET" action="{{ route('comunas.restore', ['id' => $state->id]) }}" onsubmit = "return confirm('Are you sure?')">
                                                @endif
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                @if ($deletedData == 0)
                                                    <a href="{{ route('comunas.edit', ['id' => $state->id]) }}" class="btn btn-warning btn-xs btn-margin">
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
                        <th width="20%" rowspan="1" colspan="1">Nombre Comuna</th>
                        <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="provincia: activate to sort column ascending">Nombre Provincia</th>
                        <th rowspan="1" colspan="2">Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-5">
                <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($states)}} of {{count($states)}} entries</div>
            </div>
            <div class="col-sm-7">
                <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                    {{ $states->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.box-body -->