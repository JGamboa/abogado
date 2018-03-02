<!-- Empresas Id Field -->
<div class="form-group col-sm-6 hidden">
    {!! Form::hidden('empresa_id', 'Empresas Id:') !!}
    {!! Form::hidden('empresa_id', session('empresa_id'), ['class' => 'form-control']) !!}
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Direccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('direccion', 'Direccion:') !!}
    {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
</div>

<!-- Comunas Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('comunas_id', 'Comunas Id:') !!}
    {!! Form::text('comunas_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Provincias Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('provincias_id', 'Provincias Id:') !!}
    {!! Form::text('provincias_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo', 'Tipo:') !!}
    {!! Form::text('tipo', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('sucursales.index') !!}" class="btn btn-default">Cancel</a>
</div>
