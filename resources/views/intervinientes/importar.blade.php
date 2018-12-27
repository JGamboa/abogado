@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Interviniente
        </h1>
    </section>
    <div class="content">

        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'intervinientes.importarPost', 'files'=>'true']) !!}
                        <input type="file" name="excel" class="form-control">
                        <br>
                        <button class="btn btn-success">Importar</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
