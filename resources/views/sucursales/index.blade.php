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
                        <h3 class="box-title">Sucursales</h3>
                    </div>
                    <div class="col-sm-4">
                        <a class="btn btn-primary" href="{{ route('sucursales.create') }}">Agregar nueva sucursal</a>
                        @if ($deletedData == 0)
                            <a class="btn btn-primary" href="{{ route('sucursales.deleted') }}">Ver Eliminadas</a>
                        @elseif ($deletedData == 1)
                            <a class="btn btn-primary" href="{{ route('sucursales.index') }}">Ver</a>
                        @endif
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            @include('sucursales.table')
        </div>
    </section>
    <!-- /.content -->
    </div>
@endsection

