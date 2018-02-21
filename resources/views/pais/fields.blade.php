<!-- Codigo Pais Field -->
<div class="form-group col-sm-6">
    {!! Form::label('codigo_pais', 'Codigo Pais:') !!}
    {!! Form::text('codigo_pais', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pais.index') !!}" class="btn btn-default">Cancel</a>
</div>
