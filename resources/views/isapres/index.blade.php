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
                        <h3 class="box-title">Isapres</h3>
                    </div>
                    <div class="col-sm-4">
                        <a class="btn btn-primary" href="{{ route('isapres.create') }}">Agregar</a>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            @include('isapres.table')

        </div>
    </section>
    <!-- /.content -->
@endsection
