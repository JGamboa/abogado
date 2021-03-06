@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Interviniente
        </h1>
   </section>
   <div class="content">
       <div class="clearfix"></div>

       @include('flash::message')
       @include('adminlte-templates::common.errors')

       <div class="clearfix"></div>
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($interviniente, ['route' => ['intervinientes.update', $interviniente->id], 'method' => 'patch']) !!}

                        @include('intervinientes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection