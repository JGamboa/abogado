@extends('layouts.app')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        @include('adminlte-templates::common.errors')

        <div class="clearfix"></div>
        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-sm-8">
                        <h3 class="box-title">Empresas</h3>
                    </div>
                    <div class="col-sm-4">
                        <a class="btn btn-primary" href="{{ route('empresas.create') }}">Agregar nueva empresa</a>
                        @if ($deletedData == 0)
                            <a class="btn btn-primary" href="{{ route('empresas.deleted') }}">Ver Eliminadas</a>
                        @elseif ($deletedData == 1)
                            <a class="btn btn-primary" href="{{ route('empresas.index') }}">Ver</a>
                        @endif
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            @include('empresas.table')
            @include('partials.modal')

        </div>
    </section>
    <!-- /.content -->
@endsection

