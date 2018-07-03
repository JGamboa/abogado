@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Caso {{ $caso->id }}</h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       {!! Form::model($caso, ['route' => ['casos.update', $caso->id], 'method' => 'patch']) !!}

            @include('casos.fields')
   </div>
@endsection