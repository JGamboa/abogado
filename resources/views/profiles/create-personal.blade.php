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
            {{ trans('backpack::base.my_account') }}
        </h1>

        <ol class="breadcrumb">

            <li>
                <a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a>
            </li>

            <li>
                <a href="{{ route('backpack.account.info') }}">{{ trans('backpack::base.my_account') }}</a>
            </li>

            <li class="active">
                {{ trans('backpack::base.profile') }}
            </li>

        </ol>

    </section>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('backpack::auth.account.sidemenu')
        </div>
        <div class="col-md-9">

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
