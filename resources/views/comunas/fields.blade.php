<!-- Regiones Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('regiones_id', 'Región:') !!}
    {!! Form::select('regiones_id', $regiones, '', ['class' => 'form-control js-regiones', 'placeholder'=>'Seleccionar Región']) !!}
</div>

<!-- Pais Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('provincias_id', 'Provincias ID:') !!}
    {!! Form::select('provincias_id', ['0'=>'Seleccionar Provincia'], '', ['class' => 'form-control js-provincias']) !!}
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('comunas.index') !!}" class="btn btn-default">Cancel</a>
</div>

@include('partials.localidades')