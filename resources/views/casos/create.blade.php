@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Caso</h1>
        <h1 class="pull-right">
            <a target="_blank" class="btn btn-warning pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('intervinientes.create') !!}">Crear Interviniente</a>
        </h1>
    </section>

    <div class="content">

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="box box-default collapsed-box">
            <div class="box-header with-border">
                <h3 class="box-title">Interviniente</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                </div>
            </div>

            <div class="box-body" style="display:none;">
                <div class="row">
                    {!! Form::open(['route' => 'intervinientes.store', 'id'=>'crearInterviniente-form']) !!}

                    @include('intervinientes.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        {!! Form::open(['route' => 'casos.store']) !!}

            @include('casos.fields')

    </div>
@endsection
