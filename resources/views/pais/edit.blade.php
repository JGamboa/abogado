@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pais
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($pais, ['route' => ['pais.update', $pais->id], 'method' => 'patch']) !!}

                        @include('pais.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection