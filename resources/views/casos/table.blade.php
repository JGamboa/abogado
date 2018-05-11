<input type="hidden" name="_token" id="token_editstrap" value="{{ csrf_token() }}">
<table class="table table-responsive" id="casos-table" style="font-size: 12px;">
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
            <td>{!! isset($caso->cliente->nombres) ? $caso->getNombreCompleto($caso->cliente) : null !!}</td>
            <td>{!! isset($caso->contraparte->nombres) ? $caso->getNombreCompleto($caso->contraparte) : null !!}</td>
            <td>{!! $caso->fecha_recurso->format('d-m-Y') !!}</td>
            <td>{!! $caso->fecha_captacion->format('d-m-Y') !!}</td>
            <td>{!! $caso->datosCaptador->nombreCompleto !!}</td>
            <td><span class="editable" name="rol" data-edit-pk="{{ $caso->id }}">{!! $caso->rol !!}</span></td>
            <td>{!! $caso->materia->nombre !!}</td>
            <td><span class="editable-estado" name="estadocaso_id" data-edit-pk="{{ $caso->id }}">{!! $caso->estadocaso->nombre !!}</span></td>
            <td><span class="editable-corte" name="corte_id" data-edit-pk="{{ $caso->id }}">{!! $caso->corte->nombre !!}</td>
            <td>
                <span class="editable" name="tribunal" data-edit-pk="{{ $caso->id }}">{!! $caso->tribunal !!}</span>
            </td>
            <td>{!! $caso->datosResponsable->nombreCompleto !!}</td>
            <td>{!! $caso->pyp == 1 ? 'OK' : '<button type="button" class="btn btn-primary btn-xs" style="background-color:red">PENDIENTE</button>' !!}</td>
            <td>
                {!! Form::open(['route' => ['casos.destroy', $caso->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <!-- <a href="{!! route('casos.show', [$caso->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> -->
                    <a href="{!! route('casos.edit', [$caso->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@push('custom-scripts')
    <script src="{{ URL::asset('js/editstrap.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/editstrap.css') }}">
    <script type="text/javascript">
        $(function() {
            $(".editable").editstrap({
                type:'text',
                validateValue:function(value){
                    if(value == undefined || value ==''){
                        return {success:false, message:'Should not be empty'}
                    }
                    return {success:true, message:''}
                },
                url : '{{ route('casos.editar-en-linea') }}',
            });


            $(".editable-estado").editstrap({
                type:'select',
                url : '{{ route('casos.editar-en-linea') }}',
                validateValue:function(value){
                    if(value == undefined || value ==''){
                        return {success:false, message:'Should not be empty'}
                    }
                    return {success:true, message:''}
                },
                dataSelect:[
                    @foreach($estados as $estado)
                        {value: '{{$estado->id}}', text: '{{$estado->nombre}}'},
                    @endforeach
                    ]
            });

            $(".editable-corte").editstrap({
                type:'select',
                url : '{{ route('casos.editar-en-linea') }}',
                validateValue:function(value){
                    if(value == undefined || value ==''){
                        return {success:false, message:'Should not be empty'}
                    }
                    return {success:true, message:''}
                },
                dataSelect:[
                        @foreach($cortes as $corte)
                    {value: '{{$corte->id}}', text: '{{$corte->nombre}}'},
                    @endforeach
                ]
            });
        });
    </script>
@endpush
