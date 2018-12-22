@extends('layouts.app')

@section('title', 'Users')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">{{ $result->total() }} {{ str_plural('Usuario', $result->count()) }}</h1>
        <h1 class="pull-right">
            @can('add_users')
                <a href="{{ route('usuarios.create') }}" class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px"> <i class="glyphicon glyphicon-plus-sign"></i> Crear</a>
            @endcan
        </h1>
    </section>

    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="box box-primary">
            <div class="box-body">
                @include('users.table')
            </div>
        </div>
    </div>

@endsection