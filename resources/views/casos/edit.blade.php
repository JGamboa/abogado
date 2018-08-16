@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Caso {{ $caso->id }}</h1>
   </section>
   <div class="content">


       {!! Form::model($caso, ['route' => ['casos.update', $caso->id], 'method' => 'patch']) !!}

            @include('casos.fields')
   </div>
@endsection