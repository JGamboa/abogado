@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Empleado
        </h1>
    </section>
    <div class="content">

            <div class="clearfix"></div>

            @include('flash::message')

            <div class="box box-primary">
                <div class="box-body">
                    <div class="row">
                        @include('empleados.show_fields')
                    </div>
                </div>
            </div>
    </div>
@endsection
