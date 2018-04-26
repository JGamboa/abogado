@php
    /**
     * @var \App\Models\ObservacionCaso $observacion
     */
@endphp

<div class="col-md-6">
    <section class="content-header row">
        <h1 class="pull-left">
            Observaciones
        </h1>
        <h1 class="pull-right">
            <button id="AddNewObservation"  data-toggle="modal" data-target="#CreateObservacionModal" class="btn btn-primary btn-sm pull-right" style="margin-top: -5px;margin-bottom: 5px">Crear</button>
        </h1>
    </section>

        @foreach($caso->observaciones as $observacion)
            <div class="box box-primary" style="margin-top:20px;">
                <div class="box-body">
                   <p> {{ $observacion->observacion }} </p>
                </div>

            </div>
            <div class="clearfix">
                <p class="pull-right">ADMINISTRADOR</p>
            </div>
        @endforeach


</div>


<div class="modal fade" id="CreateObservacionModal" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width:90%;">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
                <!--<button type="button" class="next"><i class="fa fa-chevron-right"></i></button>
                <button type="button" class="prev"><i class="fa fa-chevron-left"></i></button>-->
                <h4 class="modal-title" id="myModalObservacionLabel">Observacion </h4>
            </div>

            <div class="modal-body" style="padding: 0px;">
                <div class="row" style="margin:0px;">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        {!! Form::open(['class' => 'file-info-form']) !!}

                            {{ Form::textarea("observacion", null, ['class' => 'field col-md-12']) }}


                        {!! Form::close() !!}
                    </div>
                </div><!--.row-->
            </div>

            <div class="modal-footer">
                <a class="btn btn-success" id="CreateObservacion" href="">Crear</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<style>
    .modal-content {
        width: 500px;
        margin: 0 auto;
    }
</style>