@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="clearfix"></div>
        @include('flash::message')
        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-sm-8">
                        <h3 class="box-title">Perfil</h3>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <div class="col-md-12">
                    <img src="{{ asset('storage/avatars/' . $user->avatar) }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                    <h2>Perfil de {{ $user->name }}</h2>
                    <form enctype="multipart/form-data" action="{{route('user.actualizar-avatar')}}" method="POST">
                        <label>Subir Imagen de perfil</label>
                        <input type="file" name="avatar">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="pull-right btn btn-sm btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </section>


@endsection

