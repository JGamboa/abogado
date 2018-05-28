@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Casos</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('casos.create') !!}">Crear</a>
        </h1>
    </section>

    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        <form method="GET" action="{{ route('casos.search') }}">
            @component('layouts.search', ['title' => 'Buscar'])
                @component('layouts.two-cols-search-row',
                    ['items' => ['NOMBRES', 'RUT', 'APELLIDO PATERNO', 'APELLIDO MATERNO'],
                    'oldVals' => [
                                  isset($searchingVals) ? $searchingVals['casos.contraparte->nombres'] : '',
                                  isset($searchingVals) ? $searchingVals['casos.contraparte->rut'] : '',
                                  isset($searchingVals) ? $searchingVals['casos.contraparte->apellido_paterno'] : '',
                                  isset($searchingVals) ? $searchingVals['casos.contraparte->apellido_materno'] : ''
                                 ]
                    ])
                @endcomponent
            @endcomponent
        </form>

        <div class="box box-primary">
            <div class="box-body">

                    @include('casos.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

