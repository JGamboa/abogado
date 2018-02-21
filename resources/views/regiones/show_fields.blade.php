<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $region->id !!}</p>
</div>

<!-- Pais Id Field -->
<div class="form-group">
    {!! Form::label('pais_id', 'Pais Id:') !!}
    <p>{!! $region->pais_id !!}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $region->nombre !!}</p>
</div>

<!-- Iso 3166 2 Cl Field -->
<div class="form-group">
    {!! Form::label('ISO_3166_2_CL', 'Iso 3166 2 Cl:') !!}
    <p>{!! $region->ISO_3166_2_CL !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $region->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $region->updated_at !!}</p>
</div>

