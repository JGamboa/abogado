@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Casos</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('casos.create') !!}">Crear</a>
        </h1>
    </section>

    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        @include('adminlte-templates::common.errors')

        <div class="clearfix"></div>

        {!! Form::open(['route' => 'casos.index', 'method'=>'get']) !!}
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Filtros</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">


                <div class="col-md-4 form-group">
                    {!! Form::label('nombres', 'Nombres:') !!}
                    {!! Form::text('nombres', null, ['class' => 'form-control', 'placeholder'=>'Nombres']) !!}
                </div>

                <div class="col-md-4 form-group">
                    {!! Form::label('apellidomaterno', 'Apellido Paterno:') !!}
                    {!! Form::text('apellidopaterno', null, ['class' => 'form-control', 'placeholder'=>'Apellido Paterno']) !!}
                </div>

                <div class="col-md-4 form-group">
                    {!! Form::label('apellidomaterno', 'Apellido Materno:') !!}
                    {!! Form::text('apellidomaterno', null, ['class' => 'form-control', 'placeholder'=>'Apellido Materno']) !!}
                </div>

                <div class="col-md-4 form-group">
                    {!! Form::label('rut', 'Rut:') !!}
                    {!! Form::text('rut', null, ['class' => 'form-control', 'placeholder'=>'Rut']) !!}
                </div>

                <div class="col-md-4 form-group">
                    {!! Form::label('rol', 'Rol:') !!}
                    {!! Form::text('rol', null, ['class' => 'form-control', 'placeholder'=>'Rol']) !!}
                </div>


                <div class="col-md-4 form-group">
                    {!! Form::label('anio_rol', 'Año Rol:') !!}
                    {!! Form::text('anio_rol', null, ['class' => 'form-control', 'placeholder'=>'Año Rol']) !!}
                </div>

                <div class="col-md-4 form-group">
                    {!! Form::label('corte_id', 'Corte:') !!}
                    {!! Form::select('corte_id', $cortes, null, ['id'=>'corte_id','class' => 'form-control', 'placeholder'=>'Seleccionar Corte']) !!}
                </div>


            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    Buscar
                </button>
            </div>


        </div>

        {!! Form::close() !!}

        <div class="box box-primary">
            <div class="box-body" style="overflow:auto">

                    @include('casos.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

