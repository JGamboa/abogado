@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Asignar Usuario
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="register-box-body">
                <div>
                    {!! Form::model($empleado, ['route' => ['empleados.store-user', $empleado->id], 'method' => 'post']) !!}

                        @include('empleados.usuario_fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection