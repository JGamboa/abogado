@extends('layouts.app')

@section('title', 'Roles & Permissions')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Roles</h1>
        <h1 class="pull-right">
            @can('add_roles')
                <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#roleModal" style="margin-top: -10px;margin-bottom: 5px"> <i class="glyphicon glyphicon-plus"></i> Crear</a>
            @endcan
        </h1>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="roleModalLabel">
        <div class="modal-dialog" role="document">
            {!! Form::open(['method' => 'post']) !!}

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="roleModalLabel">Role</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="empresa_id" value="{{session('empresa_id')}}">
                    <!-- name Form Input -->
                    <div class="form-group @if ($errors->has('name')) has-error @endif">
                        {!! Form::label('name', 'Nombre Rol') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre Rol']) !!}
                        @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                    </div>

                    <!-- guard name Form Input -->
                    <div class="form-group @if ($errors->has('guard_name')) has-error @endif">
                        {!! Form::label('guard_name', 'Guard') !!}
                        {!! Form::text('guard_name', null, ['class' => 'form-control', 'placeholder' => 'Guard']) !!}
                        @if ($errors->has('guard_name')) <p class="help-block">{{ $errors->first('guard_name') }}</p> @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    <!-- Submit Form Button -->
                    {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="box box-primary">
            <div class="box-body">
                @include('roles.table')
            </div>
        </div>
    </div>

@endsection












