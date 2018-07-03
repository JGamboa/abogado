<div class="box box-primary">
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="header">

                    <table class="table table-bordered">
                        <tr>
                            <th>Rut</th>
                            <th>Nombre</th>
                            <th>Direcci&oacute;n</th>
                        </tr>
                        <tr>
                            <td id="rut_cliente">{{ isset($caso->cliente) ? $caso->cliente->rut : null }}</td>
                            <td id="nombre_cliente">{{ isset($caso->cliente) ? $caso->getNombreCompleto($caso->cliente) : null }}</td>
                            <td id="direccion_cliente">{{ isset($caso->cliente) ? $caso->getDireccion($caso->cliente) : null }}</td>
                        </tr>
                        <tr>
                            <th>Isapre</th>
                            <th>Profesi&oacute;n</th>
                            <th>Observaci&oacute;n</th>
                        </tr>
                        <tr>
                            <td id="isapre_cliente">{{ isset($caso->cliente) ? $caso->cliente->isapre->nombre : null }}</td>
                            <td id="profesion_cliente">{{ isset($caso->cliente) ? $caso->cliente->oficio : null }}</td>
                            <td id="observacion_cliente">{{ isset($caso->cliente) ? $caso->cliente->observacion : null }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="box box-primary">
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="header">

                    <table class="table table-bordered">
                        <tr>
                            <th>Rut</th>
                            <th>Nombre</th>
                            <th>Direcci&oacute;n</th>
                        </tr>
                        <tr>
                            <td id="rut_contraparte">{{ isset($caso->contraparte) ? $caso->contraparte->rut : null }}</td>
                            <td id="nombre_contraparte">{{ isset($caso->cliente) ? $caso->getNombreCompleto($caso->contraparte) : null }}</td>
                            <td id="direccion_contraparte">{{ isset($caso->cliente) ? $caso->getDireccion($caso->contraparte) : null }}</td>
                        </tr>
                        <tr>
                            <th>Isapre</th>
                            <th>Profesi&oacute;n</th>
                            <th>Observaci&oacute;n</th>
                        </tr>
                        <tr>
                            <td id="isapre_contraparte">{{ isset($caso->contraparte) ? $caso->contraparte->isapre->nombre : null }}</td>
                            <td id="profesion_contraparte">{{ isset($caso->contraparte) ? $caso->contraparte->oficio : null }}</td>
                            <td id="observacion_contraparte">{{ isset($caso->contraparte) ? $caso->contraparte->observacion : null }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="box box-primary">
    <div class="box-body">
        <div class="row">

            <!-- Fecha Recurso Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('fecha_recurso', 'Fecha Recurso:') !!}
                {!! Form::text('fecha_recurso', isset($caso->fecha_recurso) ? $caso->fecha_recurso : null, ['class' => 'form-control', 'disabled']) !!}
            </div>


            <!-- Fecha Captacion Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('fecha_captacion', 'Fecha Captacion:') !!}
                {!! Form::text('fecha_captacion', isset($caso->fecha_captacion) ? $caso->fecha_captacion : null, ['class' => 'form-control', 'disabled']) !!}
            </div>


            <!-- Captador Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('captador', 'Captador:') !!}
                {!! Form::text('captador', isset($caso->datosCaptador) ? $caso->datosCaptador->nombreCompleto : null, ['class' => 'form-control', 'placeholder'=>'Seleccionar Empleado', 'disabled']) !!}
            </div>

            <!-- Rol Field -->
            <div class="form-group col-sm-3">
                {!! Form::label('rol', 'Rol:') !!}
                {!! Form::text('rol', null, ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Año Rol Field -->
            <div class="form-group col-sm-3">
                {!! Form::label('anio_rol', 'Año Rol:') !!}
                {!! Form::text('anio_rol', null, ['class' => 'form-control', 'disabled']) !!}
            </div>


            <!-- Materia Id Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('materia_id', 'Materia:') !!}
                {!! Form::text('materia_id', isset($caso->materia_id) ? $caso->materia->nombre : null, ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Estadocaso Id Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('estadocaso_id', 'Estado:') !!}
                {!! Form::text('estadocaso_id', isset($caso->estadocaso_id) ? $caso->estadocaso->nombre : null, ['class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Corte Id Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('corte_id', 'Corte:') !!}
                {!! Form::text('corte_id', isset($caso->corte_id) ? $caso->corte->nombre : null, ['id'=>'corte_id','class' => 'form-control', 'disabled']) !!}
            </div>

            <!-- Tribunal Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('tribunal', 'Tribunal:') !!}
                {!! Form::text('tribunal',  isset($caso->tribunal) ? $caso->tribunal : null, ['class' => 'form-control', 'disabled']) !!}
            </div>


        <!-- Responsable Proceso Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('responsable_proceso', 'Responsable Proceso:') !!}
                {!! Form::text('responsable_proceso', isset($caso->responsable_proceso) ? $caso->datosResponsable->nombreCompleto : null, ['class' => 'form-control', 'disabled']) !!}
            </div>


            <!-- Pyp Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('pyp', 'Pyp:') !!}
                {!! Form::text('pyp', isset($caso->pyp) ? $caso->getPYP() : null, ['class' => 'form-control', 'disabled']) !!}
            </div>

        </div>
    </div>
</div>