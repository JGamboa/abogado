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

        <div class="panel panel-default">
            <div class="panel-body">
                <section class="post-heading">
                    <div class="row">
                        <div class="col-md-11">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object photo-profile" src="{{ asset('storage/avatars/' . $observacion->user()->avatar) }}" width="40" height="40" alt="...">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <a href="#" class="anchor-username"><h4 class="media-heading">{{ isset($observacion->empleado()->nombreCompleto) ? $observacion->empleado()->nombreCompleto : $observacion->user()->name }}</h4></a>
                                    <a href="#" class="anchor-time">{{ $observacion->created_at->format('d/m/Y h:i:s') }}</a>
                                </div>
                            </div>
                        </div>d
                        <div class="col-md-1">
                            <a href="#"><i class="glyphicon glyphicon-chevron-down"></i></a>
                        </div>
                    </div>
                </section>
                <section class="post-body">
                    <p>{{ $observacion->observacion }}</p>
                </section>
            </div>
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


            {!! Form::open(['route' => ['api.observacionesCasos.store'], 'method' => 'post', 'id'=>'crear-observacion-form']) !!}
            <div class="modal-body" style="padding: 0px;">
                <div class="row" style="margin:0px;">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        {{ Form::hidden('caso_id', $caso->id) }}
                        {{ Form::textarea("observacion", null, ['class' => 'field col-md-12']) }}
                    </div>
                </div><!--.row-->
            </div>

            <div class="modal-footer">
                <button class="btn btn-success" id="crearObservacion" type="button">Crear</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>

<style>
    .modal-content {
        width: 500px;
        margin: 0 auto;
    }

    /*-- Bootstrap Override Style --*/


    /*-- Content Style --*/
    .post-footer-option li{
        float:left;
        margin-right:50px;
        padding-bottom:15px;
    }

    .post-footer-option li a{
        color:#AFB4BD;
        font-weight:500;
        font-size:1.3rem;
    }

    .photo-profile{
        border:1px solid #DDD;
    }

    .anchor-username h4{
        font-weight:bold;
    }

    .anchor-time{
        color:#ADB2BB;
        font-size:1.2rem;
    }

    .post-footer-comment-wrapper{
        background-color:#F6F7F8;
    }
</style>


@push('custom-scripts')

<script type="text/javascript">

    $("#crearObservacion").on("click", function() {
        $.ajax({
            url: "{{ url(route('api.observacionesCasos.store')) }}",
            method: 'POST',
            data: $("#crear-observacion-form").serialize(),
            success: function( response ) {
                if(response.success){
                    $("#CreateObservacionModal").modal('hide');
                    alert(response.message);
                    location.reload();
                }
            }
        });
    });


</script>

@endpush