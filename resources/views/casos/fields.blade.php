<div class="box box-primary">
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="header">

                        {!! Form::label('cliente_term', 'Cliente') !!}
                    @if(!isset($caso))
                        {!! Form::select('cliente_term', [null], null, ['class' => 'form-control form-group']) !!}
                    @endif

                    <table class="table table-bordered">
                        <tr>
                            <th>Rut</th>
                            <th>Nombre</th>
                            <th>Direcci&oacute;n</th>
                        </tr>
                        <tr>
                            <td id="rut_cliente">{{ isset($caso->cliente) ? $caso->cliente->rut : null }}</td>
                            <td id="nombre_cliente">{{ isset($caso->cliente) ? $caso->getNombreCompleto($caso->cliente) : null }}</td>
                            <td id="direccion_cliente">{{ isset($caso->cliente) ? $caso->getDireccion($caso->cliente) : null }}</td>
                        </tr>
                        <tr>
                            <th>Isapre</th>
                            <th>Profesi&oacute;n</th>
                            <th>Observaci&oacute;n</th>
                        </tr>
                        <tr>
                            <td id="isapre_cliente">{{ isset($caso->cliente) ? $caso->cliente->isapre->nombre : null }}</td>
                            <td id="profesion_cliente">{{ isset($caso->cliente) ? $caso->cliente->oficio : null }}</td>
                            <td id="observacion_cliente">{{ isset($caso->cliente) ? $caso->cliente->observacion : null }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="box box-primary">
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="header">

                        {!! Form::label('contraparte_term', 'Contraparte') !!}
                    @if(!isset($caso))
                        {!! Form::select('contraparte_term', [null], null, ['class' => 'form-control form-group']) !!}
                    @endif

                    <table class="table table-bordered">
                        <tr>
                            <th>Rut</th>
                            <th>Nombre</th>
                            <th>Direcci&oacute;n</th>
                        </tr>
                        <tr>
                            <td id="rut_contraparte">{{ isset($caso->contraparte) ? $caso->contraparte->rut : null }}</td>
                            <td id="nombre_contraparte">{{ isset($caso->cliente) ? $caso->getNombreCompleto($caso->contraparte) : null }}</td>
                            <td id="direccion_contraparte">{{ isset($caso->cliente) ? $caso->getDireccion($caso->contraparte) : null }}</td>
                        </tr>
                        <tr>
                            <th>Isapre</th>
                            <th>Profesi&oacute;n</th>
                            <th>Observaci&oacute;n</th>
                        </tr>
                        <tr>
                            <td id="isapre_contraparte">{{ isset($caso->contraparte) ? $caso->contraparte->isapre->nombre : null }}</td>
                            <td id="profesion_contraparte">{{ isset($caso->contraparte) ? $caso->contraparte->oficio : null }}</td>
                            <td id="observacion_contraparte">{{ isset($caso->contraparte) ? $caso->contraparte->observacion : null }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="box box-primary">
    <div class="box-body">
        <div class="row">
            {!! Form::hidden('cliente_id', isset($caso->cliente) ? $caso->cliente->id : null, ['id'=>'cliente_id'] ) !!}
            {!! Form::hidden('contraparte_id', isset($caso->contraparte) ? $caso->contraparte->id : null, ['id'=>'contraparte_id'] ) !!}

            @role('CAPTADOR')
            @else
                <!-- Fecha Recurso Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('fecha_recurso', 'Fecha Recurso:') !!}
                    {!! Form::date('fecha_recurso', isset($caso->fecha_recurso) ? $caso->fecha_recurso : null, ['class' => 'form-control']) !!}
                </div>
            @endrole

            @role('CAPTADOR')
                <!-- Captador Field -->
                {!! Form::hidden('captador', \Illuminate\Support\Facades\Auth::user()->empleado->id) !!}

                <!-- Fecha captacion Field -->
                {!! Form::hidden('fecha_captacion', Carbon\Carbon::now()) !!}
            @else

                <!-- Fecha Captacion Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('fecha_captacion', 'Fecha Captacion:') !!}
                    {!! Form::date('fecha_captacion', isset($caso->fecha_captacion) ? $caso->fecha_captacion : null, ['class' => 'form-control']) !!}
                </div>


                <!-- Captador Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('captador', 'Captador:') !!}
                    {!! Form::select('captador', $empleados, isset($caso->captador) ? $caso->captador : null, ['class' => 'form-control', 'placeholder'=>'Seleccionar Empleado']) !!}
                </div>

                <!-- Rol Field -->
                <div class="form-group col-sm-3">
                    {!! Form::label('rol', 'Rol:') !!}
                    {!! Form::text('rol', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Año Rol Field -->
                <div class="form-group col-sm-3">
                    {!! Form::label('anio_rol', 'Año Rol:') !!}
                    {!! Form::text('anio_rol', null, ['class' => 'form-control']) !!}
                </div>
            @endrole

            <!-- Materia Id Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('materia_id', 'Materia:') !!}
                {!! Form::select('materia_id', $materias, isset($caso->materia_id) ? $caso->materia_id : null, ['class' => 'form-control', 'placeholder'=>'Seleccionar Materia']) !!}
            </div>

            <script>
                var materias_estados = {!! $json !!};
            </script>

            <!-- Estadocaso Id Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('estadocaso_id', 'Estado:') !!}
                {!! Form::select('estadocaso_id', $estados, isset($caso->estadocaso_id) ? $caso->estadocaso_id : null, ['class' => 'form-control', 'placeholder'=>'Seleccionar Estado']) !!}
            </div>

            <!-- Corte Id Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('corte_id', 'Corte:') !!}
                {!! Form::select('corte_id', $cortes, isset($caso->corte_id) ? $caso->corte_id : null, ['id'=>'corte_id','class' => 'form-control', 'placeholder'=>'Seleccionar Corte']) !!}
            </div>

            <!-- Tribunal Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('tribunal', 'Tribunal:') !!}
                {!! Form::text('tribunal', null, ['class' => 'form-control']) !!}
            </div>

            @role('CAPTADOR')
            @else
            <!-- Responsable Proceso Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('responsable_proceso', 'Responsable Proceso:') !!}
                {!! Form::select('responsable_proceso', $empleados, isset($caso->responsable_proceso) ? $caso->responsable_proceso : null, ['class' => 'form-control', 'placeholder'=>'Seleccionar Empleado']) !!}
            </div>
            @endrole

            <!-- Pyp Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('pyp', 'AC:') !!}
                {!! Form::checkbox('pyp', '1', null) !!}
            </div>

                <!-- Pyp Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('autorizacion_documentos', 'AD:') !!}
                    {!! Form::checkbox('autorizacion_documentos', '1', null) !!}
                </div>

            <!-- Submit Field -->
            <div class="form-group col-sm-12">
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary pull-right']) !!}
                <a href="{!! route('casos.index') !!}" class="btn btn-default pull-right">Cancelar</a>
            </div>

        </div>
    </div>
</div>
{!! Form::close() !!}


@if(isset($caso))
    @include('casos.upload')
@endif


@if(isset($caso))
    @include('casos.observaciones')
@endif


<div class="clearfix"></div>

@push('custom-scripts')
<script type="text/javascript">

    $("#crearInterviniente-form").submit(function(e){
        e.preventDefault();

        $.ajax({

            type: 'POST',
            url: '{{ route("intervinientes.storeAjax") }}',
            data: $('#crearInterviniente-form').serialize(),
            dataType: 'json',
            success: function (data) {

                if(data.success){
                    $("#nombres").val("");
                    $("#apellido_paterno").val("");
                    $("#apellido_materno").val("");
                    $("#direccion").val("");
                    $("#rut").val("");
                    $("#oficio").val("");
                    $("#telefonos").val("");
                    $("#correo_electronico").val("");
                    $("#isapre_id").val("1");
                    $("#observacion").val("");
                    $("#region_id").val("");
                    $("#provincia_id").val("");
                    $("#comuna_id").val("");
                    alert(data.message);
                }


            },
            error: function (data) {
                alert('No fue posible crear el interviniente');
            }
        });
    });


    function limpiar(){
        $("#estadocaso_id option").hide();
        $('#estadocaso_id option[value=""]').show();
    }

    function checkEstadoMateria(value){
        limpiar();

        largo = materias_estados[value].length;
        if(largo == 0){
            $("#estadocaso_id option").show();
        }else{
            $.each(materias_estados[value], function(i, item){
                $("#estadocaso_id option[value="+item+"]").show();
            });
        }
    }

    $( document ).ready(function() {
        limpiar();

        @if(!isset($caso))
        $('#corte_id').change(function(){

            if($('#tribunal').val() == ""){
                var combo = document.getElementById("corte_id");
                var selected = combo.options[combo.selectedIndex].text;
                $('#tribunal').val(selected);
            }

        });

        @endif

        $('#materia_id').change(function(){
            checkEstadoMateria(this.value);
        });

        if($('#materia_id').val() !== ''){
            checkEstadoMateria($('#materia_id').val());
        }

        @if(!isset($caso))
        if($('#cliente_id').val() !== '') {
            var sendInfo = {
                q: $('#cliente_id').val(),
            };

            $.ajax({
                url: '{{ route('intervinientes.showJson') }}',
                dataType: 'json',
                data: sendInfo,
                success: function(result){
                    data = result.data;
                    $('#cliente_id').val(data.id);
                    $('#rut_cliente').html(data.rut);
                    $('#nombre_cliente').html(data.nombres + ' ' + data.apellido_paterno + ' ' + data.apellido_materno);
                    $('#direccion_cliente').html(data.direccion + ', ' + data.comuna.nombre + ', ' + data.provincia.nombre + ', ' + data.region.nombre);;
                    $('#isapre_cliente').html(data.isapre.nombre);
                    $('#profesion_cliente').html(data.oficio);
                    $('#observacion_cliente').html(data.observacion);
                }
                // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
            });
        }

        if($('#contraparte_id').val() !== '') {
            var sendInfo = {
                q: $('#contraparte_id').val(),
            };

            $.ajax({
                url: '{{ route('intervinientes.showJson') }}',
                dataType: 'json',
                data: sendInfo,
                success: function(result){
                    data = result.data;
                    $('#contraparte_id').val(data.id);
                    $('#rut_contraparte').html(data.rut);
                    $('#nombre_contraparte').html(data.nombres + ' ' + data.apellido_paterno + ' ' + data.apellido_materno);
                    $('#direccion_contraparte').html(data.direccion + ', ' + data.comuna.nombre + ', ' + data.provincia.nombre + ', ' + data.region.nombre);;
                    $('#isapre_contraparte').html(data.isapre.nombre);
                    $('#profesion_contraparte').html(data.oficio);
                    $('#observacion_contraparte').html(data.observacion);
                }
                // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
            });
        }
        @endif

        $('#cliente_term').select2({
            ajax: {
                url: '{{ route('intervinientes.search') }}',
                dataType: 'json',
                processResults: function (data) {
                    // Tranforms the top-level key of the response object from 'items' to 'results'
                    return {
                        results: data
                    };
                }
                // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
            }
        });

        $('#contraparte_term').select2({
            ajax: {
                url: '{{ route('intervinientes.search') }}',
                dataType: 'json',
                processResults: function (data) {
                    // Tranforms the top-level key of the response object from 'items' to 'results'
                    return {
                        results: data
                    };
                }
                // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
            }
        });

        $('#cliente_term').on('select2:select', function (e) {
            var data = e.params.data;
            $('#cliente_id').val(data.id);
            $('#rut_cliente').html(data.rut);
            $('#nombre_cliente').html(data.nombres + ' ' + data.apellido_paterno + ' ' + data.apellido_materno);
            $('#direccion_cliente').html(data.direccion + ', ' + data.comuna.nombre + ', ' + data.provincia.nombre + ', ' + data.region.nombre);
            $('#isapre_cliente').html(data.isapre.nombre);
            $('#profesion_cliente').html(data.oficio);
            $('#observacion_cliente').html(data.observacion);

            console.log(data);
        });

        $('#contraparte_term').on('select2:select', function (e) {
            var data = e.params.data;
            $('#contraparte_id').val(data.id);
            $('#rut_contraparte').html(data.rut);
            $('#nombre_contraparte').html(data.nombres + ' ' + data.apellido_paterno + ' ' + data.apellido_materno);
            $('#direccion_contraparte').html(data.direccion + ', ' + data.comuna.nombre + ', ' + data.provincia.nombre + ', ' + data.region.nombre);
            $('#isapre_contraparte').html(data.isapre.nombre);
            $('#profesion_contraparte').html(data.oficio);
            $('#observacion_contraparte').html(data.observacion);

            console.log(data);
        });
    });

</script>
@endpush
