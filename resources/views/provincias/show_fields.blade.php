<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $ciudad->id !!}</p>
</div>

<!-- Comunas Id Field -->
<div class="form-group">
    {!! Form::label('comunas_id', 'Comunas Id:') !!}
    <p>{!! $ciudad->comunas_id !!}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $ciudad->nombre !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $ciudad->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $ciudad->updated_at !!}</p>
</div>

