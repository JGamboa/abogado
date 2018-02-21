<!-- Rut Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rut', 'Rut:') !!}
    {!! Form::text('rut', null, ['class' => 'form-control']) !!}
</div>

<!-- Razon Social Field -->
<div class="form-group col-sm-6">
    {!! Form::label('razon_social', 'Razon Social:') !!}
    {!! Form::text('razon_social', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Fantasia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre_fantasia', 'Nombre Fantasia:') !!}
    {!! Form::text('nombre_fantasia', null, ['class' => 'form-control']) !!}
</div>

<!-- Direccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('direccion', 'Direccion:') !!}
    {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
</div>

<!-- Regiones Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('regiones_id', 'Región:') !!}
    {!! Form::select('regiones_id', $regiones, '', ['class' => 'form-control js-regiones', 'placeholder'=>'Seleccionar Región']) !!}
</div>

<!-- Provincias Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('provincias_id', 'Provincias Id:') !!}
    {!! Form::select('provincias_id', ['0'=>'Seleccionar Provincia'], '', ['class' => 'form-control js-provincias']) !!}
</div>

<!-- Comunas Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('comunas_id', 'Comunas Id:') !!}
    {!! Form::select('comunas_id', ['0'=>'Seleccionar Comuna'], '', ['class' => 'form-control js-comunas']) !!}
</div>

<!-- Logotipo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('logotipo', 'Logotipo:') !!}
    {!! Form::text('logotipo', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('empresas.index') !!}" class="btn btn-default">Cancel</a>
</div>

@include('partials.localidades')
