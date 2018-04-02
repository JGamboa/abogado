<!-- Cliente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cliente', 'Cliente:') !!}
    {!! Form::text('cliente', null, ['class' => 'form-control']) !!}
</div>

<!-- Contraparte Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contraparte', 'Contraparte:') !!}
    {!! Form::text('contraparte', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Recurso Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_recurso', 'Fecha Recurso:') !!}
    {!! Form::date('fecha_recurso', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Captacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_captacion', 'Fecha Captacion:') !!}
    {!! Form::date('fecha_captacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Captador Field -->
<div class="form-group col-sm-6">
    {!! Form::label('captador', 'Captador:') !!}
    {!! Form::select('captador', $empleados, '', ['class' => 'form-control', 'placeholder'=>'Seleccionar Empleado']) !!}
</div>

<!-- Rol Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rol', 'Rol:') !!}
    {!! Form::text('rol', null, ['class' => 'form-control']) !!}
</div>

<!-- Materia Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('materia_id', 'Materia:') !!}
    {!! Form::select('materia_id', $materias, '', ['class' => 'form-control', 'placeholder'=>'Seleccionar Materia']) !!}
</div>

<script>
    var materias_estados = {!! $json !!};
</script>

<!-- Estadocaso Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estadocaso_id', 'Estado:') !!}
    {!! Form::select('estadocaso_id', $estados, '', ['class' => 'form-control', 'placeholder'=>'Seleccionar Estado']) !!}
</div>

<!-- Corte Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('corte_id', 'Corte:') !!}
    {!! Form::select('corte_id', $cortes, '', ['class' => 'form-control', 'placeholder'=>'Seleccionar Corte']) !!}
</div>

<!-- Tribunal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tribunal', 'Tribunal:') !!}
    {!! Form::text('tribunal', null, ['class' => 'form-control']) !!}
</div>

<!-- Responsable Proceso Field -->
<div class="form-group col-sm-6">
    {!! Form::label('responsable_proceso', 'Responsable Proceso:') !!}
    {!! Form::select('responsable_proceso', $empleados, '', ['class' => 'form-control', 'placeholder'=>'Seleccionar Empleado']) !!}
</div>

<!-- Pyp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pyp', 'Pyp:') !!}
    {!! Form::checkbox('pyp', '1', null) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('casos.index') !!}" class="btn btn-default">Cancel</a>
</div>

@push('custom-scripts')
<script type="text/javascript">
    function limpiar(){
        $("#estadocaso_id option").hide();
        $('#estadocaso_id option[value=""]').show();
    }

    function checkEstadoMateria(Element){
        limpiar();


        largo = materias_estados[Element.value].length;
        if(largo == 0){
            $("#estadocaso_id option").show();
        }else{
            $.each(materias_estados[Element.value], function(i, item){
                $("#estadocaso_id option[value="+item+"]").show();
            });
        }
    }

    $( document ).ready(function() {
        limpiar();

        $("#materia_id").change(function(){
            checkEstadoMateria(this);
        });

    })
</script>
@endpush