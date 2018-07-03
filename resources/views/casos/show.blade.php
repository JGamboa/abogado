@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Caso {{ $caso->id }}</h1>
        <h1 class="pull-right">
            <a target="_blank" class="btn btn-warning pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('casos.edit', [$caso->id]) !!}">Editar</a>
        </h1>
    </section>

    <div class="content">
        <div class="clearfix"></div>

        @include('casos.show_fields')
        <a href="{!! route('casos.index') !!}" class="btn btn-default">Volver</a>



    </div>
@endsection
