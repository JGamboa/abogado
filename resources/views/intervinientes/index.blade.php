@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Clientes</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('intervinientes.create') !!}">Crear</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        @include('adminlte-templates::common.errors')

        <div class="clearfix"></div>

        {!! Form::open(['route' => 'intervinientes.index', 'method'=>'get']) !!}
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
                    {!! Form::label('apellido_materno', 'Apellido Paterno:') !!}
                    {!! Form::text('apellido_paterno', null, ['class' => 'form-control', 'placeholder'=>'Apellido Paterno']) !!}
                </div>

                <div class="col-md-4 form-group">
                    {!! Form::label('apellido_materno', 'Apellido Materno:') !!}
                    {!! Form::text('apellido_materno', null, ['class' => 'form-control', 'placeholder'=>'Apellido Materno']) !!}
                </div>

                <div class="col-md-4 form-group">
                    {!! Form::label('rut', 'Rut:') !!}
                    {!! Form::text('rut', null, ['class' => 'form-control', 'placeholder'=>'Rut']) !!}
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
            <div class="box-body">
                    @include('intervinientes.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

