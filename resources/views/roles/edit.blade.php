@extends('layouts.app')

@section('title', 'Roles & Permissions')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Roles</h1>
    </section>

    <div class="content">

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        {!! Form::model($role, ['method' => 'PUT', 'route' => ['roles.update',  $role->id ], 'class' => 'm-b']) !!}

        @if($role->name === 'SUPER ADMINISTRADOR')
            @include('shared._permissions', [
                          'title' => 'Permisos de ' . $role->name,
                          'options' => ['disabled'] ])
        @else
            @include('shared._permissions', [
                          'title' => 'Permisos de ' . $role->name,
                          'model' => $role ])
            @can('edit_roles')
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary', 'style' => 'margin-bottom:20px']) !!}
            @endcan
        @endif

        {!! Form::close() !!}


    </div>
@endsection