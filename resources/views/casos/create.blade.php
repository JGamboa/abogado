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
        @include('adminlte-templates::common.errors')
        {!! Form::open(['route' => 'casos.store']) !!}

            @include('casos.fields')


    </div>
@endsection
