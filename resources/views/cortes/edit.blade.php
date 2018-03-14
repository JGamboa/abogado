@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Corte
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($corte, ['route' => ['cortes.update', $corte->id], 'method' => 'patch']) !!}

                        @include('cortes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection