@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Isapre
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($isapre, ['route' => ['isapres.update', $isapre->id], 'method' => 'patch']) !!}

                        @include('isapres.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection