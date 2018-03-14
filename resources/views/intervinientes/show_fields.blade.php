<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $interviniente->id !!}</p>
</div>

<!-- Empresa Id Field -->
<div class="form-group">
    {!! Form::label('empresa_id', 'Empresa Id:') !!}
    <p>{!! $interviniente->empresa_id !!}</p>
</div>

<!-- Rut Field -->
<div class="form-group">
    {!! Form::label('rut', 'Rut:') !!}
    <p>{!! $interviniente->rut !!}</p>
</div>

<!-- Nombres Field -->
<div class="form-group">
    {!! Form::label('nombres', 'Nombres:') !!}
    <p>{!! $interviniente->nombres !!}</p>
</div>

<!-- Apellido Paterno Field -->
<div class="form-group">
    {!! Form::label('apellido_paterno', 'Apellido Paterno:') !!}
    <p>{!! $interviniente->apellido_paterno !!}</p>
</div>

<!-- Apellido Materno Field -->
<div class="form-group">
    {!! Form::label('apellido_materno', 'Apellido Materno:') !!}
    <p>{!! $interviniente->apellido_materno !!}</p>
</div>

<!-- Direccion Field -->
<div class="form-group">
    {!! Form::label('direccion', 'Direccion:') !!}
    <p>{!! $interviniente->direccion !!}</p>
</div>

<!-- Region Id Field -->
<div class="form-group">
    {!! Form::label('region_id', 'Region:') !!}
    <p>{!! $interviniente->region->nombre !!}</p>
</div>

<!-- Provincia Id Field -->
<div class="form-group">
    {!! Form::label('provincia_id', 'Provincia:') !!}
    <p>{!! $interviniente->provincia->nombre !!}</p>
</div>

<!-- Comuna Id Field -->
<div class="form-group">
    {!! Form::label('comuna_id', 'Comuna:') !!}
    <p>{!! $interviniente->comuna->nombre !!}</p>
</div>


<!-- Oficio Field -->
<div class="form-group">
    {!! Form::label('oficio', 'Profesión:') !!}
    <p>{!! $interviniente->oficio !!}</p>
</div>

<!-- Telefonos Field -->
<div class="form-group">
    {!! Form::label('telefonos', 'Telefonos:') !!}
    <p>{!! $interviniente->telefonos !!}</p>
</div>

<!-- Correo Electronico Field -->
<div class="form-group">
    {!! Form::label('correo_electronico', 'Correo Electronico:') !!}
    <p>{!! $interviniente->correo_electronico !!}</p>
</div>

<!-- Isapre Field -->
<div class="form-group">
    {!! Form::label('isapre_id', 'Isapre:') !!}
    <p>{!! $interviniente->isapre->nombre !!}</p>
</div>

<!-- Observacion Field -->
<div class="form-group">
    {!! Form::label('observacion', 'Observacion:') !!}
    <p>{!! $interviniente->observacion !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $interviniente->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $interviniente->updated_at !!}</p>
</div>

