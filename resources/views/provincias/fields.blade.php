<!-- Comunas Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('regiones_id', 'Regiones Id:') !!}
    {!! Form::select('regiones_id', $regiones, '', ['class' => 'form-control', 'placeholder' => 'Seleccionar Región']) !!}
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('provincias.index') !!}" class="btn btn-default">Cancel</a>
</div>
