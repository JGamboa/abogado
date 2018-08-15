<!-- Nombres Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombres', 'Nombres:') !!}
    {!! Form::text('nombres', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6" style="height:59px;">

</div>

<!-- Apellido Paterno Field -->
<div class="form-group col-sm-6">
    {!! Form::label('apellido_paterno', 'Apellido Paterno:') !!}
    {!! Form::text('apellido_paterno', null, ['class' => 'form-control']) !!}
</div>

<!-- Apellido Materno Field -->
<div class="form-group col-sm-6">
    {!! Form::label('apellido_materno', 'Apellido Materno:') !!}
    {!! Form::text('apellido_materno', null, ['class' => 'form-control']) !!}
</div>


<!-- Rut Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rut', 'Rut:') !!}
    {!! Form::text('rut', null, ['class' => 'form-control']) !!}
</div>


<!-- Direccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('direccion', 'Direccion:') !!}
    {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
</div>



<!-- Region Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('region_id', 'Región:') !!}
    {!! Form::select('region_id', $regiones, null, ['class' => 'form-control js-regiones', 'placeholder'=>'Seleccionar Región']) !!}
</div>

<!-- Provincia Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('provincia_id', 'Provincia:') !!}
    {!! Form::select('provincia_id', $provincias, null, ['class' => 'form-control js-provincias', 'placeholder'=>'Seleccionar Provincia']) !!}
</div>

<!-- Comuna Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('comuna_id', 'Comuna:') !!}
    {!! Form::select('comuna_id', $comunas, null, ['class' => 'form-control js-comunas', 'placeholder'=>'Seleccionar Comuna']) !!}
</div>

<!-- Oficio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('oficio', 'Profesión:') !!}
    {!! Form::text('oficio', null, ['class' => 'form-control']) !!}
</div>

<!-- Telefonos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefonos', 'Telefonos:') !!}
    {!! Form::text('telefonos', null, ['class' => 'form-control']) !!}
</div>

<!-- Correo Electronico Field -->
<div class="form-group col-sm-6">
    {!! Form::label('correo_electronico', 'Correo Electronico:') !!}
    {!! Form::text('correo_electronico', null, ['class' => 'form-control']) !!}
</div>

<!-- Isapre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('isapre_id', 'Isapre:') !!}
    {!! Form::select('isapre_id', $isapres, '', ['class' => 'form-control']) !!}
</div>

<!-- Observacion Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('observacion', 'Observacion:') !!}
    {!! Form::textarea('observacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('intervinientes.index') !!}" class="btn btn-default">Cancel</a>
</div>


@include('partials.localidades')