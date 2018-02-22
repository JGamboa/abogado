@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Seleccionar empresa
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'empresas.store']) !!}

                    <div class="form-group col-sm-6">
                        {!! Form::label('id', 'Empresa:') !!}
                        {!! Form::select('id', $empresas, '', ['class' => 'form-control', 'placeholder'=>'Seleccionar Empresa']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>


@endsection
