@extends('backpack::layout')

@section('after_styles')
    <style media="screen">
        .backpack-profile-form .required::after {
            content: ' *';
            color: red;
        }
    </style>
@endsection

@section('header')
    <section class="content-header">

        <h1>
            {{ trans('backpack::base.profile') }}
        </h1>

        <ol class="breadcrumb">

            <li>
                <a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a>
            </li>

            <li>
                <a href="{{ route('profiles.index') }}">{{ trans('messages.profile') }}</a>
            </li>

            <li class="active">
                {{ trans('messages.create') }}
            </li>

        </ol>

    </section>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            @include('adminlte-templates::common.errors')
            <div class="box box-primary">

                <div class="box-body">
                    <div class="row">
                        {!! Form::open(['route' => 'profiles.store']) !!}

                        @include('profiles.fields')

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
