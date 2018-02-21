<!-- Pais Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pais_id', 'Pais Id:') !!}
    {!! Form::text('pais_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Iso 3166 2 Cl Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ISO_3166_2_CL', 'Iso 3166 2 Cl:') !!}
    {!! Form::text('ISO_3166_2_CL', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('regiones.index') !!}" class="btn btn-default">Cancel</a>
</div>
