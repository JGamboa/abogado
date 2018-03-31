<!-- Materia Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('materia_id', 'Materia Id:') !!}
    {!! Form::text('materia_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Estadocaso Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estadocaso_id', 'Estadocaso Id:') !!}
    {!! Form::text('estadocaso_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('estadosMaterias.index') !!}" class="btn btn-default">Cancel</a>
</div>
