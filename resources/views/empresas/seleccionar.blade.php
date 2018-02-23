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
                    {!! Form::open(['route' => 'empresas.session']) !!}

                    <div class="form-group col-sm-6">
                        {!! Form::label('id', 'Empresa:') !!}
                        {!! Form::select('id', $empresas, '', ['class' => 'form-control', 'placeholder'=>'Seleccionar Empresa']) !!}
                    </div>

                    <!-- Submit Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                        <a href="{!! route('empleados.index') !!}" class="btn btn-default">Cancel</a>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>


@endsection
