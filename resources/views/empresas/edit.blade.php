@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Empresa
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($empresa, ['route' => ['empresas.update', $empresa->id], 'method' => 'patch']) !!}

                   <!-- Rut Field -->
                       <div class="form-group col-sm-6">
                           {!! Form::label('rut', 'Rut:') !!}
                           {!! Form::text('rut', null, ['class' => 'form-control']) !!}
                       </div>

                       <!-- Razon Social Field -->
                       <div class="form-group col-sm-6">
                           {!! Form::label('razon_social', 'Razon Social:') !!}
                           {!! Form::text('razon_social', null, ['class' => 'form-control']) !!}
                       </div>

                       <!-- Nombre Fantasia Field -->
                       <div class="form-group col-sm-6">
                           {!! Form::label('nombre_fantasia', 'Nombre Fantasia:') !!}
                           {!! Form::text('nombre_fantasia', null, ['class' => 'form-control']) !!}
                       </div>

                       <!-- Direccion Field -->
                       <div class="form-group col-sm-6">
                           {!! Form::label('direccion', 'Direccion:') !!}
                           {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
                       </div>

                       <!-- Regiones Id Field -->
                       <div class="form-group col-sm-6">
                           {!! Form::label('region_id', 'Región:') !!}
                           <select class="form-control js-regiones" name="region_id">
                               @foreach ($regiones as $region)
                                   <option value="{{$region->id}}" {{$region->id == $empresa->region_id ? 'selected' : ''}}>{{$region->nombre}}</option>
                               @endforeach
                           </select>
                       </div>

                       <!-- Provincias Id Field -->
                       <div class="form-group col-sm-6">
                           {!! Form::label('provincia_id', 'Provincia Id:') !!}
                           <select class="form-control js-provincias" name="provincia_id">
                               @foreach ($provincias as $provincia)
                                   <option value="{{$provincia->id}}" {{$provincia->id == $empresa->provincia_id ? 'selected' : ''}}>{{$provincia->nombre}}</option>
                               @endforeach
                           </select>
                       </div>

                       <!-- Comunas Id Field -->
                       <div class="form-group col-sm-6">
                           {!! Form::label('comuna_id', 'Comunas Id:') !!}
                           <select class="form-control js-comunas" name="comuna_id">
                               @foreach ($comunas as $comuna)
                                   <option value="{{$comuna->id}}" {{$comuna->id == $empresa->comuna_id ? 'selected' : ''}}>{{$comuna->nombre}}</option>
                               @endforeach
                           </select>
                       </div>

                       <!-- Logotipo Field -->
                       <div class="form-group col-sm-6">
                           {!! Form::label('logotipo', 'Logotipo:') !!}
                           {!! Form::text('logotipo', null, ['class' => 'form-control', 'disabled']) !!}
                       </div>

                       <!-- Submit Field -->
                       <div class="form-group col-sm-12">
                           {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                           <a href="{!! route('empresas.index') !!}" class="btn btn-default">Cancel</a>
                       </div>

                       @include('partials.localidades')


                   {!! Form::close() !!}
               </div>
           </div>
       </div>

       <div class="row">
           <section class="content-header form-group">
               <h1>
                   Subir Logotipo
               </h1>
           </section>
       </div>

       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($empresa, ['route' => ['empresas.subir-logotipo'], 'method' => 'patch', 'files' => true]) !!}
                    <div class="form-group col-sm-12">
                        {!! Form::file('logotipo') !!}
                    </div>
                   <!-- Submit Field -->
                   <div class="form-group col-sm-12">
                       {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                       <a href="{!! route('empresas.index') !!}" class="btn btn-default">Cancel</a>
                   </div>

                   @if($empresa->logotipo !== null)
                        <img src="{{ asset('storage/' . $empresa->logotipo) }}" width="500">
                    @endif

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection