<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $sucursal->id !!}</p>
</div>

<!-- Empresas Id Field -->
<div class="form-group">
    {!! Form::label('empresas_id', 'Empresas Id:') !!}
    <p>{!! $sucursal->empresas_id !!}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $sucursal->nombre !!}</p>
</div>

<!-- Direccion Field -->
<div class="form-group">
    {!! Form::label('direccion', 'Direccion:') !!}
    <p>{!! $sucursal->direccion !!}</p>
</div>

<!-- Comunas Id Field -->
<div class="form-group">
    {!! Form::label('comunas_id', 'Comunas Id:') !!}
    <p>{!! $sucursal->comuna->nombre !!}</p>
</div>

<!-- Provincias Id Field -->
<div class="form-group">
    {!! Form::label('provincias_id', 'Provincias Id:') !!}
    <p>{!! $sucursal->provincia->nombre !!}</p>
</div>

<!-- Tipo Field -->
<div class="form-group">
    {!! Form::label('tipo', 'Tipo:') !!}
    <p>{!! $sucursal->tipo !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $sucursal->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $sucursal->updated_at !!}</p>
</div>

