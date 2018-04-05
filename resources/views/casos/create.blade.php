@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Caso
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
                    {!! Form::open(['route' => 'casos.store']) !!}

                        @include('casos.fields')

                    {!! Form::close() !!}
    </div>
@endsection
