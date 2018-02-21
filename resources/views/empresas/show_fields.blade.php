<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $empresa->id !!}</p>
</div>

<!-- Rut Field -->
<div class="form-group">
    {!! Form::label('rut', 'Rut:') !!}
    <p>{!! $empresa->rut !!}</p>
</div>

<!-- Razon Social Field -->
<div class="form-group">
    {!! Form::label('razon_social', 'Razon Social:') !!}
    <p>{!! $empresa->razon_social !!}</p>
</div>

<!-- Nombre Fantasia Field -->
<div class="form-group">
    {!! Form::label('nombre_fantasia', 'Nombre Fantasia:') !!}
    <p>{!! $empresa->nombre_fantasia !!}</p>
</div>

<!-- Direccion Field -->
<div class="form-group">
    {!! Form::label('direccion', 'Direccion:') !!}
    <p>{!! $empresa->direccion !!}</p>
</div>

<!-- Comunas Id Field -->
<div class="form-group">
    {!! Form::label('comunas_id', 'Comunas Id:') !!}
    <p>{!! $empresa->comuna->nombre !!}</p>
</div>

<!-- Provincias Id Field -->
<div class="form-group">
    {!! Form::label('provincias_id', 'Provincias Id:') !!}
    <p>{!! $empresa->provincia->nombre !!}</p>
</div>

<!-- Logotipo Field -->
<div class="form-group">
    {!! Form::label('logotipo', 'Logotipo:') !!}
    <p>{!! $empresa->logotipo !!}</p>
</div>

