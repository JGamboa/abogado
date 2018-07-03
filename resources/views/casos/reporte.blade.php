@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Casos</h1>
    </section>

    <div class="content">

        <div class="clearfix"></div>

        {!! Form::open(['route' => 'casos.reporte', 'method'=>'get']) !!}
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
                    {!! Form::label('captador', 'Captador:') !!}
                    {!! Form::select('captador', $empleados, null, ['class' => 'form-control', 'placeholder'=>'Seleccionar Empleado']) !!}
                </div>

                <div class="col-md-4 form-group">
                    {!! Form::label('responsable_proceso', 'Responsable Proceso:') !!}
                    {!! Form::select('responsable_proceso', $empleados, null, ['class' => 'form-control', 'placeholder'=>'Seleccionar Empleado']) !!}
                </div>


                <div class="col-md-4 form-group">
                    {!! Form::label('corte_id', 'Corte:') !!}
                    {!! Form::select('corte_id', $cortes, null, ['id'=>'corte_id','class' => 'form-control', 'placeholder'=>'Seleccionar Corte']) !!}
                </div>


                <div class="col-md-4 form-group">
                    {!! Form::label('fecha_recurso_desde', 'Fecha Recurso desde:') !!}
                    {!! Form::date('fecha_recurso_desde', null, ['class' => 'form-control']) !!}
                </div>

                <div class="col-md-4 form-group">
                    {!! Form::label('fecha_recurso_hasta', 'Fecha Recurso hasta:') !!}
                    {!! Form::date('fecha_recurso_hasta', null, ['class' => 'form-control']) !!}
                </div>


                <div class="clearfix"></div>

                <div class="col-md-4 form-group">
                    {!! Form::label('fecha_captacion_desde', 'Fecha Captacion desde:') !!}
                    {!! Form::date('fecha_captacion_desde', null, ['class' => 'form-control']) !!}
                </div>

                <div class="col-md-4 form-group">
                    {!! Form::label('fecha_captacion_hasta', 'Fecha Captacion hasta:') !!}
                    {!! Form::date('fecha_captacion_hasta', null, ['class' => 'form-control']) !!}
                </div>

                <div class="clearfix"></div>

                <div class="col-md-4 form-group">
                    {!! Form::label('fecha_creacion_desde', 'Fecha Creación hasta:') !!}
                    {!! Form::date('fecha_creacion_desde', null, ['class' => 'form-control']) !!}
                </div>

                <div class="col-md-4 form-group">
                    {!! Form::label('fecha_creacion_hasta', 'Fecha Creación hasta:') !!}
                    {!! Form::date('fecha_creacion_hasta', null, ['class' => 'form-control']) !!}
                </div>

                <div class="col-md-4 form-group">
                    {!! Form::label('exportar', 'Exportar:') !!}
                    <select id="exportar" name="exportar" class="form-control">
                        <option value="">NO EXPORTAR</option>
                        <option value="excel">EXCEL</option>
                    </select>
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


            <table class="table table-responsive table-bordered" id="casos-table" style="font-size: 12px;">
                <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Contraparte</th>
                    <th>Fecha Recurso</th>
                    <th>Fecha Captacion</th>
                    <th>Captador</th>
                    <th>Rol</th>
                    <th>Año Rol</th>
                    <th>Materia</th>
                    <th>Estado</th>
                    <th>Corte</th>
                    <th>Tribunal</th>
                    <th>Responsable Proceso</th>
                    <th>Pyp</th>
                </tr>
                </thead>
                <tbody>
                @foreach($casos as $caso)

                    <tr>
                        <td>{!! isset($caso->cliente->nombres) ? $caso->getNombreCompleto($caso->cliente) : null !!}</td>
                        <td>{!! isset($caso->contraparte->nombres) ? $caso->getNombreCompleto($caso->contraparte) : null !!}</td>
                        <td>{!! $caso->fecha_recurso->format('d-m-Y') !!}</td>
                        <td>{!! $caso->fecha_captacion->format('d-m-Y') !!}</td>
                        <td>{!! $caso->datosCaptador->nombreCompleto !!}</td>
                        <td><span class="editable" name="rol" data-edit-pk="{{ $caso->id }}">{!! $caso->rol !!}</span></td>
                        <td>{{ $caso->anio_rol }}</td>
                        <td>{!! $caso->materia->nombre !!}</td>
                        <td><span class="editable-estado" name="estadocaso_id" data-edit-pk="{{ $caso->id }}">{!! $caso->estadocaso->nombre !!}</span></td>
                        <td><span class="editable-corte" name="corte_id" data-edit-pk="{{ $caso->id }}">{!! $caso->corte->nombre !!}</td>
                        <td>
                            <span class="editable" name="tribunal" data-edit-pk="{{ $caso->id }}">{!! $caso->tribunal !!}</span>
                        </td>
                        <td>{!! $caso->datosResponsable->nombreCompleto !!}</td>
                        <td>{!! $caso->pyp == 1 ? 'OK' : '<button type="button" class="btn btn-primary btn-xs" style="background-color:red">PENDIENTE</button>' !!}</td>

                    </tr>
                @endforeach
                </tbody>
            </table>


        </div>
    </div>


    </div>
@endsection

