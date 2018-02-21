@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Sucursal
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($sucursal, ['route' => ['sucursales.update', $sucursal->id], 'method' => 'patch']) !!}

                        @include('sucursales.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection