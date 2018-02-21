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
                        <h3 class="box-title">Lista de ciudades</h3>
                    </div>
                    <div class="col-sm-4">
                        <a class="btn btn-primary" href="{{ route('provincias.create') }}">Agregar nueva ciudad</a>
                        @if ($deletedData == 0)
                            <a class="btn btn-primary" href="{{ route('provincias.deleted') }}">Ver Eliminadas</a>
                        @elseif ($deletedData == 1)
                            <a class="btn btn-primary" href="{{ route('provincias.index') }}">Ver</a>
                        @endif
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            @include('provincias.table')
        </div>
    </section>
    <!-- /.content -->
@endsection