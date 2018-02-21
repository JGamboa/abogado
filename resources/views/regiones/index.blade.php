@extends('layouts.app')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="clearfix"></div>
        @include('flash::message')
        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-sm-8">
                        <h3 class="box-title">Lista de regiones</h3>
                    </div>
                    <div class="col-sm-4">
                        <a class="btn btn-primary" href="{{ route('regiones.create') }}">Agregar nueva region</a>
                        @if ($deletedData == 0)
                            <a class="btn btn-primary" href="{{ route('regiones.deleted') }}">Ver Eliminadas</a>
                        @elseif ($deletedData == 1)
                            <a class="btn btn-primary" href="{{ route('regiones.index') }}">Ver</a>
                        @endif
                    </div>
                </div>
            </div>

        @include('regiones.table')
        </div>
    </section>
    <!-- /.content -->

@endsection

