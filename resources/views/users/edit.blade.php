@extends('layouts.app')

@section('title', 'Edit User ' . $user->first_name)

@section('content')

    <section class="content-header">
        <h1 class="pull-left">Editando a {{ $user->name }}</h1>
        <h1 class="pull-right">
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('usuarios.index') }}"><i class="fa fa-arrow-left"></i>Volver</a>
        </h1>
    </section>

    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="box box-primary">
            <div class="box-body">
            {!! Form::model($user, ['method' => 'PUT', 'route' => ['usuarios.update',  $user->id ] ]) !!}
            @include('users._form')
            <!-- Submit Form Button -->
                {!! Form::submit('Guardar Cambios', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection